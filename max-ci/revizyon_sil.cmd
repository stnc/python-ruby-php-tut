color 2
ECHO -----------------------Revizyon silme ---------------------------
ECHO.
ECHO -----------Toplam revizyon adeti ------------------------
"D:\xampp\mysql\bin\mysql.exe" --user=root --password= --default-character-set=utf8  nucleon_dev -e "select count(*) FROM wp_posts a LEFT JOIN wp_term_relationships b ON (a.ID = b.object_id) LEFT JOIN wp_postmeta c ON (a.ID = c.post_id) WHERE a.post_type = 'revision'"

"D:\xampp\mysql\bin\mysql.exe" --user=root --password= --default-character-set=utf8  nucleon_dev -e "DELETE a,b,c FROM wp_posts a LEFT JOIN wp_term_relationships b ON (a.ID = b.object_id) LEFT JOIN wp_postmeta c ON (a.ID = c.post_id) WHERE a.post_type = 'revision'"

echo 'Revizyon silme tamamlandi'
