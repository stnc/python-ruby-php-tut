<?php

require 'vendor/autoload.php';

use Goutte\Client;

//https://vegibit.com/php-simple-html-dom-parser-vs-friendsofphp-goutte/
//https://stackoverflow.com/questions/29073923/issue-with-scraping-a-list-to-get-href-using-goutte-and-php

//http://safeerahmed.uk/web-scraping-101-with-php-and-goutte

include("config.php");

$db = new stnc\db\MysqlAdapter();
$tableName = 'mytable';


function age_time_player_parcala($age_time_player)
{
    $new=array();
    foreach ($age_time_player as $key => $row) {
        if ($key == 0) {
            $new["fa_age"] = strip_tags($row);
        }
        if ($key == 1) {
            $new["fa_time"] = strip_tags($row);
        }
        if ($key == 2) {
            $new["fa_player"] = strip_tags($row);
        }
    }
    return $new;
}


function fa_detail_bottom($funagain_product_deatail_info_bottom)
{
    $list = array();
    foreach ($funagain_product_deatail_info_bottom as $row) {
//        echo $row;
        $list[] = explode(":", $row);
    }
//    print_r($list);

    $funagain_product_deatail_info_bottom_NEW = array();
    foreach ($list as $key => $row1) {

//        echo $list[$key][0];

        if ($list[$key][0] == "Designer(s)") {
            $funagain_product_deatail_info_bottom_NEW["fa_Designer_bottom"] = $list[$key][1];
        } elseif ($list[$key][0] == "Manufacturer(s)") {
            $funagain_product_deatail_info_bottom_NEW["fa_Manufacturer_bottom"] = $list[$key][1];
        } elseif ($list[$key][0] == "Artist(s)") {
            $funagain_product_deatail_info_bottom_NEW["fa_Artist_bottom"] = $list[$key][1];
        } elseif ($list[$key][0] == "Year") {
            $funagain_product_deatail_info_bottom_NEW["fa_Year_bottom"] = $list[$key][1];
        } elseif ($list[$key][0] == "Players") {
            $funagain_product_deatail_info_bottom_NEW["fa_Players_bottom"] = $list[$key][1];
        } elseif ($list[$key][0] == "Time") {
            $funagain_product_deatail_info_bottom_NEW["fa_time_bottom"] = $list[$key][1];
        } elseif ($list[$key][0] == "Ages") {
            $funagain_product_deatail_info_bottom_NEW["fa_Ages_bottom"] = $list[$key][1];
        } elseif ($list[$key][0] == "Weight") {
            $funagain_product_deatail_info_bottom_NEW["fa_Weight_bottom"] = $list[$key][1];
        } elseif ($list[$key][0] == "Current Sales Rank") {
            $funagain_product_deatail_info_bottom_NEW["fa_CurrentSales_bootm"] = $list[$key][1];
        }
    }
    return $funagain_product_deatail_info_bottom_NEW;
}

function trimamn($va){
    $va = trim($va, " \t\n\r\0\x0B\xC2\xA0");

    return trim(strip_tags($va));
}

function fa_detail_top($arrays)
{

    /*
    Store
    Series
    Theme
    Genre
    Format
    */
    $list = array();
    foreach ($arrays as $row) {
//        echo $row;
        $list[] = explode(":", trim($row));
    }

    $funagain_product_deatail_info_bottom_NEW = array();
    foreach ($list as $key => $row1) {
        if ($list[$key][0] == "Store") {
            $funagain_product_deatail_info_bottom_NEW["fa_Store_top"] = trimamn($list[$key][1]);
        } elseif ($list[$key][0] == "Series") {
            $funagain_product_deatail_info_bottom_NEW["fa_Series_top"] = trimamn($list[$key][1]);
        } elseif ($list[$key][0] == "Theme") {
            $funagain_product_deatail_info_bottom_NEW["fa_Theme_top"] = trimamn($list[$key][1]);
        } elseif ($list[$key][0] == "Genre") {
            $funagain_product_deatail_info_bottom_NEW["fa_Cenre_top"] = trimamn($list[$key][1]);
        } elseif ($list[$key][0] == "Format") {
            $funagain_product_deatail_info_bottom_NEW["fa_format_top"] = trimamn($list[$key][1]);
        }
    }
    return $funagain_product_deatail_info_bottom_NEW;
}


