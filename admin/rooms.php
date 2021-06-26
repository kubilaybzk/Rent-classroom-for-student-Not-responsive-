<?php
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






    $gelen_Name   = $_REQUEST['Room_Name'];
    $gelen_capacity=$_REQUEST['Room_Capacity'];
    $gelen_text=$_REQUEST['Room_textarea'];
    $gelen_Projector=$_REQUEST['Room_Elements1'];
    $gelen_Microphone=$_REQUEST['Room_Elements2'];
    $gelen_Sound_System=$_REQUEST['Room_Elements3'];
    $gelen_Type=$_REQUEST['Type'];




    if(isset($gelen_Projector)){
        $gelen_Projector=1;
    }
    else{
        $gelen_Projector=0;
    }

    if(isset($gelen_Microphone)){
        $gelen_Microphone=1;
    }
    else{
        $gelen_Microphone=0;
    }

    if(isset($gelen_Sound_System)){
        $gelen_Sound_System=1;
    }
    else{
        $gelen_Sound_System=0;
    }


    echo $gelen_Name."<br>";
    echo $gelen_capacity."<br>";
    echo $gelen_text."<br>";
    echo $gelen_Projector."<br>";
    echo $gelen_Microphone."<br>";
    echo $gelen_Sound_System."<br>";
    echo $gelen_Type;


    $kontrol_sorgusu=$VeritabaniBaglantisi->prepare("select * from rooms  where Room_Name=?");
    $kontrol_sorgusu->execute([$gelen_Name]);
    $kullanıcı_sayısı= $kontrol_sorgusu->rowCount();
    if ($kullanıcı_sayısı==0) {
      $sorgu=$VeritabaniBaglantisi->prepare('INSERT INTO rooms SET
        Room_Name=?,
        Room_Cap=?,
        Room_Text=?,
        order_infos=?,
        type_infos=?,
        species_infos=?,
        Use_Type=?,
        Room_Durumu="1",
        Start_Time="",
        Finis_Time=""');
$ekle=$sorgu->execute([$gelen_Name,$gelen_capacity,$gelen_text,$gelen_Name,$gelen_Name,$gelen_Name,$gelen_Type]);
    if($ekle){
    echo 'Eklendi';
    echo "<br>";
    echo 'İŞLEM BAŞARILI BİRAZ SONRA YÖNLENDİRİLECEKSİNİZ.'."<br>";

        Yonlendir("admin.php",5);

}
else{
    echo "<br>";
    echo 'Eklenmedi';

}
    }
    else {
        echo "Böyle bir oda daha önce oluşturulmuş! ";
        Yonlendir("admin.php",5);
        }






        function Yonlendir($url,$zaman = 0){
            if($zaman != 0){
            header("Refresh: $zaman; url=$url");
            }
            else header("Location: $url");
            }

$tutucu;

$giris="select * from rooms  where Room_Name='$gelen_Name'";
$sorgu=$VeritabaniBaglantisi->query($giris);
if($sorgu==1){
    foreach($sorgu as $satır){
          echo "<br>";
          echo "Gelen ID:  ";
          echo $satır['id'];
          $tutucu=$satır['id'];
      }
    }

    $exam=0;
    $classrom=0;
    $meeting=0;

if($gelen_Type=='Meeting'){
  $exam=0;
  $classrom=0;
  $meeting=1;
}
else if($gelen_Type=='Classroom'){
  $exam=0;
  $classrom=1;
  $meeting=0;
}
else{
  $exam=1;
  $classrom=0;
  $meeting=0;
}



$sorgu_room_types=$VeritabaniBaglantisi->prepare('INSERT INTO room_types SET
      exam=?,
      classrom=?,
      meeting=?,
      room_id=?');



$ekle_room_types=$sorgu_room_types->execute([$exam,$classrom,$meeting,$tutucu]);

if($ekle_room_types){
  echo "<br>";
echo 'Odanın Tipi: $ekle_room_types Tabloya Eklendi ';
echo "<br>";
}
else{
echo "<br>";
echo 'Odanın Tipi: $ekle_room_types Tabloya Eklenmedi ';
echo "<br>";

}



$sorgu_room_speciess=$VeritabaniBaglantisi->prepare('INSERT INTO room_speciess SET
      room_id=?,
      room_projector=?,
      room_microphone=?,
      room_sound=?');



$ekle_room_speciess=$sorgu_room_speciess->execute([$tutucu,$gelen_Projector,$gelen_Microphone,$gelen_Sound_System]);

if($ekle_room_speciess){
  echo "<br>";
echo 'Odanın Ozellikleri: room_types Tabloya Eklendi ';
echo "<br>";
}
else{
echo "<br>";
echo 'Odanın Ozellikleri: room_types Tabloya Eklenmedi ';
echo "<br>";

}


?>
