<?php

session_start();
echo "Giriş yapan kullanıcı id: " . $_SESSION["id"] . ".";
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="to-find.css">
	<script src="https://kit.fontawesome.com/3b17466171.js" crossorigin="anonymous"></script>
</head>

<body style="height:auto">


	<div id="nav">


			<ul>
				<li><a href="find.php"><i class="fas fa-home"
				></i></a></li>
				<li><a href="https://mebis.medipol.edu.tr/" >Mebis</a></li>
				<li><a href="Contact.html">Contact</a></li>
				<li> <a class="nav-link" style="color:#6747c7; id="active" href="test2.php" >Çıkış Yap</a></li>




		</ul>

		</div>

	<div class="container">

		<form action="" method="post">

		<div id="to-find-room">

				<div id="info-room">


				<div class="write">

						<p>
						Start Time
						</p>
						<p>
						Finish Time
						</p>
						<p>
						Number of Attendance
						</p>

					</div>

						<input  type="date"  name="Başlangıç" class="intas"></input>
						<input  type="date" name="Bitiş" class="intas"></input>
						<input  type="number" name="atandance" class="intas"></input>

							   <div class="select">
						<input type="radio" value="Meeting" name="type">Meeting

					  	<input type="radio" value="Exam" name="type">Exam

					  	<input type="radio" value="Classroom" name="type">Classroom</div>

							<button type="submit" style="left:350px;" value="Find" class="Find">Find </button>




						</div>






					</div>

</form>

<?php
                $connection = mysqli_connect("localhost","root","root");
                $db = mysqli_select_db($connection, 'project');


				$start  			 =$_REQUEST['Başlangıç'];
				$stop   			 =$_REQUEST['Bitiş'];
				$kullanıcı_number    =$_REQUEST['atandance'];
				$kullanım_tipi  	 =$_SESSION["id"];
				$_SESSION['entry_time']  = $start;
				$_SESSION['exit_time'] = $stop;
				$istenen_oda_tipi=$_REQUEST['type'];









            ?>



</div>

	<div class="botom">
		<div class="card">
		<div  class="card-image">
			<div style="margin-bottom: 25px;" class="card-title">
			Select a Room
				<hr>

			</div>

			<div class="card-body">


			<table border="1">
		<thead>
						<tr>
						<th>Room Name</th>
						<th> Capacity</th>
						<th> Comments </th>
						<th>Projector</th>
						<th>Microphone</th>
						<th>Sound System</th>
						<th> select </th>
						</tr>
		</thead>


<?php

				$exam=0;
		    $classrom=0;
		    $meeting=0;

				if($istenen_oda_tipi=='Meeting'){
				  $exam=0;
				  $classrom=0;
				  $meeting=1;
				}
				else if($istenen_oda_tipi=='Classroom'){
				  $exam=0;
				  $classrom=1;
				  $meeting=0;
				}
				else{
				  $exam=1;
				  $classrom=0;
				  $meeting=0;
				}




$query_type = "SELECT * FROM room_types where classrom=$classrom and meeting=$meeting and exam=$exam";
$query_run_type = mysqli_query($connection, $query_type);
if($query_run_type)
{
	#echo "Çalışıyor";
		foreach($query_run_type as $query_type)
		{
			$elelel=$query_type['room_id'];
			$query = "SELECT * FROM rooms where Room_Cap>$kullanıcı_number AND Room_Durumu=1 and id=$elelel";
			$query_run = mysqli_query($connection, $query);
			if($query_run)
			{
					foreach($query_run as $satir)
					{
						$query2 = "SELECT * FROM room_speciess";
						$query_run2 = mysqli_query($connection, $query2);
						foreach($query_run2 as $satir2)
						{
							if($satir['id']==$satir2['room_id']){
								$Room_Projector=$satir2['room_projector'];
								$Room_Microphone=$satir2['room_microphone'];
								$Room_Sound_System=$satir2['room_sound'];
							}
						}


?>
<tbody>
							<tr>
		<td> <?php echo $satir['Room_Name']; ?> </td>
		<td> <?php echo $satir['Room_Cap']; ?> </td>
		<td> <?php echo $satir['Room_Text']; ?> </td>
		<td> <?php  if($Room_Projector==1){echo '✓';}else{echo 'X';}?> </td>
		<td> <?php  if($Room_Microphone==1){echo '✓';}else{echo 'X';}?> </td>
		<td> <?php  if($Room_Sound_System==1){echo '✓';}else{echo 'X';}?> </td>
		<td><form action="rent.php" method="POST">
										<input type="hidden" name="<?php echo $satir['Room_Name']; ?>" value="<?php echo $satir['Room_Name']; ?>" />
										<input type="submit" value="Tıkla"/>
										</form>
		</td>
</tbody>



<?php


}
}
else {echo " query_run error";}
}
}
else {echo " query_run_type error";}



 ?>


	</table></div></div></div>

























<?php


            $connection2 = mysqli_connect("localhost","root","root");
            $db = mysqli_select_db($connection2, 'project');
						$kullanıcın_id=$_SESSION['id'];

						$query2 = "SELECT * FROM room_orders where user_id='$kullanıcın_id'";
						$query_run2 = mysqli_query($connection2, $query2);



?>






	<div class="botom">
		<div class="card">
		<div  class="card-image">
			<div style="margin-bottom: 25px;" class="card-title">
			Past Receptions
				<hr>

			</div>

			<div class="card-body">


			<table border="1">
		<thead>
						<tr>
						<th>Room Name</th>
						<th> Cancel it </th>
						<th> Enter Time </th>
						<th> Exit  Time </th>
						<th> Add Comment</th>
						</tr>
		</thead>
		<?php
                if($query_run2)
                {
                    foreach($query_run2 as $satir2)
                    {

            ?>

							<tbody>
                        <tr>
							<td> <?php echo $satir2['room_id']; ?> </td>
							<td>
								<form action="delete.php" method="POST">
								<input type="hidden" name="<?php echo $satir2['room_id']; ?>" value="<?php echo $satir2['room_id']; ?>" />
								<input type="submit" value="Tıkla"/>
								</form>
							</td>


							</form>
							<td> <?php echo $satir2['entry_time']; ?> </td>
							<td> <?php echo $satir2['exit_time']; ?> </td>
							<td> <a href="YorumSayfasi.php?id=<?php echo $satir2['room_id']; ?>">Add Comment</a></td>

                        </tr>
					</tbody>
					<?php
								}
							}
							else
							{
								echo "Ther is no rooms.";
							}
            		?>


	</table></div></div>/<div>



</body>

</html>
