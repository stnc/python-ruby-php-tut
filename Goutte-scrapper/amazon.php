<?php

require 'vendor/autoload.php';

use Goutte\Client;

//https://vegibit.com/php-simple-html-dom-parser-vs-friendsofphp-goutte/
//https://stackoverflow.com/questions/29073923/issue-with-scraping-a-list-to-get-href-using-goutte-and-php

//http://safeerahmed.uk/web-scraping-101-with-php-and-goutte

include("config.php");

$db = new stnc\db\MysqlAdapter();
$tableName = 'mytable';


//curlşsave image 
//https://stackoverflow.com/questions/724391/saving-image-from-php-url

$url2 = "http://scrap.test/amazon.html";

//$url = "https://www.amazon.com/51st-State-Master-Board-Game/dp/B01GAN3OC6/";

$css_selector = "table#productDetails_detailBullets_sections1.a-keyvalue.prodDetTable td";

$client = new Client();

$client->setHeader('User-Agent', "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.13; rv:57.0) Gecko/20100101 Firefox/57.0");


$q = "SELECT * FROM mytable where amazon_url<>'no' and amazon_url<>'' and amazon_kaydi=0 limit 6";

$array_expression = $db->fetchAll($q);

foreach ($array_expression as $value) {
    echo $url = $value ['amazon_url'];
    echo $id = $value ['id'];

    $crawler = $client->request('GET', $url);

    /*
    $response = json_decode($client->getResponse()->getContent());


    if ($response->error) {
        throw new InvalidPropertyUserException($response->error->message);
    }*/



    if ($crawler->filter($css_selector)->count() > 0) {
        $Dimensions = $crawler->filter($css_selector)->eq(0)->text();
    } else {
        $Dimensions = "";
    }


    if ($crawler->filter($css_selector)->count() > 0) {
        $ItemWeight = $crawler->filter($css_selector)->eq(1)->text();
    } else {
        $ItemWeight = "";
    }


    if ($crawler->filter('#landingImage')->count() > 0) {
        $Img = $crawler->filter('#landingImage')->attr("data-old-hires");
    } else {
        $Img = "";
    }

/*
    if ($crawler->filter('#landingImage')->count() > 0) {
        $baseImg = $crawler->filter('#landingImage')->attr("src");
    } else {
        $baseImg = "";
    }

*/

    $data_row = array(
        'amazon_kaydi' => 1,
        'amazon_base_image' => trim($Img),
        'Weight_in_KGs' => trim($ItemWeight),
        'Export_Weight_inKGs' => trim($Dimensions)
    );

    $where = array(
        'id' => $id,
    );

    $db->update($tableName, $data_row, $where);

}


//echo '<pre>';
//print_r($base


/*
$url = "https://boardgamegeek.com/boardgame/174476/10-kill";
$url = "http://scrap.test/ember.html';
$css_selector = ".game-description-body > div";
$thing_to_scrape = "_text";

$client = new Client();
$crawler = $client->request('GET', $url );
$output = $crawler->filter($css_selector)->extract($thing_to_scrape);
echo '<pre>';
print_r($output);*/