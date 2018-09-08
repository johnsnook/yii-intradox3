-- Clear the slate
delete from person;
delete from project;
delete from document;
delete from log;
delete from document_document;

--These shouldn't exist at this stage, but just in case
DROP TRIGGER automated_document_log;
DROP TRIGGER automated_project_log;

ALTER SEQUENCE super_id_seq RESTART WITH 1;

BEGIN;
-- Setup the stored procedures we need for import and operation
CREATE OR REPLACE FUNCTION public.intradox_findposts (
  _parent_id integer
)
RETURNS SETOF public.post AS
$body$
DECLARE
  r post;
BEGIN
	-- get the posts, newest first
  FOR r IN
    SELECT p.*
    FROM post p
    WHERE super_id = _parent_id
    ORDER BY p.when DESC
  LOOP
  	-- return this post record
	RETURN NEXT r;
	-- then return this posts' children
	RETURN QUERY SELECT * FROM intradox_findposts(r.id);
  END LOOP;
  RETURN;
END;
$body$
LANGUAGE 'plpgsql'
VOLATILE
RETURNS NULL ON NULL INPUT
SECURITY INVOKER
COST 100 ROWS 1000;

CREATE OR REPLACE FUNCTION public.intradox_isnumeric (
  text
)
RETURNS boolean AS
$body$
DECLARE x NUMERIC;
BEGIN
    x = $1::NUMERIC;
    RETURN TRUE;
EXCEPTION WHEN others THEN
    RETURN FALSE;
END;
$body$
LANGUAGE 'plpgsql'
IMMUTABLE
CALLED ON NULL INPUT
SECURITY INVOKER
COST 100;

CREATE OR REPLACE FUNCTION public.update_document_log (
)
RETURNS trigger AS
$body$
BEGIN
	INSERT INTO log(title,action,super_id, model,person_id)
VALUES('Imported from legacy Intradox','CREATE',NEW.id,'document',1);
	RETURN NEW;
END;
$body$
LANGUAGE 'plpgsql'
VOLATILE
CALLED ON NULL INPUT
SECURITY INVOKER
COST 100;

CREATE OR REPLACE FUNCTION public.update_project_log (
)
RETURNS trigger AS
$body$
BEGIN
	INSERT INTO log(title,action,super_id, model,person_id)
VALUES('Imported from legacy Intradox','CREATE',NEW.id,'project',1);

	RETURN NEW;
END;
$body$
LANGUAGE 'plpgsql'
VOLATILE
CALLED ON NULL INPUT
SECURITY INVOKER
COST 100;

--triggers for log update, we'll drop them at the end of the script
CREATE TRIGGER automated_document_log
  AFTER INSERT
  ON public.document FOR EACH ROW
  EXECUTE PROCEDURE public.update_document_log();

CREATE TRIGGER automated_project_log
  AFTER INSERT
  ON public.project FOR EACH ROW
  EXECUTE PROCEDURE public.update_project_log();

--Squirt in autobot first!
INSERT INTO public.person (
    username,
    password,
    title,
    userlevel,
    email,
	job_title
)
VALUES(
	'admin',
	md5('1337@$$3$') as password,
	'Legacy import process',
	3,
	'jsnook@gmail.com',
	'robot')
FROM

-- squirt in the peeps
INSERT INTO public.person (
	legacy_id,
    username,
    password,
    title,
    userlevel,
    email,
    phone,
	job_title
)
SELECT
	u.id as legacy_id,
	u.username,
	md5(u.password) as password,
	u.fullname as title,
	u.userlevel + 1 as userlevel,
	u.email,
	u.phone,
	u.title as job_title
FROM
	id2.newfields_user u;

-- squirt in the projects
INSERT INTO public.project (
	legacy_id,
	title,
	archived,
	restricted
)
SELECT
	p.id as legacy_id,
	p.project as title,
	CASE WHEN p.is_archived=1 THEN true
		  WHEN p.is_archived=0 THEN false
	END as archived,
	CASE WHEN p.is_restricted=1 THEN true
		WHEN p.is_restricted=0 THEN false
	END as restricted
FROM
  id2.project p;


-- squirt in the documents
INSERT INTO public.document (
	legacy_id,
	title,
	project_id,
	corporate_author,
	type,
	topic,
	filename,
	catalog_number,
	page_count,
	notes,
	restricted,
	received_date,
	original_year,
	original_month,
	original_day
)
SELECT
	d.id AS legacy_id,
	d.title,
	d.projectid as project_id,
	id2.author.author AS corporate_author,
	id2.type.type,
	id2.topic.topic,
	d.electronicdocument AS filename,
	d.identification_number AS catalog_number,
	d.pages::integer AS page_count,
	d.notes,
	CASE
		WHEN d.is_restricted = 1
			THEN TRUE
		WHEN d.is_restricted = 0
			THEN FALSE
	END AS restricted,
	d.received_on AS received_date,
	date_part('year', d.created_on) AS original_year,
	date_part('month', d.created_on) AS original_month,
	date_part('day', d.created_on) AS original_day
FROM
	id2.document d
	left JOIN id2.author ON (d.authorid = id2.author.id)
	left JOIN id2.topic ON (d.topicid = id2.topic.id)
	left JOIN id2.type ON (d.typeid = id2.type.id)
	where  intradox_isnumeric(pages) = true AND title IS NOT NULL
	order by d.id;

-- Now insert the document to document relationship table, fixing the legacy id
-- as we go.
INSERT INTO public.document_document (
	document_id_a,
	document_id_b
)
SELECT
  public.document.id,
  document1.id
FROM
  public.document
  INNER JOIN id2.document_document ON (public.document.legacy_id = id2.document_document.documentid_a)
  INNER JOIN public.document document1 ON (id2.document_document.documentid_b = document1.legacy_id);



--this resolves the project id links
UPDATE document AS d
	SET project_id = p.id
	FROM project AS p
	WHERE d.project_id = p.legacy_id;

--Intradox will handle logging from here on out so we don't need these.
DROP TRIGGER automated_document_log ON public.document;
DROP TRIGGER automated_project_log ON public.document;

COMMIT;