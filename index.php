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

Flight::map('authorization', function () {
    if (!array_key_exists('kisi', $_SESSION)) {
        Flight::halt(401, "Yetkili olmayan giremez!");
    }else{
		global $database;
		$kisi_id = $_SESSION['kisi']['id'];
		$kisi = $database->get('kisi', array('id', 'mail', 'adi_soyadi'), array('id' => $kisi_id));	
		if($kisi==null){
			Flight::halt(401, "Yetkili olmayan giremez!");
		}
	}
});

Flight::route('/', function() {
    Flight::render('ui/ana-sayfa', array(), 'body_content');
    Flight::render('ui/layout', array('title' => 'SIRA BULUCU'));
});

Flight::route('/cikis-yap', function() {
	unset($_SESSION['kisi']);
	session_destroy();
	Flight::redirect('/');
});

Flight::route('POST /kp', 'post_kp');

Flight::route('/giris-yap', function() {
    Flight::render('ui/giris-yap', array(), 'body_content');
    Flight::render('ui/layout', array('title' => 'SIRA BULUCU'));
});
Flight::route('POST /giris-yap/post', 'giris_yap_post');

Flight::route('/kayit-ol', function() {
    Flight::render('ui/kayit-ol', array(), 'body_content');
    Flight::render('ui/layout', array('title' => 'SIRA BULUCU'));
});
Flight::route('POST /kayit-ol/post', 'kayit_ol_post');

Flight::route('/panel', function() {
	Flight::authorization();
    Flight::render('ui/panel', array(), 'body_content');
    Flight::render('ui/layout', array('title' => 'SIRA BULUCU'));
});

Flight::start();
