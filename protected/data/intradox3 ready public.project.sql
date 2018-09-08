SELECT
  public.project.id as legacy_id,
  public.project.project as title,
  CASE WHEN is_archived=1 THEN true
    WHEN is_archived=0 THEN false
       END as archived,
        CASE WHEN is_restricted=1 THEN true
    WHEN is_restricted=0 THEN false
       END as restricted
FROM
  public.project
