<?php

$user = 'root';
$password = '';

$database = 'jail';

$servername = 'localhost:80';
$mysqli = new mysqli($servername, $user, $password, $database);

if ($mysqli -> connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

$sql = " SELECT * FROM Crimes ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" href = "styles/style.css">
	
</head>
<body>
	<nav>
    	<div class="logo">
      		<h1>CRIMINAL DATABASE</h1>
    	</div>
    
    	<div class="search-bar">
      		<form action="#">
        		<input type="text" placeholder="Search">
      		</form>
    	</div>
    	<ul>
     		 <li><a href="#" class="login">Login</a></li>
    	</ul>
	 </nav>
	<div class="table_content">
		<div class="table header">
			<h1>Crimes</h1>
		</div>
		<div class = "table holder">
			<table class="full_table">
				<tr>
					<th>Crime ID</th>
					<th>Criminal ID </th>
					<th>Classification </th>
					<th>Date Charged</th>
					<th>Charge Status</th>
					<th>Hearing Date</th>
					<th>Appeal Cutoff Date</th>
				</tr>
				<?php
					while($rows=$result->fetch_assoc()){

				?>
				<tr>
						<td><?php echo $rows['Crimes_ID'];?></td>
						<td><?php echo $rows['Criminal_ID'];?></td>
						<td><?php echo $rows['Classification'];?></td>
						<td><?php echo $rows['Date_charged'];?></td>
						<td><?php echo $rows['Status'];?></td>
						<td><?php echo $rows['Hearing_date'];?></td>
						<td><?php echo $rows['Appeal_cut_date'];?></td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>
