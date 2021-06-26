<?php
session_start();
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



$connection = mysqli_connect("localhost","root","root");
$db = mysqli_select_db($connection, 'project');

$query = "SELECT * FROM rooms";
$query_run = mysqli_query($connection, $query);
if($query_run){
  foreach ($query_run as $satir){
 $oda_adi= $satir['Room_Name'];
  if(isset($_POST[$oda_adi])){
  $_SESSION['Oda_Adi']= $oda_adi;
    }
}
}
else {
  echo "Gelen oda isminde bir hata var.";
}


echo "Giriş yapan kullanıcı id: " . $_SESSION["Oda_Adi"] . ".";






$Kullanıcı_ID=$_SESSION['id'];

$exit_time=$_SESSION['exit_time'];

$entry_time=$_SESSION['entry_time'];

$gelen_oda=$_SESSION["Oda_Adi"];

echo 'Kullanıcı adı:'. $Kullanıcı_ID.' için'."<br>";
echo 'Kullanıcı adı:'. $exit_time.' için'."<br>";
echo 'Kullanıcı adı:'. $entry_time.' için'."<br>";
echo 'Kullanıcı adı:'. $_SESSION["Oda_Adi"].' için'."<br>";


$sorgu=$VeritabaniBaglantisi->prepare('INSERT INTO room_orders SET
room_id=?,
user_id=?,
entry_time=?,
exit_time=?
');

$ekle=$sorgu->execute([$gelen_oda,$Kullanıcı_ID,$entry_time,$exit_time]);

if($ekle){
  echo "sfafsd";
  Yonlendir("find.php",5);

}
else {
  echo "Bir hata ile karşılaşıldı";
}




    function Yonlendir($url,$zaman = 0){
        if($zaman != 0){
        header("Refresh: $zaman; url=$url");
        }
        else header("Location: $url");
        }

?>
