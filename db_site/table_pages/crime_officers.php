<?php

// $user = 'root';
// $password = '';

// $database = 'jail';

// $servername = 'localhost:80';
// $mysqli = new mysqli($servername, $user, $password, $database);

// if ($mysqli -> connect_error) {
// 	die('Connect Error (' .
// 	$mysqli->connect_errno . ') '.
// 	$mysqli->connect_error);
// }
include "../connect.php";

$sql = " SELECT * FROM Crime_officers ";
$result = $conn->query($sql);
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" href = "../styles/style.css">
	
</head>
<body>
	<nav>
    	<div class="logo">
      		<h1>CRIMINAL DATABASE</h1>
    	</div>
    	<ul>
     		 <li><a href="../login.html" class="login">Login</a></li>
    	</ul>
	 </nav>
	<div class="table_content">
		<div class="table header">
			<h1>Crime Officers</h1>
		</div>
		<div class = "table holder">
			<table class="full_table">
				<tr>
					<th>Crimes_ID</th>
					<th>Officer_ID </th>
				</tr>
				<?php
					while($rows=$result->fetch_assoc()){

				?>
				<tr>
						<td><?php echo $rows['Crimes_ID'];?></td>
						<td><?php echo $rows['Officer_ID'];?></td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>
