<?php
session_destroy();
session_start();
echo "Gelen_id " . $_SESSION["id"] . ".";
echo "<br/>";
echo "Gelen_mail " . $_SESSION["mail"] . ".";
echo "<br/>";
echo "Gelen_type " .$_SESSION["type"] . ".";
echo "<br/>";

$gelen_id=$_SESSION["id"];


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

$giris="select * from user  where id='$gelen_id'";
$sorgu=$VeritabaniBaglantisi->query($giris);


$sorgu_admin=$VeritabaniBaglantisi->prepare('INSERT INTO admins SET
  admin_id=?
');

$sorgu_client=$VeritabaniBaglantisi->prepare('INSERT INTO client SET
  client_id=?
');


if($sorgu){
    if($_SESSION["type"]==1){

      $kontrol_sorgusu=$VeritabaniBaglantisi->prepare("select * from admins  where admin_id=?");
      $kontrol_sorgusu->execute([$_SESSION["id"]]);
      $kullanıcı_sayısı= $kontrol_sorgusu->rowCount();
      if ($kullanıcı_sayısı>0) {
        echo "Giriş yapılan  kullanıcı bir Admin ve daha önce  Admins isimli tabloya başarı ile EKLENMİŞ. .";
        echo "<br/>";
        Yonlendir("admin/admin.php",5);
      }
      else {
        $sorgu_admin=$VeritabaniBaglantisi->prepare('INSERT INTO admins SET
          admin_id=?
        ');
        $ekle=$sorgu_admin->execute([$_SESSION["id"]]);
        echo "YENİ bir Admin sisteme kayıt oldu  Admins isimli tabloya başarı ile EKLENDİ.";
        echo "<br/>";
        Yonlendir("admin/admin.php",5);
      }
    }
    elseif ($_SESSION["type"]==0) {
      $kontrol_sorgusu2=$VeritabaniBaglantisi->prepare("select * from client  where client_id=?");
      $kontrol_sorgusu2->execute([$_SESSION["id"]]);
      $kullanıcı_sayısı2= $kontrol_sorgusu2->rowCount();
      if ($kullanıcı_sayısı2>0) {
        echo "Giriş yapılan  kullanıcı bir USER ve daha önce  CLİENT isimli tabloya başarı ile EKLENMİŞ. .";
        echo "<br/>";
        Yonlendir("find.php.",5);
      }
      else {
        $sorgu_client=$VeritabaniBaglantisi->prepare('INSERT INTO client SET
          client_id=?
        ');
        $ekle2=$sorgu_client->execute([$_SESSION["id"]]);
        echo "YENİ bir USER sisteme kayıt oldu  CLİENT isimli tabloya başarı ile EKLENDİ. .";
        echo "<br/>";
        Yonlendir("find.php.",5);

      }
    }


}
else {

}








function Yonlendir($url,$zaman = 0){
    if($zaman != 0){
    header("Refresh: $zaman; url=$url");
    }
    else header("Location: $url");
    }


 ?>
