<?php

if ( ! defined( 'DS' ) ) {
	define( 'DS', DIRECTORY_SEPARATOR );
}
if ( ! defined( 'CRLF' ) ) {
	define( 'CRLF', PHP_EOL );
}


//https://regex101.com/r/Lbtd6T/1

$new_log_file = "f_t_p_run.txt";
$new_ftp_file ="mkdir_file.txt";

function make_utf8( $file ) {
	/*
$data = file_get_contents($file);
$data = mb_convert_encoding($data, 'UTF-8', 'ANSI');
*/

	$content = file_get_contents( $file );
	$file_handle = fopen( "" . $file, "wb" ) or die( "can't open file" );
	fwrite( $file_handle, iconv( 'UTF-16LE', 'UTF-8', $content ) );
	fclose( $file_handle );

	return true;


}

function run( $param = false ) {
		global $new_log_file;
		global $new_ftp_file;
	$file = 'richCopy.log';

	if ( $param=='mkdir_for'){
			make_utf8( $file );
				$str = file_get_contents( $file );
	temizle( $new_ftp_file );
		$matches = make_regex( $str );
		
		foreach_mkdir( $matches, $new_ftp_file );
	} else {
		
	make_utf8( $file );
	$str = file_get_contents( $file );
	temizle( $new_log_file );
	$matches = make_regex( $str );
		foreach_( $matches, $new_log_file );
	}

//return  $matches;
}

/*importat ftp*/
function on_ek($file) {
	_save_file( '# https://winscp.net/eng/docs/scripting', $file );
	_save_file( '# Connect a user', $file );
//	_save_file( 'open ftp://chftpupload@chromthemes.com:McVK1ZD4Q1=y@chromthemes.com/', $file );
	$user="";
	$pass="";
	_save_file( 'open ftp://'.$user.'@chromthemes.com:'.$pass.'@chromthemes.com/', $file );
	_save_file( '# Upload the file to current working directory', $file );
}

function son_ek($file) {
	_save_file( '#Disconnect', $file );
	_save_file( 'close', $file );
	_save_file( '#Exit WinSCP', $file );
	_save_file( 'exit', $file );
}


function foreach_( $data, $file ) {
	on_ek( $file);
	foreach ( $data as $key => $value ) {

		$cd_name = cd_path_replace( $value[1] );
		if ( $cd_name['dirname'] == '\\' && ! isset( $cd_name['extension'] ) ) {
			continue;
		}
		if ( $cd_name['dirname'] == '\\' && isset( $cd_name['extension'] ) ) {
			$cd_name['dirname'] = '/';
		}
		/* ////eksra durumlar icin
		else {
			komut_belirle($cd_name  );
		}*/
		_save_file( 'cd ' . $cd_name['dirname'], $file );
		_save_file( 'put ' . $value[1], $file );

	}
		_save_file( 'put ' . 'D:\xampp\htdocs\nucleon.dev\wp-content\themes\nucleon\includes\live_config.php', $file );
	son_ek($file);
}


