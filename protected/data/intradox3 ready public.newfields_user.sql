SELECT
  public.newfields_user.id as legacy_id,
  public.newfields_user.username,
  md5(public.newfields_user.password) as password,
  public.newfields_user.fullname as title,
  public.newfields_user.userlevel + 1 as userlevel,
  public.newfields_user.email,
  public.newfields_user.phone
FROM
  public.newfields_user
