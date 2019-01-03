<?php
require_once 'vendor/autoload.php';


/*
 * use Symfony\Component\HttpFoundation\Response;
 * use Test\Model\Article as arc;
 * use Test\Model\UserManager as conn;
 * use Builder\Engine\UserManager as enn;
 *
 * $enn = new enn();
 * echo $enn->Facebook_Connect();
 *
 * echo '<br/>';
 *
 * $conn = new conn();
 * echo $conn->Facebook_Connect();
 */
/*
 * $response = new Response('Hello World!', 200, array('Content-Type' => 'text/plain'));
 * $response->send();
 */

use Builder\Engine\HeadManager;

$db = new ezSQL_mysql ( 'root', '', 'test', 'localhost' );
$current_time = $db->get_var ( "SELECT " . $db->sysdate () );
print "ezSQL demo for mySQL database run @ $current_time";
/*
if ()
  $file_size='2000000';//dosya boyutu
  $allowed_types='jpg,gif,png,ico';//izin verilen uzantılar
  $path='uploads';//yükleme yapılacak klasor
 
  $input_names =array();
  $input_names=$_FILES['uploadPic'];
 
  $Uploader = new stnc_file_upload();
 
  $Uploader->name_format (false,'st_','_nc');
 
 
  $Uploader->picture_control_value=true;//resimin gerçek olup olmadığını kontrol eçindir
 
  $Uploader->uploader_set($input_names, $path, $allowed_types,$file_size);//çalıştırıcı
 
  echo $Uploader->result_report(); //rapor hata vss
 */

// $head = new head();
$head = new Builder\Engine\HeadManager ();
$head->title = 'Deneme';

$head->Bootsrap ( '5' )->EasyUI ( '10' )->AllFace ();
$head->Set_SiteTitle ( "Merhaba" ); // override
echo $head->GetPanel ( "title" );

//$kdv = new Builder\Engine\KDVHesapla ();

$elma = new Builder\Engine\KDV\Elma ();
$armut = new Builder\Engine\KDV\Armut ();
echo "Elma, Ürün Kodu: 1 Fiyat: " . $elma->FiyatHesapla ( 200, 1 ) . " TL";
echo "<br>Armut , Ürün Kodu: 2 Fiyat: " . $armut->FiyatHesapla ( 200, 2 ) . " TL";

/*
use  Builder\Engine\SqlBuildEngine as EzEngine;
  $engine = new EzEngine();
echo $engine->Facebook_Connect();
*/

/*
  use Builder\Engine\UserManager as enn;
   $enn = new enn();
  echo $enn->Facebook_Connect();
 
*/
?>

<form action="" method="post" enctype="multipart/form-data">
	<input name="uploadPic[]" type="file" /> <br> <input name="uploadPic[]"
		type="file" /> <br> <input name="uploadPic[]" type="file" /> <br> <input
		name="uploadPic[]" type="file" /> <br> <input name="uploadPic[]"
		type="file" /> <br> <input name="uploadPic[]" type="file" /> <br> <input
		name="uploadPic[]" type="file" /> <br> <input name="upload"
		type="submit" value="Upload" />
</form>