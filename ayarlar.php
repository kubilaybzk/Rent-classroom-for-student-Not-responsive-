<?php
$host="localhost";
$db="project";
$user="root";
$pass="root";
$conn=@mysql_connect($host,$user,$pass) or die("Mysql Baglanamadi");

mysql_select_db($db,$conn) or die("Veritabanina Baglanilamadi");
mysql_set_charset('latin5',$conn);

 ?>
