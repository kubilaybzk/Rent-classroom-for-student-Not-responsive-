<?php
session_start();


$connection = mysqli_connect("localhost","root","root");
$db = mysqli_select_db($connection, 'project');

$query = "SELECT * FROM rooms";
$query_run = mysqli_query($connection, $query);
if($query_run){
  foreach ($query_run as $satir){
 $oda_adi= $satir['Room_Name'];
  if(isset($_REQUEST[$oda_adi])){
    echo "KAYIT BAŞARI İLE SİLİNDİ";
    echo "<br/>";
  $_SESSION['Silinecek_Oda_Adi']= $oda_adi;
    }
}
}
else {
  echo "Gelen oda isminde bir hata var.";
}



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

$Kullanıcı_ID=$_SESSION['id'];
$Gelen_oda=$_SESSION['Silinecek_Oda_Adi'];



$sorgu = $VeritabaniBaglantisi->query("Delete from room_orders WHERE user_id=$Kullanıcı_ID and  room_id=$Gelen_oda");

if ($sorgu->rowCount() > 0) {
    echo $sorgu->rowCount() . " kayıt bulundu.";
Yonlendir("find.php",5);
} else {
    echo "Herhangi bir kayıt silinemedi.";
Yonlendir("find.php",5);
}









function Yonlendir($url,$zaman = 0){
    if($zaman != 0){
    header("Refresh: $zaman; url=$url");
    }
    else header("Location: $url");
    }

?>
