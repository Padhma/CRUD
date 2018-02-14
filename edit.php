<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>EDIT</title>
  <!--jquery-->
  <script src="jquery-1.12.4.js"></script>
  <!-- jquery UI -->
  <link rel="stylesheet" href="jquery-ui.css">
  <script src="jquery-ui.js"></script>
<script type="text/javascript">
  $( function() {
    $( "#tabs" ).tabs();
  } );
  //jQuery("#enterdata")[0].reset();
  </script>
  
</head>
<body>
 
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Edit Data</a></li>
  </ul>
  <div id="tabs-1">
<?php 

include('connect.php');

$connection = mysqli_connect($server,$user,$pass);
mysqli_select_db($connection, "padma") or die ("no database");   

$id =$_GET['id'];
$sql = "SELECT users.id,users.name,users.email,users.phone,users.place,family_details.id AS fid,family_details.fname,family_details.mname,family_details.address,family_details.dob 
FROM users
LEFT JOIN family_details ON users.id = family_details.uid
WHERE users.id = $id ";
		
$query = mysqli_query($connection, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($connection));
}

    $projects = array();
    while ($project =  mysqli_fetch_assoc($query))
    {
        $projects[] = $project;
    }
    foreach ($projects as $project)
    {
?>
        <form method="post" action="enter.php" name="enterdata" id="enterdata" >
  <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
  Name:<br>
  <input type="text" name="name" pattern="[a-zA-Z0-9]+" value="<?php echo $project['name']; ?>" ><br><br>
  Email:<br>
  <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $project['email']; ?>" ><br><br>
  Mobilenumber:<br>
  <input type="text" name="phone" pattern="^\d{5}\d{5}$"  value="<?php echo $project['phone']; ?>" ><br><br>
  Location:<br>
  <input type="text" name="place" pattern="[a-zA-Z0-9]+" value="<?php echo $project['place']; ?>" ><br><br>
  
<?php if($project['fid']) {   ?>  
  
  <input type="hidden" name="fid" value="<?php echo $project['fid']; ?>"><br>
  Father Name:<br>
  <input type="text" name="fname" pattern="[a-zA-Z0-9\s]+" value="<?php echo $project['fname']; ?>" ><br><br>
  Mother Name:<br>
  <input type="text" name="mname" pattern="[a-zA-Z0-9\s]+" value="<?php echo $project['mname']; ?>" ><br><br>
  Address:<br>
  <input type="text" name="address" pattern="[ A-Za-z0-9_@.,/#&+-]*$" value="<?php echo $project['address']; ?>" ><br><br>
  Date Of Birth:<br>
  <input type="text" name="dob" value="<?php echo $project['dob']; ?>" ><br><br>
  
<?php } ?>
<input type="submit" name="update" value="UPDATE">

<?php
    }
?>
   </form>
<a href="welcome.php"><button>HOME</button></a>
</div>
</div>
</body>
</html>
