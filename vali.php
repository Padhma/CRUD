<html>
<head>
<style type="text/css">
 input{
 border:1px solid teal;
 border-radius:5px;
 }
 h1{
  color:#14213D;
  font-size:24px;
  text-align:center;
 }
</style>
</head>
<body>
<h1>Login<h1>
<form action='#' method='post'>
<table cellspacing='5' align='center'>
<tr>
<td>Email:</td>
<td><input type='email' name='email'/></td>
</tr>
<tr>
<td>Password:</td>
<td><input type='password' name='pass'/></td>
</tr>
<tr>
<td></td>
<td><input type='submit' name='submit' value='Submit'/></td>
</tr>
</table>
</form>

<?php
session_start();
if(isset($_POST['submit']))
{
 mysql_connect('localhost','root','') or die(mysql_error());
 mysql_select_db('padma') or die(mysql_error());
 $email=$_POST['email'];
 $pass=$_POST['pass'];
 if($email!=''&&$pass!='')
 {
   $query=mysql_query("select * from websiteusers where email='".$email."' and pass='".$pass."'") or die(mysql_error());
   $res=mysql_fetch_row($query);
   if($res)
   {
    $_SESSION['email']=$email;
    header('Location:welcome.php');
   }
   else
   {
    echo'You entered username or password is incorrect';
   }
 }
 else
 {
  echo'Enter both username and password';
 }
}
?>
</body>
</html>
