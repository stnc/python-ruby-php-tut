package main

/*2 gecelik toplam 10 saatlik çalışma
2 adet ücretsiz kitap ve stackoverflow dan yararlandım
neeler öğrendm
tip dönüşümleria
fonksiyon oluşturma
fonksyondan multple return yapmak
mysql bağlantısı crud işlemleri
basit hata kontrolu
zip / unzip 
dosya yazma , oluşturma
veri tipinin türü
dosyaları kopyalama ,yazma ,silme ,taşıma işlemleri 
github dan kütüphane çekme

C:\Go\bin\go get -u github.com/fatih/color
bu komut go ile github dan kutuphaneyi direk çekmeyi sağlar
*/
import (
	"fmt"
	"stnc"
	"stnc/file"
)

func main() {
	NewVersionNumberGenerate := stnc.NewVersionNumberGenerate()
	fmt.Println(NewVersionNumberGenerate)
	StncInformation := fileOperations.StncInformation(NewVersionNumberGenerate)
	fmt.Println(fileOperations.SQLislemleri(StncInformation))
	fileOperations.DosyaVersionBilgisiOlustur(StncInformation)
}
