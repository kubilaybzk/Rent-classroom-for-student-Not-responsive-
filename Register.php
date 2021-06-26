<?php


$VeritabaniHostAdresi        =    "localhost";
$VeritabaniKullaniciAdi        =    "root";
$VeritabaniSifresi            =    "root";
$VeritabaniAdi                =    "project";

try{
$VeritabaniBaglantisi        =    new PDO("mysql:host=$VeritabaniHostAdresi;dbname=$VeritabaniAdi;charset=UTF8", $VeritabaniKullaniciAdi, $VeritabaniSifresi);
}
catch(PDOException $e){
    echo $e->getMessage();
}




 $kullanıcı_adı       =$_REQUEST['name'];
 $kullanıcı_soyad     =$_REQUEST['surname'];
 $kullanıcı_email     =$_REQUEST['email'];
 $kullanıcı_phone     =$_REQUEST['phone'];
 $kullanıcı_number    =$_REQUEST['password'];
 $kullanıcı           =$_REQUEST['type'];




$kontrol_sorgusu=$VeritabaniBaglantisi->prepare("select * from user  where kullanıcı_mail=?");
$kontrol_sorgusu->execute([$kullanıcı_email]);
$kullanıcı_sayısı= $kontrol_sorgusu->rowCount();

if ($kullanıcı_sayısı>0) {
  echo "Daha önce bu mail adresi kullanılmış lütfen başka bir mail adresi deneyiniz.";
}
else {

  $sorgu=$VeritabaniBaglantisi->prepare('INSERT INTO user SET
  Kullanıcı_adı=?,
  kullanıcı_soyadı=?,
  kullanıcı_mail=?,
  kullanıcı_telefon=?,
  kullancı_sifre=?,
  kullanıcı_eski_oda="",
  kullanıcı_yeni_oda="",
  Kullanıcı_type=?
  ');
$ekle=$sorgu->execute([$kullanıcı_adı,$kullanıcı_soyad,$kullanıcı_email,$kullanıcı_phone,$kullanıcı_number,$kullanıcı]);
if($ekle){
    echo 'MERHABA '."<b>".$kullanıcı_adı."</b>".'  ARAMIZA HOŞGELDİN !';
    echo "<br>";
    echo "<br>";
    echo 'KAYIT İŞLEMİ BAŞARILI BİRAZ SONRA YÖNLENDİRİLECEKSİNİZ.'."<br>";
    Yonlendir("index.html",5);

}
else {
  echo "Bir hata ile karşılaşıldı.";
}


}

function Yonlendir($url,$zaman = 0){
    if($zaman != 0){
    header("Refresh: $zaman; url=$url");
    }
    else header("Location: $url");
    }



?>
