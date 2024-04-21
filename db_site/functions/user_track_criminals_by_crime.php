<?php
session_start();
include "../connect.php";


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  // User is not logged in, redirect to login page
  header('Location: ../login.html');
  exit;
}

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
			<li><a href="../logout.php" class="login">Logout</a></li>
    	</ul>
        <ul>
			<li><a href="../buttons_users.php" class="login">Back</a></li>
    	</ul>
        <ul>
			<li><a href="../table_pages/crimes.php" class="login">Return</a></li>
    	</ul>
	 </nav>
	<div id="Content">
		<div class="table header">
			<h1>The Criminal with the Crime</h1>
		</div>
		<div class = "table holder">
			<table class="full_table">
				<thead>
					<tr>
						<th>Criminal ID</th>
						<th>Last Name </th>
						<th> First Name </th>
						<th>Phone number</th>
						<th>Violation status</th>
						<th>Probation status</th>
						<th>Crimes ID</th>
						<th>Classification</th>
						<th>Date_charged</th>
						<th>Status_</th>
						<th>Hearing_date</th>
						<th>Appeal_cut_date</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
						
                    $searchQuery = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                    $searchQuery = (int) $searchQuery;
                    if(empty($searchQuery)) {
                    header('Location: ../login.html');
                    // header('Location: ../dev_pages/criminals.php');
                        }

                    $sql = "SELECT * FROM Criminals cr
                            WHERE cr.Criminal_ID IN (SELECT c.Criminal_ID
                            From Crimes c
                            WHERE c.Crimes_ID = $searchQuery)";

                    //Charge result
                    $result = $conn->query($sql);


                    $sql = "SELECT * 
                         FROM Crimes WHERE Crimes.Crimes_ID = $searchQuery";

                    //Name result
                    $name_result = $conn->query($sql);

                     if ($result->num_rows > 0 && $name_result->num_rows > 0) {
                     $row = $result->fetch_assoc();
                     $name_row = $name_result->fetch_assoc();
     
								echo"<tr>
									<td>".$row["Criminal_ID"]."</td>
									<td>".$row["Last_name"]."</td>
									<td>".$row["First_name"]."</td>
                                    <td>".$row['phone_number']."</td>
                                    <td>".$row['V_status']."</td>
                                    <td>".$row['P_status']."</td>
                                    <td>".$name_row['Crimes_ID']."</td>
                                    <td>".$name_row['Classification']."</td>
                                    <td>".$name_row['Date_charged']."</td>
                                    <td>".$name_row['Status_']."</td>
                                    <td>".$name_row['Hearing_date']."</td>
                                    <td>".$name_row['Appeal_cut_date']."</td>
								</tr>";
							
						}else{
							echo"<tr><td colspan = '3'>No results found</td></tr>";
						}
					$conn->close();
					?>
				</tbody>

			</table>
		</div>
	</div>
</body>
</html>
