--
-- PostgreSQL database dump
--
SET ROLE = 'intradox3'
SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = true;

--
-- Name: super; Type: TABLE; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE TABLE super (
    id integer NOT NULL,
    title character varying NOT NULL,
    legacy_id integer
);


ALTER TABLE public.super OWNER TO intradox3;

--
-- Name: post; Type: TABLE; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE TABLE post (
    super_id integer NOT NULL,
    notes text NOT NULL,
    person_id integer NOT NULL,
    "when" timestamp(0) with time zone DEFAULT now()
)
INHERITS (super);


ALTER TABLE public.post OWNER TO intradox3;

--
-- Name: correspondence; Type: TABLE; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE TABLE correspondence (
    id integer NOT NULL,
    document_id integer,
    recipient character varying,
    personal_author character varying
);


ALTER TABLE public.correspondence OWNER TO intradox3;

--
-- Name: correspondence_id_seq; Type: SEQUENCE; Schema: public; Owner: intradox3
--

CREATE SEQUENCE correspondence_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.correspondence_id_seq OWNER TO intradox3;

--
-- Name: correspondence_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: intradox3
--

ALTER SEQUENCE correspondence_id_seq OWNED BY correspondence.id;


--
-- Name: document; Type: TABLE; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE TABLE document (
    project_id integer,
    filename character varying,
    corporate_author character varying,
    topic character varying,
    type character varying,
    catalog_number character varying,
    page_count integer,
    bates_start integer,
    bates_end integer,
    notes text,
    restricted boolean,
    received_date date,
    original_date character varying,
    search_vector tsvector,
    full_text text
)
INHERITS (super);


ALTER TABLE public.document OWNER TO intradox3;

--
-- Name: COLUMN document.filename; Type: COMMENT; Schema: public; Owner: intradox3
--

COMMENT ON COLUMN document.filename IS 'the name of the electronic document in the filesystem';


--
-- Name: COLUMN document.type; Type: COMMENT; Schema: public; Owner: intradox3
--

COMMENT ON COLUMN document.type IS 'Also defines the document subclass';


SET default_with_oids = false;

--
-- Name: document_document; Type: TABLE; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE TABLE document_document (
    id integer NOT NULL,
    document_id_a integer NOT NULL,
    document_id_b integer NOT NULL
);


ALTER TABLE public.document_document OWNER TO intradox3;

--
-- Name: document_document_id_seq; Type: SEQUENCE; Schema: public; Owner: intradox3
--

CREATE SEQUENCE document_document_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.document_document_id_seq OWNER TO intradox3;

--
-- Name: document_document_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: intradox3
--

ALTER SEQUENCE document_document_id_seq OWNED BY document_document.id;


SET default_with_oids = true;

--
-- Name: document_search; Type: TABLE; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE TABLE document_search (
    id integer NOT NULL,
    person_id integer,
    search_title character varying NOT NULL,
    title character varying,
    legacy_id integer,
    project_id integer,
    filename character varying,
    corporate_author character varying,
    topic character varying,
    type character varying,
    catalog_number character varying,
    page_count integer,
    bates_start integer,
    bates_end integer,
    notes text,
    restricted boolean,
    received_date date,
    original_date character varying,
    full_text text
);


ALTER TABLE public.document_search OWNER TO intradox3;

--
-- Name: document_search_id_seq; Type: SEQUENCE; Schema: public; Owner: intradox3
--

CREATE SEQUENCE document_search_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.document_search_id_seq OWNER TO intradox3;

--
-- Name: document_search_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: intradox3
--

ALTER SEQUENCE document_search_id_seq OWNED BY document_search.id;


SET default_with_oids = false;

--
-- Name: favorite; Type: TABLE; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE TABLE favorite (
    id integer NOT NULL,
    person_id integer NOT NULL,
    super_id integer NOT NULL,
    "when" timestamp with time zone DEFAULT now() NOT NULL
);
ALTER TABLE ONLY favorite ALTER COLUMN person_id SET STATISTICS 0;


