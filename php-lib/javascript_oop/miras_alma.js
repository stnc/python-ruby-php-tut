//metod tanımlama 

 Insan = new Object()
    {
        Insan.Ad = "selman",
        Insan.Cinsiyet = "tunc"
    }
 
  // alert(Insan.Ad + " " + Insan.Cinsiyet);
   
    
obje1 ={ninjad:"kadara kunza"};
 alert("Merhaba ben " + obje1.ninjad )

function saygilar (){
	 alert ("saygılar bizden");
 }
 new saygilar();


// / miras alma
//http://cagatayyildiz.com/javascript-inheritance/
function Canli() {
	Canli.prototype.Start = function() {
		console.log("Oyun başladı");
	}
	
	Canli.prototype.Cansucum = function() {
		console.log("cansum geldi ");
	}
	
	this.Ad = "cansum";
}
canlidan = new Canli();
canlidan.Start();
canlidan.Cansucum();



function Ninja() {
	this.KilicTur = "Hattori hanzo";
}

Ninja.prototype = new Canli();

var nj = new Ninja();

nj.Start();


alert(nj.Ad);


function Ninja1(ad, kilic) {
    this.isim = ad;
    this.kilictur = kilic;
    console.log(ad + " oyuna girdi" + "Ninjanın kılıcı " + kilic);
    }

ninja2 = new Ninja1("donatello","hattori hanzo");

ninja2.constructor("rafael", "katana") ;