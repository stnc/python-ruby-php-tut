<?php

require 'vendor/autoload.php';

use Goutte\Client;

//use Illuminate\Support\Str;
//use Illuminate\Support\Collection;


function stncFilter($linksArray)
{
    $Game_Mechanic = array_filter($linksArray);
    return collect($Game_Mechanic)->implode(',');
}

//player(4,8);
function player($min, $max)
{
    for ($i = $min; $i <= $max; $i++) {
        $return[] = $i;
    }
    return stncFilter($return);
}


//https://vegibit.com/php-simple-html-dom-parser-vs-friendsofphp-goutte/
//https://stackoverflow.com/questions/29073923/issue-with-scraping-a-list-to-get-href-using-goutte-and-php

//http://safeerahmed.uk/web-scraping-101-with-php-and-goutte

include("config.php");

$db = new stnc\db\MysqlAdapter();
$tableName = 'mytable';


//curlşsave image 
//https://stackoverflow.com/questions/724391/saving-image-from-php-url

$url2 = "http://scrap.test/ember.html";

//$url = "https://www.amazon.com/51st-State-Master-Board-Game/dp/B01GAN3OC6/";


$client = new Client();

$client->setHeader('User-Agent', "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.13; rv:57.0) Gecko/20100101 Firefox/57.0");

$q = "SELECT * FROM mytable where boardgamegeek_url<>'no' and boardgamegeek_url<>'' and boardGameScrap=0 and id<>115 and id<>178";

$array_expression = $db->fetchAll($q);
echo '<pre>';
foreach ($array_expression as $value) {
    echo $urlDB = $value ['boardgamegeek_url'];
    echo '<br>';
    echo $id = $value ['id'];
    $url2 = "http://scrap.test/board/" . $id . ".html";
    $crawler = $client->request('GET', $url2);


    /*
    $response = json_decode($client->getResponse()->getContent());
    if ($response->error) {
        throw new InvalidPropertyUserException($response->error->message);
    }
*/


    if ($crawler->filter('article.game-description-body')->count() > 0) {
        $desc = $crawler->filter('article.game-description-body')->text();
    } else {
        $desc = "";
    }



    if ($crawler->filter('div.credits li:nth-of-type(3) span a')->count() > 0) {
        $Manufacturers = $crawler->filter('div.credits li:nth-of-type(3) span a')->text();
    } else {
        $Manufacturers = "";
    }


    // $cat = $crawler->filter('li.feature > .feature-description')->eq(1)->html();





    if ($crawler->filter('li.feature:nth-of-type(2) a')->count() > 0) {
        $cat = $crawler->filter('li.feature:nth-of-type(2) a')->each(function ($node) {
            return trim($node->attr('title'));
        });
        $cat = stncFilter($cat);
    } else {
        $cat = "";
    }





    ///Tag Group 1 (Players) boardgamegeek üzerinden aliyoruz. 1-4 yaziyorsa biz excele 1,2,3,4 seklinde , ile ayirarak tüm aradaki sayilari yazmak gerekiyor
    //$player = $crawler->filter('li.gameplay-item:nth-of-type(1) div.gameplay-item-primary')->text();


    if ($crawler->filter('li.gameplay-item:nth-of-type(1) div.gameplay-item-primary > span > span:nth-of-type(1)')->count() > 0) {
        $playerMin = $crawler->filter('li.gameplay-item:nth-of-type(1) div.gameplay-item-primary > span > span:nth-of-type(1)')->text();

    } else {
        $playerMin = 1;
    }


    if ($crawler->filter('div.gameplay-item-primary > span > span:nth-of-type(2)')->count() > 0) {
        $playerMax = $crawler->filter('div.gameplay-item-primary > span > span:nth-of-type(2)')->text();
        $playerMax = strlen($playerMax);
    } else {
        $playerMax = $playerMin;
    }

    $player = player($playerMin, $playerMax);


    //  Tag Group 2 (Age) boardgamegeek üzerinden aliyoruz.Community degil Age: kisminda ne yaziyor ise o degerleri kullaniyoruz
    if ($crawler->filter('li.gameplay-item:nth-of-type(3) div.gameplay-item-primary span')->count() > 0) {
        $age = $crawler->filter('li.gameplay-item:nth-of-type(3) div.gameplay-item-primary span')->text();
    } else {
        $age = "";
    }



    if ($crawler->filter('li.gameplay-item:nth-of-type(2) div.gameplay-item-primary > span')->count() > 0) {
        $PlayingTime = $crawler->filter('li.gameplay-item:nth-of-type(2) div.gameplay-item-primary > span')->text();
    } else {
        $PlayingTime = "";
    }



    //$Game_Mechanic = $crawler->filter('')->html();
    if ($crawler->filter('li.feature:nth-of-type(3) a')->count() > 0) {
        $Game_Mechanic = $crawler->filter('li.feature:nth-of-type(3) a')->each(function ($node) {
            return trim($node->attr('title'));
        });
        $Game_Mechanic = stncFilter($Game_Mechanic);

    } else {
        $Game_Mechanic = "";
    }



    if ($crawler->filter('li.feature:nth-of-type(1) div.feature-description')->count() > 0) {
        $type = $crawler->filter('li.feature:nth-of-type(1) div.feature-description')->text();
    } else {
        $type = "";
    }



    //ana oyun Tag_Group_8_System
    // $System_family = $crawler->filter('li.feature')->eq(3)->text();
    if ($crawler->filter('li.feature:nth-of-type(4) a')->count() > 0) {
        $System_family = $crawler->filter('li.feature:nth-of-type(4) a')->each(function ($node) {
            return trim($node->attr('title'));
        });
        $System_family = stncFilter($System_family);
    } else {
        $System_family = "";
    }



    /*
     $ItemWeight = $crawler->filter($css_selector)->eq(1)->text();
     $Img = $crawler->filter('#landingImage')->attr("data-old-hires");
     $baseImg = $crawler->filter('#landingImage')->attr("src");
    */
    $data_row = array(
        'boardGameScrap' => 1,
        'Product_Description' => trim($desc),
        'Manufacturers' => trim($Manufacturers),
        'Categories' => trim($cat),
        'Tag_Group_1_Players_' => trim($player),
        'Tag_Group_2_Age' => trim($age),
        'Tag_Group_3_Playing_Time' => trim($PlayingTime),
        'Tag_Group_4_Game_Mechanic' => $Game_Mechanic,
        'Tag_Group_5_Type' => trim($type),
        'Tag_Group6_Game_Category' => trim($cat),
        'Tag_Group_8_System' => ($System_family),

    );


    print_r($data_row);

    $where = array(
        'id' => $id,
    );

    $db->update($tableName, $data_row, $where);
}

