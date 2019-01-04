fdisk -l

mkdir /mnt/SD 

mount /dev/sda1 /mnt/SD 

cd  /mnt/SD 

mkdir $(date +%Y_%m_%d-%H%M)

cd $(date +%Y_%m_%d-%H%M)

mysqldump -u root -pcansum123 crawler > crawl.sql

zip -r craw.zip *

rm -rf crawl.sql

