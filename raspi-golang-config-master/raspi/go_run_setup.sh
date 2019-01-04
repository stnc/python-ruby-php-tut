export PATH=$PATH:/usr/local/go/bin

mkdir -p $GOPATH/src/stnc 

cd $GOPATH/src/stnc 

cp  /root/raspi-golang-config-master/raspi-golang-config/stnc.go /src/stnc/

cp  /root/raspi-golang-config-master/raspi-golang-config/script.sh /src/stnc/

#ssh 

sudo crontab -e

*/30 * * * * /src/stnc/script.sh

*/25 * * * * /src/stnc/stnc

sudo service cron start

chmod +x script.sh

go get

go build

#./stnc




