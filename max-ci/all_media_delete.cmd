color 2
ECHO -----------------------Media silme ---------------------------

call yedekle_sql.cmd

rem ECHO. ---revision siliniyor -------
rem "D:\xampp\mysql\bin\mysql.exe" --user=root --password= --default-character-set=utf8  nucleon_dev -e "DELETE a,b,c FROM wp_posts a LEFT JOIN wp_term_relationships b ON (a.ID = b.object_id) LEFT JOIN wp_postmeta c ON (a.ID = c.post_id) WHERE a.post_type = 'revision'"


"D:\xampp\mysql\bin\mysql.exe" --user=root --password= --default-character-set=utf8  nucleon_dev -e "DELETE FROM wp_postmeta WHERE meta_key="_thumbnail_id" and  post_id IN (SELECT id FROM wp_posts WHERE post_type = 'attachment');"

"D:\xampp\mysql\bin\mysql.exe" --user=root --password= --default-character-set=utf8  nucleon_dev -e "DELETE FROM wp_posts WHERE post_type = 'attachment';"

"D:\xampp\mysql\bin\mysql.exe" --user=root --password= --default-character-set=utf8  nucleon_dev -e "DELETE FROM wp_postmeta WHERE meta_key = '_thumbnail_id';"

echo media silme tamamlandı