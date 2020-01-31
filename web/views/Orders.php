<!DOCTYPE html>
<!--INFO20003 Database Systems  -->
<!--Semester 2 2016             -->
<!--Assignment 3                -->
<!--Orders                      -->
<!--Ivan Ken Weng Chee          -->
<!--736901                      -->
<!--ichee@student.unimelb.edu.au-->
<html>
	<head>
		<meta charset='utf-8'/>
		<title>Orders</title>
		<link rel='stylesheet' type='text/css' href='Orders.css'/>
		<script src='Javascript.js'></script>
		<script src='JQuery.js'></script>
		<script>
			$(document).ready(function() {
				var event, image = 'backgrounds/Orders.jpg';
				document.body.style.backgroundImage = "url(%s)".replace('%s', image);
				switchTab(event, 'homeTab');
			});
		</script>
	</head>
	<body>
		<ul class='tab'>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'homeTab')">Home</a></li>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'detailsTab')">Customer Details</a></li>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'staffTab')">Responsible Staff Member</a></li>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'ordersTab')">Order Quantity</a></li>
		</ul>
		<div id='homeTab' class='tabcontent'>
			<h2>INFO20003 Database Systems</h2>
			<h2>Semester 2 2016</h2>
			<h2>Assignment 3</h2>
			<h2>Orders</h2>
			<h4>Prototype Web Page Part 1</h4>
			<h4>Ivan Ken Weng Chee</h4>
			<h4>736901</h4>
			<button onclick="switchTab(event, 'detailsTab')">Start</button>
		</div>
		<div id='detailsTab' class='tabcontent'>
			<fieldset>
				<p>Enter customer details</p><br>
				<textarea class='inputfield'></textarea>
				<br><br>
				<button class='back' onclick="switchTab(event, 'homeTab')">Back</button>
				<button class='next' onclick="switchTab(event, 'staffTab')">Next</button>
			</fieldset>
		</div>
		<div id='staffTab' class='tabcontent'>
			<fieldset>
				<p>Enter responsible staff member</p><br>
				<textarea class='inputfield' value='Mitchell'></textarea>
				<br><br>
				<button class='back' onclick="switchTab(event, 'detailsTab')">Back</button>
				<button class='next' onclick="switchTab(event, 'ordersTab')">Next</button>
			</fieldset>
		</div>
		<div id='ordersTab' class='tabcontent'>
			<fieldset>
				<form method='POST' action='Insert.php'>
					<p>Enter spatula order quantity</p>
					<br>
					<table border='1'>
						<tr>
							<td>Customer details</td>
							<td><input class='summaryfield' name='details'></input></td>
						</tr>
						<tr>
							<td>Responsible staff member</td>
							<td><input class='summaryfield' name='staff'></input></td>
						</tr>
					</table>
					<?php
						$con = mysqli_connect("info20003db.eng.unimelb.edu.au", "ichee", "Shinobi*", "ichee");
						if (mysqli_connect_errno()) {
							echo "Could not connect to MySQL for the following reason: " . mysqli_connect_error();
						}
						$sql = "SELECT * FROM Spatula ORDER BY Spatula.idSpatula";
						$result = mysqli_query($con, $sql);
						echo "<table border='1'>";
						echo "<th>ID</th>";
						echo "<th>Product Name</th>";
						echo "<th>Type</th>";
						echo "<th>Size</th>";
						echo "<th>Colour</th>";
						echo "<th>Price</th>";
						echo "<th>Quantity in Stock</th>";
						echo "<th>Order Quantity</th>";
						while ($row = mysqli_fetch_array($result)) {
							echo "<tr>";
							echo "<td>" . $row['idSpatula'] . "</td>";
							echo "<td><a href='Details.php?idSpatula=" . $row['idSpatula'] . "'>" . $row['ProductName'] . "</td>";
							echo "<td>" . $row['Type'] . "</td>";
							echo "<td>" . $row['Size'] . "</td>";
							echo "<td>" . $row['Colour'] . "</td>";
							echo "<td>" . $row['Price'] . "</td>";
							echo "<td>" . $row['QuantityInStock'] . "</td>";
							echo "<td><input name='" . $row['idSpatula'] . "' value='0'/></td>";
							echo "</tr>";
						}
						echo "</table>";
						mysqli_close($con);
					?>
					<br>
					<button class='submit' type='submit'>Insert</button>
				</form>
				<button class='back' onclick="switchTab(event, 'staffTab')">Back</button>
			</fieldset>
		</div>
	</body>
</html>
