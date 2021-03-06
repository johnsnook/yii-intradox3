SELECT
  public.document.id AS legacy_id,
  public.document.title,
  public.document.projectid as project_id,
  public.type.type,
  public.topic.topic,
  public.author.author AS corporate_author,
  public.document.electronicdocument AS filename,
  public.document.identification_number AS catalog_number,
  public.document.pages AS page_count,
  public.document.notes,
  CASE
    WHEN document.is_restricted = 1
      THEN TRUE
    WHEN document.is_restricted = 0
      THEN FALSE
  END AS restricted,
  public.document.received_on AS received_date,
  date_part('year', public.document.created_on) AS original_year,
  date_part('month', public.document.created_on) AS original_month,
  date_part('day', public.document.created_on) AS original_day
FROM
  public.document
  left JOIN public.author ON (public.document.authorid = public.author.id)
  left JOIN public.topic ON (public.document.topicid = public.topic.id)
  left JOIN public.type ON (public.document.typeid = public.type.id)

  where  isnumeric(pages) = true AND title IS NOT NULL

  order by id
