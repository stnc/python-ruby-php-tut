<?php

require 'vendor/autoload.php';
use Goutte\Client;

//https://vegibit.com/php-simple-html-dom-parser-vs-friendsofphp-goutte/
//https://stackoverflow.com/questions/29073923/issue-with-scraping-a-list-to-get-href-using-goutte-and-php

//$url = "https://www.amazon.com/51st-State-Master-Board-Game/dp/B01GAN3OC6/";

$url = "http://scrap.test/amazon.html";

$css_selector = "table#productDetails_detailBullets_sections1.a-keyvalue.prodDetTable td";

$client = new Client();

$crawler = $client->request('GET',$url  );
//$output = $crawler->filter($css_selector)->html($thing_to_scrape);

$available = $output->text();
$i = 1;
$crawler->filter($css_selector )->each(function ($node) use( $i) {
    $data[]=$node->text();
    echo ($node->text());
});

echo '<pre>';
print_r($crawler->filter($css_selector ));

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