<?php

require 'vendor/autoload.php';

use Goutte\Client;

//https://vegibit.com/php-simple-html-dom-parser-vs-friendsofphp-goutte/
//https://stackoverflow.com/questions/29073923/issue-with-scraping-a-list-to-get-href-using-goutte-and-php

//http://safeerahmed.uk/web-scraping-101-with-php-and-goutte

include("config.php");

$db = new stnc\db\MysqlAdapter();
$tableName = 'mytable';
$aktarilan_ = 'aktailan_';
die("done idE");

$q = "SELECT * FROM aktailan_ ";

$array_expression = $db->fetchAll($q);

foreach ($array_expression as $value) {
    echo $amazonurl = $value ['amazon_url'];
    echo $funagain_url= $value ['funagain_url'];
    echo $boardgamegeek_url= $value ['boardgamegeek_url'];
    echo $id = $value ['id'];




    $data_row = array(
        'funagain_url' => $funagain_url,
        'amazon_url' => $amazonurl,
        'boardgamegeek_url' => $boardgamegeek_url,
    );

    $where = array(
        'id' => $id,
    );

    $db->update($tableName, $data_row, $where);

}


