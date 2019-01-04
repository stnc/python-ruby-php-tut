mysql -u root -p
CREATE DATABASE crawler;
unzip craw.zip
mysql --max_allowed_packet=256M  -u root -p crawler < ist_firma_rehber_kategori_sayfalar.sql
