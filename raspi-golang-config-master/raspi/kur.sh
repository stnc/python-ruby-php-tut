sudo apt-get -y purge wolfram-engine && sudo apt-get clean && sudo apt-get autoremove && sudo apt-get -y remove --purge libreoffice* && sudo apt-get clean && sudo apt-get autoremove && sudo apt-get install && sudo apt-get install rpi-update && rpi-update 

wget https://storage.googleapis.com/golang/go1.9.2.linux-armv6l.tar.gz

tar -C /usr/local -xzf go1.9.2.linux-armv6l.tar.gz

export PATH=$PATH:/usr/local/go/bin

cp  /home/pi/stnc.go /src/stnc/stnc

mkdir -p $GOPATH/src/stnc 
cd $GOPATH/src/stnc 
go get
go build
./stnc

#ssh 
cp  /home/pi/script.sh /src/stnc/stnc
sudo crontab -e

*/30 * * * * /src/stnc/script.sh

*/25 * * * * /src/stnc/stnc

chmod +x script.sh

sudo service cron start
