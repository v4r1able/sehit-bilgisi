<?php
$msb_url = "https://www.msb.gov.tr/";
$sehit_bilgisi = array();
$gosterilen_sayfa = 0; // 1. sayfa için 0
$gosterilen_sayfa = ($gosterilen_sayfa==0) ? 0 : $gosterilen_sayfa*6;

$array = array(
    "size" => $gosterilen_sayfa
);
$ch = curl_init($msb_url."SehitVefat/LoadMoreSehit/");
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 2);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_NOBODY, 0);
$index = curl_exec($ch);
        
$cikti = json_decode($index, true)["ModelString"];

preg_match_all('@<p class="sehit-adi">(.*?)</p>@si', $cikti, $sehit_adi);
preg_match_all('@<p class="sehit-sinif">(.*?)</p>@si', $cikti, $sehit_sinif);
preg_match_all('@<p class="sehit-sicil">(.*?)</p>@si', $cikti, $sehit_sicil);
preg_match_all('@<div class="sehit-resim" style="background-image: url((.*?));"@si', $cikti, $sehit_resim);
preg_match_all('@Silah arkadaşımız, (.*?) tarihinde@si', $cikti, $tarih);

$sehit_bilgisi["sehit_adi"] = $sehit_adi[1];
$sehit_bilgisi["sehit_sinif"] = $sehit_sinif[1];
$sehit_bilgisi["sehit_sicil"] = $sehit_sicil[1];
$sehit_bilgisi["sehit_resim"] = $sehit_resim[1];
$sehit_bilgisi["tarih"] = $tarih[1];

// çıktıyı ekrana yazdırın
print_r($sehit_bilgisi);
?>