function foreach_mkdir( $data, $file ) {

	on_ek($file);
	foreach ( $data as $key => $value ) {

				$cd_name = cd_path_replace( $value[1] );

		if ( $cd_name['dirname'] == '\\' && isset( $cd_name['extension'] ) ) {
			$cd_name['dirname'] = '/';
		}
		
		if ( $cd_name['dirname'] == "\/"  ) {
			$cd_name['dirname'] = '/';
		}
		
				if  ( ! isset( $cd_name['extension'] ) ) {

		$yeni_dizi[]=$cd_name['dirname'];
		
	} 
		
		
	}
	//aynı olan elemanları diziden sil 
	//http://php.net/manual/tr/function.array-unique.php#70786
		$unique = array_merge(array_flip(array_flip($yeni_dizi))); 
		unset( $unique[0]);
	
		
	foreach ( $unique as $key => $value ) {
					
		//eğer yeni klasor açmışsam inşallah unutmazsam buraya eklerim --buraya elle ekleme yapıyoruz 
		//_save_file( 'mkdir ' . '/yeni_acilan_klasor/bla', $new_log_file );
		_save_file( 'mkdir ' . $value, $file );//otmaitk acan kısım
	
	} 
	
//el ile olausack kısım 
		_save_file( 'mkdir ' . '/woocommerce/auth', $file );
		_save_file( 'mkdir ' . '/woocommerce/cart', $file );
		_save_file( 'mkdir ' . '/woocommerce/my-includes/add-cart', $file );
		_save_file( 'mkdir ' . '/woocommerce/my-includes/quickview', $file );
		_save_file( 'mkdir ' . '/woocommerce/emails/plain', $file );
		_save_file( 'mkdir ' . '/woocommerce/checkout', $file );
		_save_file( 'mkdir ' . '/woocommerce/global', $file );
		_save_file( 'mkdir ' . '/woocommerce/loop', $file );
		_save_file( 'mkdir ' . '/woocommerce/myaccount', $file );
		_save_file( 'mkdir ' . '/woocommerce/notices', $file );
		_save_file( 'mkdir ' . '/woocommerce/order', $file );
		_save_file( 'mkdir ' . '/woocommerce/single-product/add-to-cart', $file );
		_save_file( 'mkdir ' . '/woocommerce/single-product/tabs', $file );
		
	son_ek($file);
}





function make_regex( $str ) {

	$re = '/Copied : (.+),/m';


	preg_match_all( $re, $str, $matches, PREG_SET_ORDER, 0 );

	return $matches;
}


function _save_file( $data, $file ) {


	$dosyam = fopen( $file, 'aw' ) or die ( "Dosya açılamadı!" );
	$yazi = "$data\n";
	fwrite( $dosyam, $yazi );
	fclose( $dosyam );
	//echo "eklendi<br>";
}


function temizle( $file ) {
	if ( file_exists( $file ) ) {
		unlink( $file );
	}
}

function cd_path_replace( $value ) {

	//$a=str_replace('D:\xampp\htdocs\nucleon.dev\wp-content\themes\nucleon',"",'D:\xampp\htdocs\nucleon.dev\wp-content\themes\nucleon\includes\plugins\ReduxFramework\inc\extensions\wbc_importer\wbc_importer\inc');
	$a = str_replace( 'D:\xampp\htdocs\nucleon.dev\wp-content\themes\nucleon', "", $value );
	$a = str_replace( "\\", "/", $a );

// $a=substr($a, 1);

	$return = pathinfo( $a );


	return $return;

}


function komut_belirle_old( $value ) {
	global $new_log_file;
	global $new_ftp_file;
	
	if ( ! isset( $value['extension'] ) ) {
		//eğer yeni klasor açmışsam inşallah unutmazsam buraya eklerim --buraya elle ekleme yapıyoruz 
		//_save_file( 'mkdir ' . '/yeni_acilan_klasor/bla', $new_log_file );
		_save_file( 'mkdir ' . $value['dirname'], $new_log_file );//otmaitk acan kısım
	} else {
		_save_file( 'cd ' . $value['dirname'], $new_log_file );
	}
}

function test1( $p ) {
	echo 'Dizin ';
}


for ( $i = 0; $i < count( $argv ); $i ++ ) {

	if ( $argv [ $i ] == '-s' ) {
		$param = $argv [ $i + 1 ];
		run( $param );
	} else if ( $argv [ $i ] == '-mkdir' ) {
		$param = $argv [ $i + 1 ];
		run( $param );
	} else if ( $argv [ $i ] == '-f' ) {
		$param = $argv [ $i + 1 ];
		test2( $param );
	} else if ( $argv [ $i ] == '--override' ) {

		test3( 'override dan gelen  ' );
	}
}


if ( $argc < 2 ) {
	$file = basename( __FILE__ );
	print "STNC ftp upload" . CRLF;
	print "Usage: php -f $file -- -s komut \n [--override -d output_dir -f output_filename]" . CRLF;
	exit ();
}

