<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!session_start()) {
    session_start();
}

if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
    ob_start("ob_gzhandler");
} else {
    ob_start();
}

require_once __DIR__ . '/vendor/autoload.php';

//define('BASE_URL', sprintf('//%s/%s', $_SERVER['HTTP_HOST'], basename(__DIR__)));
define('BASE_URL', '//sirabulucu.herokuapp.com');
$client = new \GuzzleHttp\Client(['curl' => [CURLOPT_SSL_VERIFYPEER => false]]);

Flight::route('/test', function() {
    Flight::render('ui/ana-sayfa', array('adi_soyadi' => 'Recep UNCU'), 'body_content');
    Flight::render('ui/layout', array('title' => 'SIRA BULUCU'));
});

Flight::route('/sorgu-sonucu', function() {
    global $client;

    $res = $client->request('GET', 'https://www.googleapis.com/customsearch/v1', [
        'query' => [
            'q' => 'samsung',
            'cr' => 'countryTR',
            'cx' => '001622181081046809365:naip9m8r5si',
            'lr' => 'lang_tr',
            'key' => 'AIzaSyCcnDGqQdWTjTmSJavsLgWjDB65pCIqsJU',
        ]
    ]);

    //echo $res->getStatusCode();
    //echo $res->getHeaderLine('content-type');
    echo $res->getBody();
});

Flight::start();
