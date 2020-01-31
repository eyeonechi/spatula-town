<!DOCTYPE html>
<!--INFO20003 Database Systems  -->
<!--Semester 2 2016             -->
<!--Assignment 3                -->
<!--Details                     -->
<!--Ivan Ken Weng Chee          -->
<!--736901                      -->
<!--ichee@student.unimelb.edu.au-->
<html>
	<head>
		<meta charset='utf-8'/>
		<title>Details</title>
		<link rel='stylesheet' type='text/css' href='stylesheets/details.css'/>
		<script src='scripts/javascript.js'></script>
		<script src='scripts/jquery.js'></script>
		<script>
			$(document).ready(function() {
				var event, image = 'images/details.jpg';
				document.body.style.backgroundImage = "url(%s)".replace('%s', image);
				switchTab(event, 'detailsTab');
			});
		</script>
	</head>
	<body>
		<ul class='tab'>
			<li><a href='browse.php' class='tablink'>Browse</a></li>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'detailsTab')">Details</a></li>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'queryTab')">Query</a></li>
		</ul>
		<div id='detailsTab' class='tabcontent'>
			<fieldset>
				<?php
					$con = mysqli_connect("fojvtycq53b2f2kx.chr7pe7iynqr.eu-west-1.rds.amazonaws.com", "mssje531r700zmqj", "rrjgh8wuhytb6nkx", "pvpezpgwvwq35pt4");
					if (mysqli_connect_errno()) {
						echo "Could not connect to MySQL for the following reason: " . mysqli_connect_error();
					}
					$sql = "SELECT * FROM Spatula";
					if (isset($_GET['idSpatula'])) {
						$sql = $sql . " WHERE Spatula.idSpatula = " . $_GET['idSpatula'] . ";";
						if ($result = mysqli_query($con, $sql)) {
							$row = mysqli_fetch_array($result);
							echo "<table border=1>";
							echo "<tr><td>ID</td><td>". $row['idSpatula'] . "</td>";
							echo "<tr><td>Name</td><td>". $row['ProductName'] . "</td>";
							echo "<tr><td>Type</td><td>". $row['Type'] . "</td>";
							echo "<tr><td>Size</td><td>". $row['Size'] . "</td>";
							echo "<tr><td>Colour</td><td>". $row['Colour'] . "</td>";
							echo "<tr><td>Price</td><td>". $row['Price'] . "</td>";
							echo "<tr><td>Quantity in stock</td><td>". $row['QuantityInStock'] . "</td>";
							echo "</table>";
						} else {
							echo "Spatula not found in database";
						}
					} else {
						echo "No spatula selected";
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
