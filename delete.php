<?php
  
  include("connect.php");

  if(isset($_GET['id'])!="")
  {
  $clear=$_GET['id'];
  $delete=mysql_query("DELETE FROM users WHERE id='$clear'");
  $deletes=mysql_query("DELETE FROM family_details WHERE uid='$clear'");
  
  if($delete && $deletes)
  {
      header("Location:welcome.php");
  }
  else
  { 
      echo mysql_error();
  }
  
  }
  
?>