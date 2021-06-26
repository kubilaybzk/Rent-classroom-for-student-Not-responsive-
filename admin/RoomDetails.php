<?php

$VeritabaniHostAdresi		=	"localhost";
$VeritabaniKullaniciAdi		=	"root";
$VeritabaniSifresi			=	"root";
$VeritabaniAdi				=	"room";

try{
$VeritabaniBaglantisi		=	new PDO("mysql:host=$VeritabaniHostAdresi;dbname=$VeritabaniAdi;charset=UTF8", $VeritabaniKullaniciAdi, $VeritabaniSifresi);
}
catch(PDOException $e){
    echo $e->getMessage();
}?>

<form method="post">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<center>
    <div class="form-group col-md-4">
      <label for="inputRoomName">Enter ID information of the room whose information will be changed.alert</label>
      <input type="text" class="form-control" id="inputRoomİD" placeholder="Enter Id" name="id">
    </div>

    <div class="form-group col-md-4">
      <label for="inputRoomName">Room Name</label>
      <input type="text" class="form-control" id="inputRoomName" placeholder="Room Name" name="New_Name">
    </div>
    <div class="form-group col-md-4">
      <label for="inputRoomCap">Room Capacity</label>
      <input type="text" class="form-control" id="inputRoomCap" placeholder="Room Capacity" name="New_Capacity">
    </div>
  <div class="form-group col-md-4">
    <label for="inputRoomText">Text</label>
    <input type="text" class="form-control" id="inputRoomText" placeholder="Text" name="New_Text">
  </div>
  <div class="form-group col-md-4">
    <label for="RoomProjector">Projector</label>
    <input type="text" class="form-control" id="inputProjector" placeholder="1 or 0" name="New_Projector" >
  </div>
  
    <div class="form-group col-md-4">
      <label for="RoomMicrophone">Microphone</label>
      <input type="text" class="form-control" id="inputMicrophone" placeholder="1 or 0" name="New_Microphone">
   </div>
	<div class="form-group col-md-4">
      <label for="RoomSoundSystem">Sound System</label>
      <input type="text" class="form-control" id="RoomSoundSystem" placeholder="1 or 0" name="New_Sound">
    </div>
    <div class="form-group col-md-4">
      <label for="RoomState">Room State</label>
      <select id="inputState" class="form-control" name="New_State">
        <option selected>Choose...</option>
        <option value="1">Available</option>
		<option value="0">Unavailable</option>

      </select>
    </div>
    
    <div class="form-group col-md-4">
      <label for="RoomState">Room Type</label>
      <select id="inputState" class="form-control" name="New_Type">
        <option selected>Choose...</option>
        <option value="Classroom">Classroom</option>
    <option value="Exam">Exam</option>
    <option value="Meeting ">Meeting </option>

      </select>
    </div>

    
    
    <div class="form-group col-md-2">
      <label for="inputEnterDate">Enter Date</label>
      <input type="date" class="form-control" id="RoomEnterDate" name="New_Enter">
    </div>
	<div class="form-group col-md-2">
      <label for="inputExitDate">Exit Date</label>
      <input type="date" class="form-control" id="RoomExitDate" name="New_Exit">
    </div>
		

<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#Modal">Save changes</button>

</form>

<?php


       

$gelen_id              =$_REQUEST['id'];          
$New_Room_Name         =$_REQUEST['New_Name'];
$New_Room_Capacity     =$_REQUEST['New_Capacity'];
$New_Room_Text         =$_REQUEST['New_Text'];
$New_Room_Projector    =$_REQUEST['New_Projector'];
$New_Room_Microphone   =$_REQUEST['New_Microphone'];
$New_Room_Sound_System =$_REQUEST['New_Sound'];
$New_Room_Room_State   =$_REQUEST['New_State'];
$New_Room_Enter_Date   =$_REQUEST['New_Enter'];
$New_Room_Exit_Date    =$_REQUEST['New_Exit'];
$New_Room_Type         =$_REQUEST['New_Type'];





$giris="UPDATE rooms SET Room_Name='$New_Room_Name' where id='$gelen_id'";
$sorgu=$VeritabaniBaglantisi->query($giris);

$giris="UPDATE rooms SET Room_Cap='$New_Room_Capacity' where id='$gelen_id'";
$sorgu=$VeritabaniBaglantisi->query($giris);

$giris="UPDATE rooms SET Room_Text='$New_Room_Text' where id='$gelen_id'";
$sorgu=$VeritabaniBaglantisi->query($giris);

$giris="UPDATE rooms SET Room_Projector='$New_Room_Projector' where id='$gelen_id'";
$sorgu=$VeritabaniBaglantisi->query($giris);

$giris="UPDATE rooms SET Room_Microphone='$New_Room_Microphone' where id='$gelen_id'";
$sorgu=$VeritabaniBaglantisi->query($giris);

$giris="UPDATE rooms SET 	Room_Sound_System='$New_Room_Sound_System' where id='$gelen_id'";
$sorgu=$VeritabaniBaglantisi->query($giris);

$giris="UPDATE rooms SET Room_Durumu='$New_Room_Room_State' where id='$gelen_id'";
$sorgu=$VeritabaniBaglantisi->query($giris);

$giris="UPDATE rooms SET Start_Time='$New_Room_Enter_Date' where id='$gelen_id'";
$sorgu=$VeritabaniBaglantisi->query($giris);

$giris="UPDATE rooms SET Finis_Time='$New_Room_Exit_Date' where id='$gelen_id'";
$sorgu=$VeritabaniBaglantisi->query($giris);

$giris="UPDATE rooms SET Use_Type='$New_Room_Type' where id='$gelen_id'";
$sorgu=$VeritabaniBaglantisi->query($giris);
?>







<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="button" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">	
      <div class="modal-header">
        <h5 class="modal-title" id="button">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Succesfully Changed
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	</center>






  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
