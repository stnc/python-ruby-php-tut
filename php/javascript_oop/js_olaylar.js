Insan = new Object()
{
	Insan.Ad = "Çağatay", Insan.Cinsiyet = "Erkek"
}

alert(Insan.Ad + " " + Insan.Cinsiyet)
// alternatif atama 2

Musteriler = {
	ad : "selman",
	soyad : "tunç"
};
alert(Musteriler.ad);

function Ninja(ad) {
	alert(ad + " oyuna girdi");
}

ninja = new Ninja("donatello");

function Ninja2(ad, kilic) {
	this.isim = ad;
	this.kilictur = kilic;
	alert(ad + " oyuna girdi" + " Ninjanın kılıcı " + kilic)
}

ninja2 = new Ninja2("donatello", "hattori hanzo")

/*
 * Yukarıdaki örnekte oluşturduğumuz ninja1 değişkenine atadığımız değeri
 * dilersek sonradan kullanabiliriz. Örnek için
 */

alert(ninja2.isim)

// / miras alma

function Canli() {
	Canli.prototype.Start = function() {
		alert("Oyun başladı")
	}
	this.Ad = "Çağatay"
}

function NinjaS() {
	  this.KilicTur = "Hattori hanzo"
	}

NinjaS();