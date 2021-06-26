<?php

session_start();

$VeritabaniHostAdresi		=	"localhost";
$VeritabaniKullaniciAdi		=	"root";
$VeritabaniSifresi			=	"root";
$VeritabaniAdi				=	"project";

try{
$VeritabaniBaglantisi		=	new PDO("mysql:host=$VeritabaniHostAdresi;dbname=$VeritabaniAdi;charset=UTF8", $VeritabaniKullaniciAdi, $VeritabaniSifresi);
}
catch(PDOException $e){
    echo $e->getMessage();
}




$gelenMail=$_REQUEST['Kul_email'];
$gelenSifre=$_REQUEST['Kul_sifre'];


$giris="select * from user  where kullanıcı_mail='$gelenMail'";
$sorgu=$VeritabaniBaglantisi->query($giris);



if($sorgu==1){
    foreach($sorgu as $satır){
        if ($satır['kullancı_sifre']==$gelenSifre and $satır['kullanıcı_mail']==$gelenMail) {
          if($satır['Kullanıcı_type']==0){
              $_SESSION["id"]= $satır['id'];
              $_SESSION["mail"]= $satır['kullanıcı_mail'];
              $_SESSION["type"]= $satır['Kullanıcı_type'];
          echo 'Hoşgeldiniz..';
          echo"<br>";
          echo "<b>".$satır['Kullanıcı_adı']."</b>"."<br>";
          echo "Başarılı bir şekilde giriş yapıldı."."<br>";
          echo "Biraz sonra yönlendirileceksiniz"."<br>";
          Yonlendir("test.php",5);
          }
          else {
              $_SESSION["id"]= $satır['id'];
              $_SESSION["mail"]= $satır['kullanıcı_mail'];
              $_SESSION["type"]= $satır['Kullanıcı_type'];
              echo "Hoşgeldin ADMİN !";
              echo "<br/>";
              echo "Biraz sonra yönlendirileceksiniz"."<br>";
              echo "<br/>";
              Yonlendir("test.php",5);

          }
          session_start();
          $_SESSION["id"]=$satır['id'];
          echo "Giriş yapan kullanıcı idsi :  " . $_SESSION["id"] . ".";
        }
        else {
        echo "Bilgilerde hata var";
        echo "<br/>";
        }

    }
}
else if($sorgu==0){
  echo "Mail adresi bulunamadı.";
}






function Yonlendir($url,$zaman = 0){
    if($zaman != 0){
    header("Refresh: $zaman; url=$url");
    }
    else header("Location: $url");
    }













?>
