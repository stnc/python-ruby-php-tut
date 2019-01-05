<?php

namespace Test\Model;

class UserManager {
	protected $title;
	protected $standart_title = " Baglantisi";
	
	/**
	 * facebook ba�lant� ayarlar�
	 *
	 * @param string $deneme        	
	 * @return void
	 */
	public function Facebook_Connect($deneme = NULL) {
		// $this->title=__FUNCTION__.$this->standart_title;
		$this->title = __CLASS__ . $this->standart_title;
		return $this->title;
	}
	public function Google_Conncet() {
		$this->title = __FUNCTION__ . $this->standart_title;
		return $this->title;
	}
	public function Twitter_Conncet() {
		$this->title = __FUNCTION__ . $this->standart_title;
		return $this->title;
	}
	public function Github_Conncet() {
		$this->title = __FUNCTION__ . $this->standart_title;
		return $this->title;
	}
	public function OpenID_Conncet() {
		$this->title = __FUNCTION__ . $this->standart_title;
		return $this->title;
	}
}