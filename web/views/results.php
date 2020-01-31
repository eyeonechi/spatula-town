<!DOCTYPE html>
<!--INFO20003 Database Systems  -->
<!--Semester 2 2016             -->
<!--Assignment 3                -->
<!--Results                     -->
<!--Ivan Ken Weng Chee          -->
<!--736901                      -->
<!--ichee@student.unimelb.edu.au-->
<html>
	<head>
		<meta charset='utf-8'/>
		<title>Results</title>
		<link rel='stylesheet' type='text/css' href='stylesheets/results.css'/>
		<script src='scripts/javascript.js'></script>
		<script src='scripts/jquery.js'></script>
		<script>
			$(document).ready(function() {
				var event, image = 'images/results.jpg';
				document.body.style.backgroundImage = "url(%s)".replace('%s', image);
				switchTab(event, 'resultsTab');
			});
		</script>
	</head>
	<body>
		<ul class='tab'>
			<li><a href='browse.php' class='tablink'>New Search</a></li>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'resultsTab')">Results</a></li>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'queryTab')">Query</a></li>
		</ul>
		<div id='resultsTab' class='tabcontent'>
			<fieldset>
				<?php
					$con = mysqli_connect("fojvtycq53b2f2kx.chr7pe7iynqr.eu-west-1.rds.amazonaws.com", "mssje531r700zmqj", "rrjgh8wuhytb6nkx", "pvpezpgwvwq35pt4");
					if (mysqli_connect_errno()) {
						echo "Could not connect to MySQL for the following reason: " . mysqli_connect_error();
					}
					$sql = "SELECT * FROM Spatula";
					if ($_POST['name']) {
						if (strpos($sql, 'WHERE') !== false) {
							$sql = $sql . " AND Spatula.ProductName LIKE '%" . $_POST['name'] . "%'";
						} else {
							$sql = $sql . " WHERE Spatula.ProductName LIKE '%" . $_POST['name'] . "%'";
						}
					}
					if ($_POST['type']) {
						if (strpos($sql, 'WHERE') !== false) {
							$sql = $sql . " AND Spatula.Type = '" . $_POST['type'] . "'";
						} else {
							$sql = $sql . " WHERE Spatula.Type = '" . $_POST['type'] . "'";
						}
					}
					if ($_POST['size']) {
						if (strpos($sql, 'WHERE') !== false) {
							$sql = $sql . " AND Spatula.Size = " . $_POST['size'];
						} else {
							$sql = $sql . " WHERE Spatula.Size = " . $_POST['size'];
						}
					}
					if ($_POST['colour']) {
						if (strpos($sql, 'WHERE') !== false) {
							$sql = $sql . " AND Spatula.Colour = '" . $_POST['colour'] . "'";
						} else {
							$sql = $sql . " WHERE Spatula.Colour = '" . $_POST['colour'] . "'";
						}
					}
					if ($_POST['price']) {
						if (strpos($sql, 'WHERE') !== false) {
							$sql = $sql . " AND Spatula.Price <= " . $_POST['price'];
						} else {
							$sql = $sql . " WHERE Spatula.Price <= " . $_POST['price'];
						}
					}
					$sql = $sql . " ORDER BY Spatula.idSpatula;";
					mysqli_query($con, "START TRANSACTION");
					if ($result = mysqli_query($con, $sql)) {
						if (mysqli_num_rows($result) > 0) {
							echo mysqli_num_rows($result) . " matching spatula(s) found";
							echo "<table border=1>";
							echo "<th>ID</th>";
							echo "<th>Product Name</th>";
							echo "<th>Type</th>";
							echo "<th>Size</th>";
							echo "<th>Colour</th>";
							echo "<th>Price</th>";
							echo "<th>Quantity in Stock</th>";
							while ($row = mysqli_fetch_array($result)) {
								echo "<tr>";
								echo "<td>" . $row['idSpatula'] . "</td>";
								echo "<td><a href='details.php?idSpatula=" . $row['idSpatula'] . "'>" . $row['ProductName'] . "</td>";
								echo "<td>" . $row['Type'] . "</td>";
								echo "<td>" . $row['Size'] . "</td>";
								echo "<td>" . $row['Colour'] . "</td>";
								echo "<td>" . $row['Price'] . "</td>";
								echo "<td>" . $row['QuantityInStock'] . "</td>";
								echo "</tr>";
							}
							echo "</table>";
						} else {
							echo "No matching spatulas found :(";
						}
					} else {
						echo "Failed to fetch from server";
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
