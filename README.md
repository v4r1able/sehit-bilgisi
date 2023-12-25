# Şehit Bilgisi
Allah tüm şehitlerimize rahmet eylesin. Bu php kotu cURL fonksiyonunu kullanarak msb.gov.tr adresinden sayfalama şeklinde şehit listesini alıp dizi içerisine ekler, haber siteleri kullanabilir.

# Örnek Listeleme
```php
for($i=0; $i<count($sehit_bilgisi["sehit_adi"]); $i++) {
    echo "<img src='".$msb_url."/Content/TempImage/SehitVefat/".$sehit_bilgisi["sehit_resim"][$i]."/1.jpg'>
    <p>".$sehit_bilgisi["sehit_adi"][$i]."</p>
    <p>".$sehit_bilgisi["sehit_sicil"][$i]."</p>
    <p>".$sehit_bilgisi["tarih"][$i]."</p>";
}
```
