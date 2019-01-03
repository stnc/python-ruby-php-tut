<?php

namespace Builder\Engine\KDV;

use Builder\Engine\KDVManager;

class Armut extends KDVManager {
	public $oran;
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