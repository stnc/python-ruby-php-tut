chmod 777 stnc
ulimit -s 1024     # set the thread stack limit to 1mb
ulimit -s          # check that it worked

mkdir -p /src/stnc 
cd  src/stnc 
cp  /root/raspi-golang-config-master/dietpi/stnc /src/stnc/
cp  /root/raspi-golang-config-master/dietpi/stnc.go /src/stnc/
cp  /root/raspi-golang-config-master/dietpi/script.sh /src/stnc/

#ssh 

sudo crontab -e

*/30 * * * * /src/stnc/script.sh

*/25 * * * * /src/stnc/stnc

sudo service cron start

chmod +x script.sh