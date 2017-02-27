<?php

function customSearch($q, $cr, $lr = 'lang_tr', $start = 1) {
    global $client;
    $query = array(
        'q' => $q,
        'lr' => $lr,
        'start' => $start,
        'cx' => CX,
        'key' => KEY,
		'googlehost' => 'google.com.tr',
		'userIp' => '78.186.141.52'
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

function giris_yap_post(){
	global $database;
	$request = Flight::request();
	
    if ($request->data['mail'] == '' || $request->data['sifre'] == '') {
        Flight::halt(200, 'Bilgiler eksik...');
    }
		
	$kisi = $database->get('kisi', array('id', 'mail', 'adi_soyadi'), array('AND'=>array('mail' =>$request->data['mail'],'sifre' =>md5(md5($request->data['sifre']))) ));	
	if($kisi!=null){
		$_SESSION['kisi'] = array(
			'id' => $kisi['id'],
			'mail' => $kisi['mail'],
			'adi_soyadi' => $kisi['adi_soyadi']
		);
		Flight::json(array('sonuc'=>true, 'kisi'=>$kisi));
	}else{
		Flight::json(array('sonuc'=>false, 'mesaj'=>'Giriş Başarısız!'));
	}
}

function get_arama_motoru_sunucu_by_url($googlehost){
	if(empty($googlehost)){
		return false;
	}else{
		global $database;
		$sonuc = $database->query("SELECT arama_motoru_sunucu.id, 
									CONCAT(arama_motoru.base_url,arama_motoru_sunucu.url_suffix) googlehost 
									FROM arama_motoru_sunucu
									JOIN arama_motoru ON arama_motoru.id=arama_motoru_id
									WHERE CONCAT(arama_motoru.base_url,arama_motoru_sunucu.url_suffix) = '".$googlehost."' LIMIT 1");
		if($sonuc){
			$data = $sonuc->fetch(PDO::FETCH_ASSOC);
			return $data;
		}else{
			return false;
		}
	}
}

function kayit_ol_post(){
	global $database;
	$request = Flight::request();
	
    if ($request->data['mail'] == '' || $request->data['adi_soyadi'] == '') {
        Flight::halt(200, 'Bilgiler eksik...');
    }
	
	if($request->data['sifre'] <> $request->data['sifre2']){
		Flight::halt(200, 'Şifre uyuşmuyor...');
	}
	
	$database->insert('kisi', array(
		'mail'=>$request->data['mail'],
		'adi_soyadi'=>$request->data['adi_soyadi'],
		'sifre'=>md5(md5($request->data['sifre'])),
		'sozlesme'=>$request->data['sozlesme'],
		'olusturulma_zamani'=>date('Y-m-d H:i:s')
	));
	$kisi_id = $database->id();
	
	$kisi = null;
	if($kisi_id > 0){
		$kisi = $database->get('kisi', array('id', 'mail', 'adi_soyadi'), array('id' => $kisi_id));	
		$_SESSION['kisi'] = array(
			'id' => $kisi['id'],
			'mail' => $kisi['mail'],
			'adi_soyadi' => $kisi['adi_soyadi']
		);
		
		#PROJE KAYIT EDİLİYOR BEGIN;
		if($_SESSION['son_islem'] != null){
			$son_islem = $_SESSION['son_islem'];
			$proje_id = $database->insert('proje', array(
				'kisi_id'=> $kisi_id,
				'baslik'=> $son_islem['kelime'],
				'alan_adi'=> $son_islem['site'],
				'olusturulma_zamani'=> date('Y-m-d H:i:s')
			));
			if($proje_id>0){				
				$arama_motoru_sunucu = get_arama_motoru_sunucu_by_url($son_islem['sunucu']);				
				$database->insert('proje_arama_motoru_sunucu', array(
					'proje_id'=> $proje_id,
					'arama_motoru_sunucu_id'=> $arama_motoru_sunucu['id'],
					'olusturulma_zamani'=> date('Y-m-d H:i:s')
				));
				$proje_kelime_id = $database->insert('proje_kelime', array(
					'proje_id'=> $proje_id,
					'tanim'=> $son_islem['kelime'],
					'olusturulma_zamani'=> date('Y-m-d H:i:s')
				));
				$database->insert('anahtar_kelime_sira', array(
					'proje_kelime_id'=> $proje_kelime_id,
					'arama_motoru_id'=> $arama_motoru_sunucu['id'],
					'sira'=> $son_islem['sira'],
					'diger_siralar'=> implode(',', $son_islem['diger_siralar']),
					'tarih'=> date('Y-m-d H:i:s')
				));
				foreach($son_islem['diger_siteler'] as $diger_site){
					$database->insert('proje_rakip', array(
						'proje_id'=> $proje_id,
						'tanim'=> $diger_site,
						'olusturulma_zamani'=> date('Y-m-d H:i:s')
					));	
				}
			}
		}
		#PROJE KAYIT EDİLİYOR END;		
	}
	
	Flight::json($kisi);
}

function post_kp() {
    $request = Flight::request();

    if ($request->data['q'] == '' || $request->data['site'] == '') {
        Flight::halt(200, 'Bilgiler eksik...');
    }

    $customsearchResponse = customSearch($request->data['q'], $request->data['cr']);
    $digerBilgiler = digerBilgiler($customsearchResponse, $request->data['site']);
    $result = array(
        'customsearchResponse' => $customsearchResponse,
        'tarih' => date('d/m/Y'),
        'sunucu' => 'google.com.tr',
        'ulke' => 'Turkey',
        'dil' => 'Turkish',
        'kelime' => $request->data['q'],
        'site' => $request->data['site'],
        'sira' => $digerBilgiler['sira'],
        'diger_siralar' => $digerBilgiler['diger_siralar'],
        'diger_siteler' => $digerBilgiler['diger_siteler']
    );

    $_SESSION['son_islem'] = $result;
    Flight::json($result);
}
