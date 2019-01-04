# raspi-golang-config

#link https://selmantunc.com/post/169596314887/install-golang-on-raspberry-pi

sudo apt-get -y purge wolfram-engine && sudo apt-get clean && sudo apt-get autoremove && sudo apt-get -y remove --purge libreoffice* && sudo apt-get clean && sudo apt-get autoremove 
&& sudo apt-get install && sudo apt-get install rpi-update && rpi-update && sudo apt-get update && sudo apt-get install mysql-server && mysql_secure_installation

wget https://storage.googleapis.com/golang/go1.9.2.linux-armv6l.tar.gz

tar -C /usr/local -xzf go1.9.2.linux-armv6l.tar.gz

export PATH=$PATH:/usr/local/go/bin

mysql -u root -pyourpassword


### ssh 

fdisk -l

mkdir /mnt/SD 

mount /dev/sda1 /mnt/SD 

cd  /mnt/SD 

mkdir $(date +%Y_%m_%d-%H%M)

cd $(date +%Y_%m_%d-%H%M)

mysqldump -u root -pyourpassword crawler > crawler.sql

zip -r craw.zip *

rm -rf crawler.sql

#ls -altrh

#ssh çalıştırma

chmod +x script.sh

*/20 * * * *  /src/stnc/script.sh

*/10 * * * * /src/stnc/stnc

## Raspbian Swap
 
Raspian uses a script dphys-swapfile to manage swap. 
The standard image includes this turned on by default. 

The configuration files is located at /etc/dphys-swapfile. 

The only parameter in the file is CONF_SWAPSIZE=100 which creates a 100MB swapfile in /var/swap. 

As mentioned above, putting the swapfile in /var is not a good idea because that directory is on your SD card. 

You can change the file location with CONF_SWAPFILE=/your/file/location. My /etc/dphys-swapfile looks like this




free -h

nano /etc/dphys-swapfile

CONF_SWAPSIZE=1024

CONF_SWAPFILE=/mnt/sda1/swap.file

NOTE: sda1 is my usb hard drive which is automounted.
