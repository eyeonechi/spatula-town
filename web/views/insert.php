<!DOCTYPE html>
<!--INFO20003 Database Systems  -->
<!--Semester 2 2016             -->
<!--Assignment 3                -->
<!--Insert                      -->
<!--Ivan Ken Weng Chee          -->
<!--736901                      -->
<!--ichee@student.unimelb.edu.au-->
<html>
	<head>
		<meta charset='utf-8'/>
		<title>Insert</title>
		<link rel='stylesheet' type='text/css' href='stylesheets/insert.css'/>
		<script src='scripts/javascript.js'></script>
		<script src='scripts/jquery.js'></script>
		<script>
			$(document).ready(function() {
				var event, image = 'images/insert.jpg';
				document.body.style.backgroundImage = "url(%s)".replace('%s', image);
				switchTab(event, 'insertTab');
			});
		</script>
	</head>
	<body>
		<ul class='tab'>
			<li><a href='orders' class='tablink'>New Order</a></li>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'insertTab')">Insert</a></li>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'queryTab')">Query</a></li>
		</ul>
		<div id='insertTab' class='tabcontent'>
			<fieldset>
				<?php
					$con = mysqli_connect("fojvtycq53b2f2kx.chr7pe7iynqr.eu-west-1.rds.amazonaws.com", "mssje531r700zmqj", "rrjgh8wuhytb6nkx", "pvpezpgwvwq35pt4");
					if (mysqli_connect_errno()) {
						echo "Could not connect to MySQL for the following reason: " . mysqli_connect_error();
					}
					mysqli_autocommit($con, FALSE);
					$sql = "INSERT INTO `Order` VALUES (DEFAULT";
					$timezone = 'Australia/Melbourne';
					date_default_timezone_set($timezone);
					$date = date('Y-m-d h:i:s', time());
					$sql = $sql . ", '" . $date . "'";
					if ($_POST['staff']) {
						$sql = $sql . ", '" . $_POST['staff'] . "'";
					}		
					if ($_POST['details']) {
						$sql = $sql . ", '" . $_POST['details'] . "'";
					}
					$sql = $sql . ");" . "SET @OID = LAST_INSERT_ID();";
					$spatulas = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM Spatula"))['COUNT(*)'];
					for ($i = 0; $i <= $spatulas; $i ++) {
						if ($_POST[$i] > 0) {
							$sql = $sql . "INSERT INTO OrderLineItem VALUES ("
							. $i . ", @OID, " . $_POST[$i] . ");";
						}
					}
					mysqli_query($con, "START TRANSACTION");
					if (mysqli_multi_query($con, $sql)) {
						while (mysqli_next_result($con)) {
							if ($res = mysqli_store_result($res)) {
								mysqli_free_result($res);
							}
							if (mysqli_more_results($con)) {
							}
						}
						if (mysqli_error($con)) {
							mysqli_rollback($con);
							echo "Failed to insert :(";
						} else {
							mysqli_commit($con);
							echo "Inserted successfully!";
							$sql = "SELECT * FROM `Order` WHERE `Order`.RequestedTime = '" . $date . "';";
							$result = mysqli_query($con, $sql);
							echo "<table border='1'>";
							echo "<th>Order ID</th>";
							echo "<th>Requested Time</th>";
							echo "<th>Responsible Staff Member</th>";
							echo "<th>Customer Details</th>";
							while ($row = mysqli_fetch_array($result)) {
								echo "<tr>";
								echo "<td>" . $row['idOrder'] . "</td>";
								echo "<td>" . $row['RequestedTime'] . "</td>";
								echo "<td>" . $row['ResponsibleStaffMember'] . "</td>";
								echo "<td>" . $row['CustomerDetails'] . "</td>";
								echo "</tr>";
							}
							echo "</table>";
						}
					}
					mysqli_close($con);
				?>
			</fieldset>
		</div>
		<div id='queryTab' class='tabcontent'>
			<fieldset>
				<p>SQL Query for reference</p>
				<p id='query'><?php echo $sql;?></p>
			</fieldset>
		</div>
	</body>
</html>
