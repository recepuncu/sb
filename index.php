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

include 'config.php';

$database = new \Medoo\medoo(array(
	'database_type' => 'mysql',
	'server' => SERVER,
	'database_name' => DATABASE_NAME,
	'username' => USERNAME,
	'password' => PASSWORD,
	'charset' => 'utf8'));
	
include 'functions_ui.php';	

$client = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));

Flight::route('/', function() {
    Flight::render('ui/ana-sayfa', array(), 'body_content');
    Flight::render('ui/layout', array('title' => 'SIRA BULUCU'));
});

Flight::route('/kayit-ol', function() {
    Flight::render('ui/kayit-ol', array(), 'body_content');
    Flight::render('ui/layout', array('title' => 'SIRA BULUCU'));
});

Flight::route('POST /kayit-ol/post', 'kayit_ol_post');

Flight::route('POST /kp', 'post_kp');

Flight::start();
