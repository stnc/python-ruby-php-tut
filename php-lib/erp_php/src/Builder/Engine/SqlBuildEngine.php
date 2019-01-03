<?php

namespace Builder\Engine;

class SqlBuildEngine {
	protected $title;
	protected $standart_title = " Baglantisi";
	
	/**
	 * Create a new file configuration loader.
	 *
	 * @param \Illuminate\Filesystem\Filesystem $files        	
	 * @param string $defaultPath        	
	 * @return void
	 */
	public function Facebook_Connect($deneme = NULL) {
	//	include ('vendor/ezsql/mysql/ez_sql_mysql.php');
		//$db = new ezSQL_mysql ( 'root', '', 'test', 'localhost' );
		$current_time = $db->get_var ( "SELECT " . $db->sysdate () );

		return $this->title;
	}


}