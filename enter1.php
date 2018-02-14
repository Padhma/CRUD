<?php 

include('connect.php');

$connection = mysqli_connect($server,$user,$pass);
mysqli_select_db($connection, "padma") or die ("no database");   

 $userid = $_POST['uid']; 
 $fname = $_POST['fname']; 
 $mname = $_POST['mname']; 
 $address = $_POST['address']; 
 $dob = $_POST['dob'];
 
 $query = "INSERT INTO family_details (uid,fname,mname,address,dob) VALUES ('$userid','$fname','$mname','$address','$dob')"; 
 $data = mysql_query ($query)or die(mysql_error()); 
 if($data) {  header("Location: welcome.php"); }  
  
  ?>