ALTER TABLE public.favorite OWNER TO intradox3;

--
-- Name: favorite_id_seq; Type: SEQUENCE; Schema: public; Owner: intradox3
--

CREATE SEQUENCE favorite_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.favorite_id_seq OWNER TO intradox3;

--
-- Name: favorite_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: intradox3
--

ALTER SEQUENCE favorite_id_seq OWNED BY favorite.id;


SET default_with_oids = true;

--
-- Name: journal_article; Type: TABLE; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE TABLE journal_article (
    id integer NOT NULL,
    document_id integer,
    personal_authors character varying,
    journal character varying,
    volume character varying,
    page_range character varying,
    issue character varying
);


ALTER TABLE public.journal_article OWNER TO intradox3;

--
-- Name: journal_article_id_seq; Type: SEQUENCE; Schema: public; Owner: intradox3
--

CREATE SEQUENCE journal_article_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.journal_article_id_seq OWNER TO intradox3;

--
-- Name: journal_article_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: intradox3
--

ALTER SEQUENCE journal_article_id_seq OWNED BY journal_article.id;


--
-- Name: log; Type: TABLE; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE TABLE log (
    action character varying,
    super_id integer,
    person_id integer,
    field character varying,
    log_time timestamp without time zone DEFAULT now(),
    old_value text,
    new_value text,
    model character varying
)
INHERITS (super);
ALTER TABLE ONLY log ALTER COLUMN person_id SET STATISTICS 0;


ALTER TABLE public.log OWNER TO intradox3;

--
-- Name: person; Type: TABLE; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE TABLE person (
    username character varying(20),
    password character varying,
    userlevel integer,
    email character varying(128),
    phone character varying(30),
    account_manager boolean DEFAULT false,
    job_title character varying,
    theme_id integer,
    list_pagination integer DEFAULT 25 NOT NULL
)
INHERITS (super);


ALTER TABLE public.person OWNER TO intradox3;

--
-- Name: project; Type: TABLE; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE TABLE project (
    archived boolean DEFAULT false,
    restricted boolean DEFAULT false,
    jobnumber character varying,
    document_count integer DEFAULT 0
)
INHERITS (super);


ALTER TABLE public.project OWNER TO intradox3;

SET default_with_oids = false;

--
-- Name: project_person; Type: TABLE; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE TABLE project_person (
    id integer NOT NULL,
    project_id integer NOT NULL,
    person_id integer NOT NULL
);


ALTER TABLE public.project_person OWNER TO intradox3;

--
-- Name: TABLE project_person; Type: COMMENT; Schema: public; Owner: intradox3
--

COMMENT ON TABLE project_person IS 'Allows users to be assigned to projects';


--
-- Name: project_person_id_seq; Type: SEQUENCE; Schema: public; Owner: intradox3
--

CREATE SEQUENCE project_person_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.project_person_id_seq OWNER TO intradox3;

--
-- Name: project_person_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: intradox3
--

ALTER SEQUENCE project_person_id_seq OWNED BY project_person.id;


--
-- Name: super_id_seq; Type: SEQUENCE; Schema: public; Owner: intradox3
--

CREATE SEQUENCE super_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.super_id_seq OWNER TO intradox3;

--
-- Name: super_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: intradox3
--

ALTER SEQUENCE super_id_seq OWNED BY super.id;


SET default_with_oids = true;

--
-- Name: theme; Type: TABLE; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE TABLE theme (
    bootstrap_file character varying NOT NULL
)
INHERITS (super);


ALTER TABLE public.theme OWNER TO intradox3;

