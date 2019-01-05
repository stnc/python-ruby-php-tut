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

//SELECT count(id) FROM mytable where funagain_url<>'no' and funagain_url<>''
$q = "SELECT * FROM mytable where funagain_url<>'no' and funagain_url<>''";
$array_expression = $db->fetchAll($q);
foreach ($array_expression as $value) {
    echo $url = $value ['funagain_url'];
    echo $id = $value ['id'];

    $jdata = 'phantomjs printSource.js ' . $url . ' > ' . $id . '.html';
    $data = $jdata . PHP_EOL;
    $fp = fopen('funagain.sh', 'a');




    fwrite($fp, $data);


}