$res = scrapper("http://scrap.test/funagain/2.html");
print_r($res);
function scrapper($url)
{

    $client = new Client();

    $client->setHeader('User-Agent', "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.13; rv:57.0) Gecko/20100101 Firefox/57.0");

    $crawler = $client->request('GET', $url);

//print_r($crawler);

//price

    if ($crawler->filter("#prodpricelistprice")->count() > 0) {
        $list_price = $crawler->filter("#prodpricelistprice")->text();
    } else {
        $list_price = "";
    }


//price

    if ($crawler->filter("#prodpriceyourprice")->count() > 0) {
        $sale_price = $crawler->filter("#prodpriceyourprice")->text();
    } else {
        $sale_price = "";
    }


    if ($crawler->filter("#proddescription")->count() > 0) {
        $desc = $crawler->filter("#proddescription")->text();
        $desc = trim(str_replace("Product Description", "", $desc));

    } else {
        $desc = "";
    }


    if ($crawler->filter("#prodinfocounts .prodinfocountdata")->count() > 0) {
        //$pal	 = $crawler->filter("#prodinfocounts .prodinfocountdata")->text();
        $age_time_player = $crawler->filter('#prodinfocounts .prodinfocountdata')->each(function ($node) {
            return trim($node->html());
        });
    } else {
        $age_time_player = "";
    }


    $age_time_player = age_time_player_parcala($age_time_player);


    /*
     Store
    Series
    Theme
    Genre
    Format
     * */



    if ($crawler->filter("td#productheadergroup1 tr")->count() > 0) {
        $funagain_product_mini_infoTEXT = $crawler->filter('td#productheadergroup1 tr')->each(function ($node) {
            return trim($node->text());
        });
        //  $funagain_product_mini_infoTEXT	 = $crawler->filter("#prodinformation .textcontent.prodsection li p")->html();

    } else {
        $funagain_product_mini_infoTEXT = "";
    }

//print_r($funagain_product_mini_infoTEXT);

    $funagain_product_mini_infoTEXT= fa_detail_top($funagain_product_mini_infoTEXT);

    /*

    Designer
    Manufacturer
    Artist
    Year
    Players
    Time
    Ages
    Weight
    Current Sales Rank
     * */

    if ($crawler->filter("#prodinformation .textcontent.prodsection li")->count() > 0) {
        $funagain_product_deatail_info_bottom = $crawler->filter('#prodinformation .textcontent.prodsection li')->each(function ($node) {
            return trim($node->text());
        });
        //  $funagain_product_deatail_info_bottom	 = $crawler->filter("#prodinformation .textcontent.prodsection li p")->html();

    } else {
        $funagain_product_deatail_info_bottom = "";
    }


    $funagain_product_deatail_info_bottom = fa_detail_bottom($funagain_product_deatail_info_bottom);


    $dafeult = [
        'fa_okunma' => 1,
        'fa_list_price' => $list_price,
        'fa_sale_price' => $sale_price,
        'fa_description' => $desc,
    ];

    $result = array_merge($dafeult, $age_time_player, $funagain_product_deatail_info_bottom,$funagain_product_mini_infoTEXT);

    return $result;

}



$q = "SELECT * FROM mytable where funagain_url<>'no' and funagain_url<>'' and fa_okunma=0 ";

$array_expression = $db->fetchAll($q);
echo '<pre>';
foreach ($array_expression as $value) {
    echo $urlDB = $value ['funagain_url'];
    echo $id = $value ['id'];

    $url = "http://scrap.test/funagain/" . $id . ".html";
    $data_row = scrapper($url);


    print_r($data_row);

    $where = array(
        'id' => $id,
    );

      $db->update($tableName, $data_row, $where);
}
