<?php 
$con=mysql_connect('localhost','root','') or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db('padma',$con) or die("Failed to connect to MySQL: " . mysql_error()); 
 $name = $_POST['name']; 
 $email = $_POST['email']; 
 $phone = $_POST['phone'];
 $place = $_POST['place']; 
 $id=$_POST['id'];
 $fid=$_POST['fid'];
 $fname=$_POST['fname'];
 $mname=$_POST['mname'];
 $address=$_POST['address'];
 $dob=$_POST['dob'];
 
 if($id)
  {  
  $sql=mysql_query("UPDATE users SET name='$name',email='$email',phone='$phone',place='$place' WHERE id=$id");
  header("Location: welcome.php");
  }
  if($fid)
  {
  $sql=mysql_query("UPDATE family_details SET fname='$fname',mname='$mname',address='$address',dob='$dob' WHERE id=$fid");
  header("Location: welcome.php");	  
  }
 else{
 $query = "INSERT INTO users (name,email,phone,place) VALUES ('$name','$email','$phone','$place')"; 
 $data = mysql_query ($query)or die(mysql_error()); 
 if($data) { echo  header("Location: welcome.php"); }  
  }
 ?>