--
-- Name: id; Type: DEFAULT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY correspondence ALTER COLUMN id SET DEFAULT nextval('correspondence_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY document ALTER COLUMN id SET DEFAULT nextval('super_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY document_document ALTER COLUMN id SET DEFAULT nextval('document_document_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY document_search ALTER COLUMN id SET DEFAULT nextval('document_search_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY favorite ALTER COLUMN id SET DEFAULT nextval('favorite_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY journal_article ALTER COLUMN id SET DEFAULT nextval('journal_article_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY log ALTER COLUMN id SET DEFAULT nextval('super_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY person ALTER COLUMN id SET DEFAULT nextval('super_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY post ALTER COLUMN id SET DEFAULT nextval('super_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY project ALTER COLUMN id SET DEFAULT nextval('super_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY project_person ALTER COLUMN id SET DEFAULT nextval('project_person_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY super ALTER COLUMN id SET DEFAULT nextval('super_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY theme ALTER COLUMN id SET DEFAULT nextval('super_id_seq'::regclass);


--
-- Name: correspondence_pkey; Type: CONSTRAINT; Schema: public; Owner: intradox3; Tablespace: 
--

ALTER TABLE ONLY correspondence
    ADD CONSTRAINT correspondence_pkey PRIMARY KEY (id);


--
-- Name: document_document_pkey; Type: CONSTRAINT; Schema: public; Owner: intradox3; Tablespace: 
--

ALTER TABLE ONLY document_document
    ADD CONSTRAINT document_document_pkey PRIMARY KEY (id);


--
-- Name: document_pkey1; Type: CONSTRAINT; Schema: public; Owner: intradox3; Tablespace: 
--

ALTER TABLE ONLY document
    ADD CONSTRAINT document_pkey1 PRIMARY KEY (id);


--
-- Name: document_search_pkey1; Type: CONSTRAINT; Schema: public; Owner: intradox3; Tablespace: 
--

ALTER TABLE ONLY document_search
    ADD CONSTRAINT document_search_pkey1 PRIMARY KEY (id);


--
-- Name: favorite_pkey; Type: CONSTRAINT; Schema: public; Owner: intradox3; Tablespace: 
--

ALTER TABLE ONLY favorite
    ADD CONSTRAINT favorite_pkey PRIMARY KEY (id);


--
-- Name: journal_article_pkey; Type: CONSTRAINT; Schema: public; Owner: intradox3; Tablespace: 
--

ALTER TABLE ONLY journal_article
    ADD CONSTRAINT journal_article_pkey PRIMARY KEY (id);


--
-- Name: log_pkey; Type: CONSTRAINT; Schema: public; Owner: intradox3; Tablespace: 
--

ALTER TABLE ONLY log
    ADD CONSTRAINT log_pkey PRIMARY KEY (id);


--
-- Name: person_pkey; Type: CONSTRAINT; Schema: public; Owner: intradox3; Tablespace: 
--

ALTER TABLE ONLY person
    ADD CONSTRAINT person_pkey PRIMARY KEY (id);


--
-- Name: person_username_key; Type: CONSTRAINT; Schema: public; Owner: intradox3; Tablespace: 
--

ALTER TABLE ONLY person
    ADD CONSTRAINT person_username_key UNIQUE (username);


--
-- Name: post_pkey; Type: CONSTRAINT; Schema: public; Owner: intradox3; Tablespace: 
--

ALTER TABLE ONLY post
    ADD CONSTRAINT post_pkey PRIMARY KEY (id);


--
-- Name: project_person_pkey; Type: CONSTRAINT; Schema: public; Owner: intradox3; Tablespace: 
--

ALTER TABLE ONLY project_person
    ADD CONSTRAINT project_person_pkey PRIMARY KEY (id);


--
-- Name: project_pkey; Type: CONSTRAINT; Schema: public; Owner: intradox3; Tablespace: 
--

ALTER TABLE ONLY project
    ADD CONSTRAINT project_pkey PRIMARY KEY (id);


--
-- Name: super_pkey; Type: CONSTRAINT; Schema: public; Owner: intradox3; Tablespace: 
--

ALTER TABLE ONLY super
    ADD CONSTRAINT super_pkey PRIMARY KEY (id);


--
-- Name: theme_pkey; Type: CONSTRAINT; Schema: public; Owner: intradox3; Tablespace: 
--

ALTER TABLE ONLY theme
    ADD CONSTRAINT theme_pkey PRIMARY KEY (id);


--
-- Name: document_corporate_author_idx; Type: INDEX; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE INDEX document_corporate_author_idx ON document USING hash (corporate_author);


--
-- Name: document_topic_idx; Type: INDEX; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE INDEX document_topic_idx ON document USING btree (topic);


--
-- Name: document_type_idx; Type: INDEX; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE INDEX document_type_idx ON document USING btree (type);


--
-- Name: textsearch_idx; Type: INDEX; Schema: public; Owner: intradox3; Tablespace: 
--

CREATE INDEX textsearch_idx ON document USING gin (search_vector);


--
-- Name: automated_project_log; Type: TRIGGER; Schema: public; Owner: intradox3
--

CREATE TRIGGER automated_project_log AFTER INSERT ON project FOR EACH ROW EXECUTE PROCEDURE update_project_log();


--
-- Name: correspondence_fk; Type: FK CONSTRAINT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY correspondence
    ADD CONSTRAINT correspondence_fk FOREIGN KEY (document_id) REFERENCES document(id) ON DELETE CASCADE;


--
-- Name: document_document_fk; Type: FK CONSTRAINT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY document_document
    ADD CONSTRAINT document_document_fk FOREIGN KEY (document_id_a) REFERENCES document(id);


--
-- Name: document_document_fk1; Type: FK CONSTRAINT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY document_document
    ADD CONSTRAINT document_document_fk1 FOREIGN KEY (document_id_b) REFERENCES document(id);


--
-- Name: document_search_fk; Type: FK CONSTRAINT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY document_search
    ADD CONSTRAINT document_search_fk FOREIGN KEY (project_id) REFERENCES project(id);


--
-- Name: favorite_fk1; Type: FK CONSTRAINT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY favorite
    ADD CONSTRAINT favorite_fk1 FOREIGN KEY (person_id) REFERENCES person(id) ON DELETE CASCADE;


--
-- Name: journal_article_fk; Type: FK CONSTRAINT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY journal_article
    ADD CONSTRAINT journal_article_fk FOREIGN KEY (document_id) REFERENCES document(id) ON DELETE CASCADE;


--
-- Name: log_fk; Type: FK CONSTRAINT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY log
    ADD CONSTRAINT log_fk FOREIGN KEY (person_id) REFERENCES person(id);


--
-- Name: person_fk; Type: FK CONSTRAINT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY person
    ADD CONSTRAINT person_fk FOREIGN KEY (theme_id) REFERENCES theme(id);


--
-- Name: post_fk1; Type: FK CONSTRAINT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY post
    ADD CONSTRAINT post_fk1 FOREIGN KEY (person_id) REFERENCES person(id);


--
-- Name: project_person_fk; Type: FK CONSTRAINT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY project_person
    ADD CONSTRAINT project_person_fk FOREIGN KEY (project_id) REFERENCES project(id) ON DELETE CASCADE;


--
-- Name: project_person_fk1; Type: FK CONSTRAINT; Schema: public; Owner: intradox3
--

ALTER TABLE ONLY project_person
    ADD CONSTRAINT project_person_fk1 FOREIGN KEY (person_id) REFERENCES person(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

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
	RETURN QUERY SELECT * FROM snook_findposts(r.id); 
  END LOOP;
  RETURN;
END;
$body$
LANGUAGE 'plpgsql'
VOLATILE
RETURNS NULL ON NULL INPUT
SECURITY INVOKER
COST 100 ROWS 1000;

CREATE OR REPLACE FUNCTION public.intradox_update_document_counts (
)
RETURNS void AS
$body$
BEGIN
  UPDATE public.project set document_count = (select count(*) from public.document WHERE project.id = document.project_id);
END;
$body$
LANGUAGE 'plpgsql'
VOLATILE
RETURNS NULL ON NULL INPUT
SECURITY INVOKER
COST 100;