package stnc

import (
	"stnc/db"

	"strconv"
	"strings"
)

//NewVersionNumberGenerate bla
/*
nasıl çalışır
örnek versiyon numarası 3.10.6 olsun bunu . dan parçalara ayırır
son parça 6 yı bir artırır --> 7
ortaki parçayı bir artırır --> 11
 parça ise sondaki parçaya bağımlıdır sondaki parça 50 olmadığı sürece artmaz --> 3
return 3.11.7*/
func NewVersionNumberGenerate() string {
	ver := db.LastVersion()

	/*if item == nil {
		return 0, false
	}*/
	vers := strings.Split(ver.LastVersionNumber, ".")

	//fmt.Printf("%q\n", vers)
	//son_versiyon_sayisi := vers[1]
	//println((son_versiyon_sayisi))
	//fmt.Printf("%T\n", son_versiyon_sayisi)//veri tipini verir
	//println(len(son_versiyon_sayisi)) // burası kaç basamak var
	//yada kaç adet onu verecek kaç kelime var vs
	//1 kumelere ayır
	//var ortadaki_kisim int

	ilkKisim, e := strconv.Atoi(vers[0]) //string i integer a cevirme
	if e != nil {
		checkErr(e)
	}
	ortadakiKisim, e := strconv.Atoi(vers[1]) //string i integer a cevirme
	if e != nil {
		checkErr(e)
	}

	sonKisim, e := strconv.Atoi(vers[2]) //string i integer a cevirme
	if e != nil {
		checkErr(e)
	}

	if ortadakiKisim <= 10 {
		ortadakiKisim++
	}

	if sonKisim >= 99 {
		ilkKisim++ //yeni versiyona gec
		ortadakiKisim = 0
		sonKisim = 0
	} else {
		sonKisim++
	}
	return strconv.Itoa(ilkKisim) + string('.') + strconv.Itoa(ortadakiKisim) + string('.') + strconv.Itoa(sonKisim)
	//	return strconv.Itoa(ilk_kisim) + strconv.Itoa(ortadaki_kisim) + strconv.Itoa(son_kisim

}

func checkErr(err error) {
	if err != nil {
		panic(err)
	}
}
