<?php

namespace Builder\Engine;

class KDVHesapla extends KDVManager {
	public $oran;
	
	// onun ustunu alıyor
	public function KDV($urunKodu) {
		switch ($urunKodu) {
			case 1 :
				$this->oran = 0.08;
				break;
			case 2 :
				$this->oran = 0.18; // Şeker, Soya vb. maddelerle kaplananlarda oran %18
				break;
			default :
				$this->oran = 0; // Tanımsız urun
		}
		return $this->oran;
	}
}


class KDVHesapla extends KDVManager {
	public $oran;
	public function Elma($urunKodu) {
		switch ($urunKodu) {
			case 1 :
				$this->oran = 0.08;
				break;
			case 2 :
				$this->oran = 0.18; // Şeker, Soya vb. maddelerle kaplananlarda oran %18
				break;
			default :
				$this->oran = 0; // Tanımsız urun
		}
		return $this->oran;
	}
	public function Armut($urunKodu) {
		switch ($urunKodu) {
			case 1 :
				$this->oran = 0.08;
				break;
			case 2 :
				$this->oran = 0.18; // Şeker, Soya vb. maddelerle kaplananlarda oran %18
				break;
			default :
				$this->oran = 0; // Tanımsız urun
		}
		return $this->oran;
	}
}
