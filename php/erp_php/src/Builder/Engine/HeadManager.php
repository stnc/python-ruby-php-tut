<?php

namespace Builder\Engine;




class HeadManager implements LayoutInterfaceManager {
	public $title;
	
	// bu kısım config içine alınabilir
	protected $css_path = "", $face, $Bootsrap, $EasyUI, $JqueryMobil;
	public function Bootsrap($value) {
		//eklendi karmaşık bağlantı 
		$user =new UserManager();
		echo $user->Facebook_Connect("sa");
		$this->Bootsrap = '<h2>' . __FUNCTION__ . ' sınıfı ' . $value . '</h2>';
		return $this;
	}
	public function EasyUI($value) {
		$this->EasyUI = '<h2>' . __FUNCTION__ . ' sınıfı ' . $value . '</h2>';
		return $this;
	}
	public function JqueryMobil($value) {
		$this->JqueryMobil = '<h2>' . __FUNCTION__ . ' sınıfı ' . $value . '</h2>';
		return $this;
	}
	public function EasyUIMobil($value) {
		return '<h2>' . __FUNCTION__ . ' sınıfı ' . $value . '</h2>';
	}
	public function AllFace() {
		echo $this->Bootsrap . " " . $this->EasyUI . " " . $this->JqueryMobil;
		;
	}
	
	/*
	 * metod zincirleme orneği yada
	 * Fluent Interface Design Pattern
	 *
	 * public $sonuc = 0;
	 *
	 * function topla($sayi) {
	 * $this->sonuc = $this->sonuc + $sayi;
	 * return $this;
	 * }
	 *
	 * function carp($sayi) {
	 * $this->sonuc = $this->sonuc * $sayi;
	 * return $this;
	 * }
	 *
	 * function sonuc() {
	 * echo $this->sonuc;
	 * }
	 * }
	 *
	 *
	 * $x->topla(5)->carp(10)->sonuc();
	 *
	 *
	 * public $name , $age ,$job , $city;
	 *
	 * public function Name($name) {
	 * $this->name = $name;
	 * return $this;
	 * }
	 *
	 * public function Age($age) {
	 * $this->age = $age;
	 * return $this ;
	 * }
	 *
	 * public function Job($job) {
	 * $this->job = $job;
	 * return $this;
	 * }
	 *
	 * public function City($city) {
	 * $this->city = $city;
	 * return $this;
	 * }
	 *
	 * }
	 *
	 * $Personnel = new Personnel;
	 * $Personnel->Name('Oğuz KOÇ')
	 * ->Age('26')
	 * ->Job('PHP Developer')
	 * ->City('İstanbul');
	 *
	 * echo $Personnel->name;
	 *
	 * /////// farklı ornek
	 *
	 * public function setAd($ad){
	 * $this->_ad = $ad;
	 * return $this;
	 * }
	 *
	 * public function setSoyad($soyad){
	 * $this->_soyad = $soyad;
	 * return $this;
	 * }
	 *
	 * public function setDogum($DogumTarihi){
	 * $this->_DogumTarihi = $DogumTarihi;
	 * return $this;
	 * }
	 *
	 * public function getOgrenci(){
	 * return $this->_ad . " " . $this->_soyad . " " . $this->_DogumTarihi;
	 * }
	 *
	 * $ornek = new Ogrenci;
	 *
	 * $ornek->setAd('Ali')
	 * ->setSoyad('Demir')
	 * ->setDogum('2002');
	 *
	 * echo $ornek->getOgrenci();
	 */
	
	/**
	 * ust kısımdaki head yerleşimini sağlar
	 *
	 * @param string $deneme        	
	 * @return string
	 */
	public function GetHead($deneme = NULL) {
		return '<!DOCTYPE html>
    	<html>
    	<head>
    	<meta charset="UTF-8">' . '<title>' . $this->title . '</title>' . '<link rel="stylesheet" type="text/css" href="public/easyui/themes/default/easyui.css">
    	<link rel="stylesheet" type="text/css" href="public/easyui/themes/icon.css">
    	<link rel="stylesheet" type="text/css" href="public/easyui/demo.css">
    	<script type="text/javascript" src="public/jquery/jquery.min.js"></script>
    	<script type="text/javascript" src="public/easyui/jquery.easyui.min.js"></script>
    	</head>';
	}
	
	/**
	 * title başlığı set eder
	 *
	 * @param string $title        	
	 * @return void
	 */
	public function Set_SiteTitle($title) {
		$this->title = $title;
	}
	
	/**
	 * panel oluşturma kodu
	 * 
	 * @param string $title        	
	 * @param string $width        	
	 * @param string $height        	
	 * @return string
	 */
	public function GetPanel($title, $footer = NULL, $width = '100%', $height = '600px') {
		if ($footer != NULL) {
			$footer_data_op = 'data-options="footer:\'#ft\'"';
			$footer = '<div id="ft" style="padding:5px;">
             ' . $footer . '
             </div>';
		} else
			$footer_data_op = "";
		
		return 

		$this->GetHead () . '
    <body>
    <div class="easyui-panel" title="' . $title . '" style="width:' . $width . ';height:' . $height . ';" ' . $footer_data_op . '>
    </div>
    ' . $footer . $this->GetFooter ();
	}
	
	/**
	 * footer
	 *
	 * @return string
	 */
	public function GetFooter() {
		return '</body></html>';
	}
}

