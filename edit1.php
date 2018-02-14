<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Welcome!</title>
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
    <li><a href="#tabs-1">Enter Data</a></li>
    <li><a href="#tabs-2">View Data</a></li>
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
    <form method="post" action="enter.php" name="enterdata" id="enterdata" >
  Name:<br>
  <input type="text" name="name" pattern="[a-zA-Z0-9]+" value="<?php echo $project['name']; ?>"><br><br>
  Email:<br>
  <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $project['email']; ?>" ><br><br>
  Mobilenumber:<br>
  <input type="text" name="number" pattern="^\d{5}\d{5}$"  value="<?php echo $project['phone']; ?>" ><br><br>
  Location:<br>
  <input type="text" name="place" pattern="[a-zA-Z0-9]+" value="<?php echo $project['place']; ?>" ><br><br>
  </form>
  <button>Save Changes</button>
	
<?php
    }
?>
</div>
</div>
</body>
</html>
