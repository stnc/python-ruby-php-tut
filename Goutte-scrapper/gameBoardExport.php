<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

function write($text)
{
    //  $text = "Cats chase mice\n";
    $filename = "somefile.txt";
    $fh = fopen($filename, "a");
    fwrite($fh, $text);
    fclose($fh);
}

require_once 'vendor/autoload.php';
include "config.php";

$db = new stnc\db\MysqlAdapter();
$tableName = 'mytable';


$q = "SELECT * FROM mytable where boardgamegeek_url<>'no' and boardgamegeek_url<>''";
$array_expression = $db->fetchAll($q);
foreach ($array_expression as $value) {
    echo $url = $value ['boardgamegeek_url'];
    echo $id = $value ['id'];

    $jdata = 'phantomjs printSource.js ' . $url . ' > ' . $id . '.html';
    $data = $jdata . PHP_EOL;
    $fp = fopen('boardgamegeek.sh', 'a');

    $data_row = array(
        'boardgamegeek_export_yapildi' => 1
    );

    $where = array(

        'id' => $id,
    );

    $db->update($tableName, $data_row, $where);


    fwrite($fp, $data);


}