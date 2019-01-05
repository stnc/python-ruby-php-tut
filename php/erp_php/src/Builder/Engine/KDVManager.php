<?php

namespace Builder\Engine;

abstract class KDVManager {
	abstract public function KDV($urunKodu);
	public function FiyatHesapla($fiyat, $urunKodu) {
		return $fiyat + ($fiyat * $this->KDV ( $urunKodu ));
	}
}


