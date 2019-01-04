#export PATH=$PATH:/usr/local/go/bin
export PATH=$GOPATH:/usr/local/go/bin

mkdir -p $GOPATH/src/stnc 

cd $GOPATH/src/stnc 

cp  /home/pi/raspi-golang-config-master/file/stnc /src/stnc/
cp  /home/pi/raspi-golang-config-master/file/stnc.go /src/stnc/
cp  /home/pi/raspi-golang-config-master/file/script.sh /src/stnc/

#ssh 

sudo crontab -e

*/30 * * * * /src/stnc/script.sh

*/25 * * * * /src/stnc/stnc

sudo service cron start

chmod +x script.sh

go get

go build
cd /src/stnc 
#./stnc




