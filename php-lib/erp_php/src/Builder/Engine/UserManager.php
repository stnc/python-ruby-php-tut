<?php

namespace Builder\Engine;
use Symfony\Component\HttpFoundation\Response;
class UserManager {
	protected $title;
	protected $standart_title = " Baglantisi";
	
	/**
	 * Create a new file configuration loader.
	 *
	 * @param \Illuminate\Filesystem\Filesystem $files        	
	 * @param string $defaultPath        	
	 * @return void
	 * 
	 */
	public function Facebook_Connect($deneme = NULL) {
		// $this->title=__FUNCTION__.$this->standart_title;
		$this->title = __CLASS__ . $this->standart_title;
	
		$response = new Response('Hello World!', 200, array('Content-Type' => 'text/plain'));
		$response->send();
		return $this->title.' '.$deneme;
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

