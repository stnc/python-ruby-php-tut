<?php

require 'vendor/autoload.php';

use Goutte\Client;

//https://vegibit.com/php-simple-html-dom-parser-vs-friendsofphp-goutte/
//https://stackoverflow.com/questions/29073923/issue-with-scraping-a-list-to-get-href-using-goutte-and-php

//http://safeerahmed.uk/web-scraping-101-with-php-and-goutte

include("config.php");

$db = new stnc\db\MysqlAdapter();
$tableName = 'mytable';


$q = "SELECT * FROM mytable where  amazon_base_image<>'' and  amazon_img_download=0";

$array_expression = $db->fetchAll($q);

foreach ($array_expression as $value) {
     $url = $value ['amazon_url'];
     $id = $value ['id'];
     echo '<br>';
    echo $amaon_img = $value ['amazon_base_image'];



    $ch = curl_init($amaon_img);
    $fp = fopen('amazonimg/aBig'.$id.'.jpg', 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);


    $data_row = array(
        'amazon_img_download' => 1,
        'amazon_resim_local' => 'http://scrapper.beonmobile.co/resim/aBig'.$id.'.jpg',
    );

    $where = array(
        'id' => $id,
    );

    $db->update($tableName, $data_row, $where);

}



//echo base64_to_jpeg($Img,'res.jpg');

function base64_to_jpeg($base64_string, $output_file)
{
    // open the output file for writing
    $ifp = fopen($output_file, 'wb');

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode(',', $base64_string);

    // we could add validation here with ensuring count( $data ) > 1
    fwrite($ifp, base64_decode($data[1]));

    // clean up the file resource
    fclose($ifp);

    return $output_file;
}

