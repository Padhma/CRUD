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
   <form method="post" action="enter.php" name="enterdata" id="enterdata" >
  Name:<br>
  <input type="text" name="name" pattern="[a-zA-Z0-9\s]+" required><br><br>
  Email:<br>
  <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required><br><br>
  Mobilenumber:<br>
  <input type="text" name="phone" pattern="^\d{5}\d{5}$" required><br><br>
  Location:<br>
  <input type="text" name="place" pattern="[a-zA-Z0-9\s]+" required><br><br>
  <input type="submit" value="submit" name="submit"><br>
  </form>    
  </div>
  
  <div id="tabs-2">
      <table  id="example" class="display" cellspacing="0" width="100%">
	  <thead >
	<tr>
	<td><b>ID</b></td>
	<td><b>Name</b></td>
	<td><b>Email</b></td>
	<td><b>Mobilenumber</b></td>
	<td><b>Place</b></td>
	<td><b>Action</b></td>
	</tr>
	<thead>
    
<tbody>
<?php 

$db_host = 'localhost'; 
$db_user = 'root'; 
$db_pass = ''; 
$db_name = 'padma'; 

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT * FROM users';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

    $projects = array();
    while ($project =  mysqli_fetch_assoc($query))
    {
        $projects[] = $project;
    }
    foreach ($projects as $project)
    {
?>
    <tr>
	    <td><?php echo $project['id']; ?></td>
        <td><?php echo $project['name']; ?></td>
        <td><?php echo $project['email']; ?></td>
        <td><?php echo $project['phone']; ?></td>
		<td><?php echo $project['place']; ?></td>
		<td><a href="view.php?id=<?php echo $project['id']; ?>"><i class="fa fa-eye" style="font-size:24px"></i></a> &nbsp <a href="edit.php?id=<?php echo $project['id']; ?>"><i class="fa fa-edit" style="font-size:24px"></i></a> &nbsp <a href="delete.php?id=<?php echo $project['id'] ?>"><i class="fa fa-trash-o" style="font-size:26px"></i></a> &nbsp <a href="add_details.php?id=<?php echo $project['id']; ?>"><i class="fa fa-user-plus" style="font-size:26px"></i></a></td>
    </tr>
	
<?php
    }
?>
</tbody>
</table>
</div>
</div>
<script>
$( '#enterdata' ).each(function(){
    this.reset();
  });
</script>
</body>
</html>
