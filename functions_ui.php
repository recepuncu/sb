<?php

function customSearch($q, $cr, $lr = 'lang_tr', $start = 1) {
    global $client;
    $query = array(
        'q' => $q,
        'lr' => $lr,
        'start' => $start,
        'cx' => CX,
        'key' => KEY,
    );
    if ($cr <> -1) {
        $query['cr'] = $cr;
    }
    $res = $client->request('GET', 'https://www.googleapis.com/customsearch/v1', array(
        'query' => $query
    ));
    return json_decode($res->getBody());
}

function digerBilgiler($customsearchResponse, $site) {
    $sira = 0;
    $diger_siralar = array();
    $diger_siteler = array();
    foreach ($customsearchResponse->items as $key => $value) {
        if (strpos($value->formattedUrl, $site) > 0) {
            $sira = $sira == 0 ? $key + 1 : $sira;
            $diger_siralar[] = $key + 1;
        }
        if (!in_array($value->displayLink, $diger_siteler)) {
            $diger_siteler[] = $value->displayLink;
        }
    }
    return array(
        'sira' => $sira,
        'diger_siralar' => $diger_siralar,
        'diger_siteler' => $diger_siteler
    );
}

function kayit_ol_post(){
	global $database;
	$request = Flight::request();
	
    if ($request->data["mail"] == "" || $request->data["adi_soyadi"] == "") {
        Flight::halt(200, 'Bilgiler eksik...');
    }	
	
	$database->insert("kisi", array(
		'mail'=>$request->data["mail"],
		'adi_soyadi'=>$request->data["adi_soyadi"],
		'sifre'=>$request->data["sifre"],
		'sozlesme'=>$request->data["sozlesme"],
		'olusturulma_zamani'=>date('Y-m-d H:i:s')
	));
	$kisi_id = $database->id();
	
	$kisi = null;
	if($kisi_id > 0){
		$kisi = $database->get("kisi", array("mail", "adi_soyadi"), array("id" => $kisi_id));	
		$_SESSION['kisi'] = $kisi;
	}
	
	Flight::json($kisi);
}

function post_kp() {
    $request = Flight::request();

    if ($request->data["q"] == "" || $request->data["site"] == "") {
        Flight::halt(200, 'Bilgiler eksik...');
    }

    $customsearchResponse = customSearch($request->data["q"], $request->data["cr"]);
    $digerBilgiler = digerBilgiler($customsearchResponse, $request->data["site"]);
    $result = array(
        'customsearchResponse' => $customsearchResponse,
        'tarih' => date('d/m/Y'),
        'sunucu' => 'google.com.tr',
        'ulke' => 'Turkey',
        'dil' => 'Turkish',
        'kelime' => $request->data["q"],
        'site' => $request->data["site"],
        'sira' => $digerBilgiler['sira'],
        'diger_siralar' => $digerBilgiler['diger_siralar'],
        'diger_siteler' => $digerBilgiler['diger_siteler']
    );

    $_SESSION['son_islem'] = $result;
    Flight::json($result);
}
