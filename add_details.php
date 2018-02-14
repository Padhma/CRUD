<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>ADD_DETAILS</title>
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
    <li><a href="#tabs-1">Add content</a></li>
  </ul>
  <div id="tabs-1">
<?php

include('connect.php');

$connection = mysqli_connect($server,$user,$pass);
mysqli_select_db($connection, "padma") or die ("no database");   

$id =$_GET['id'];
$sql = "SELECT * FROM users where id = $id ";
		
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
 

 <form method="post" action="enter1.php" name="adddata" id="adddata" >
  
  Father Name:<br>
  <input type="text" name="fname" pattern="[a-zA-Z0-9\s]+"><br><br>
  Mother Name:<br>
  <input type="text" name="mname" pattern="[a-zA-Z0-9\s]+"><br><br>
  Address:<br>
  <input type="text" name="address" pattern="[ A-Za-z0-9_@.,/#&+-]*$"><br><br>
  Date Of Birth:<br>
  <input type="date" name="dob"><br><br>
  <input type="hidden" name="uid" pattern="[0-9]+" value="<?php echo $project['id']; ?>">
  <input type="submit" value="Submit" name="submit"> 
 </form>
  <a href="welcome.php"><button>HOME</button></a>

<?php
    }
?>
  
</div>
</div>
</body>
</html>
