<?php 
namespace kargo;
 
class teslim {
	

	function curlAl($url){ 
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_HEADER, 0); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
	curl_setopt($ch, CURLOPT_REFERER,'http://www.google.com.tr'); 
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1'); 
	$exec = curl_exec($ch); 
	curl_close($ch); 
	return $exec; 
}
 
function kontrol($firma, $kod) {
	$durum = 0;
	if($firma == 1) {
		//yurtici kargo takip kontrol
		$durum = self::yurtici($kod);
	}
	else if($firma == 2) {
		//surat kargo takip kontrol
		$durum = self::surat($kod);
	}
	else if($firma == 3) {
		//aras kargo takip kontrol
		$durum = self::aras($kod);
	}
	else if($firma == 4) {
		//mng kargo takip kontrol
		$durum = self::mng($kod);
	}
	return $durum;
}
 
function yurtici($kod) {
	
	$link = 'https://selfservis.yurticikargo.com/reports/SSWDocumentDetail.aspx?DocId='.$kod;
	$veri = self::curlAl($link);
	if(preg_match('~Teslim Alan\<\/label\>\<\/td\>[\r\n].*?\<td\>(.*?)\<\/td\>~is', $veri))
		$durum = 1; //teslim alan olmus
	return $durum;
}
 
function surat($kod) {
	
	$link = 'https://suratkargo.com.tr/KargoTakip?kargotakipno='.$kod;
	$veri = self::curlAl($link);
preg_match_all('/<table.*?>(.*?)<\/table>/si', $veri, $matches); 

$veri =  $matches[0][1];
preg_match_all('/<tr.*?>(.*?)<\/tr>/si', $veri, $matches); 
 

$samanlik = $matches[0][1];
$igne   = 'Teslim Edildi';
 


if (strstr($samanlik, $igne)) {
 
  $durum = 1;
}


	return  $durum;

} 		
 
function aras($kod) {
	
	$link = 'https://kargotakip.araskargo.com.tr/mainpage.aspx?code='.$kod;
	$veri = self::curlAl($link);
	if(preg_match('~Teslim alan~is', $veri))
		$durum = 1; //teslim alan olmus
	return $durum;
}
 
function mng($kod) {
	
	$link = 'http://service.mngkargo.com.tr/iactive/popup/KargoTakip/link1.asp?k='.$kod;
	$veri = self::curlAl($link);
	if(preg_match('~Teslim Alan~is', $veri))
		$durum = 1; //teslim alan olmus
	return $durum;
}
 
 
}


?>