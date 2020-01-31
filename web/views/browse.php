<!DOCTYPE html>
<!--INFO20003 Database Systems  -->
<!--Semester 2 2016             -->
<!--Assignment 3                -->
<!--Browse                      -->
<!--Ivan Ken Weng Chee          -->
<!--736901                      -->
<!--ichee@student.unimelb.edu.au-->
<html>
	<head>
		<meta charset='utf-8'/>
		<title>Browse</title>
		<link rel='stylesheet' type='text/css' href='stylesheets/browse.css'/>
		<script src='scripts/javascript.js'></script>
		<script src='scripts/jquery.js'></script>
		<script>
			$(document).ready(function() {
				var event, image = 'images/browse.jpg';
				document.body.style.backgroundImage = "url(%s)".replace('%s', image);
				switchTab(event, 'homeTab');
			});
		</script>
	</head>
	<body>
		<ul class='tab'>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'homeTab')">Home</a></li>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'nameTab')">Name</a></li>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'typeTab')">Type</a></li>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'sizeTab')">Size</a></li>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'colourTab')">Colour</a></li>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'priceTab')">Price</a></li>
			<li><a href='#' class='tablink' onclick="switchTab(event, 'summaryTab')">Summary</a></li>
		</ul>
		<div id='homeTab' class='tabcontent'>
			<h2>INFO20003 Database Systems</h2>
			<h2>Semester 2 2016</h2>
			<h2>Assignment 3</h2>
			<h2>Browse</h2>
			<h4>Prototype Web Page Part 2</h4>
			<h4>Ivan Ken Weng Chee</h4>
			<h4>736901</h4>
			<button onclick="switchTab(event, 'nameTab')">Start</button>
		</div>
		<div id='nameTab' class='tabcontent'>
			<fieldset>
				<p>Spatula Name</p><br>
				<input class='inputfield' value='A name'></input>
				<br><br>
				<button class='next' onclick="switchTab(event, 'typeTab')">Next</button>
			</fieldset>
		</div>
		<div id='typeTab' class='tabcontent'>
			<fieldset>
				<p>Spatula Type</p><br>
				<input class='inputfield' list='type'>
					<datalist id='type'>
						<option value='Drugs'/>
						<option value='Food'/>
						<option value='Paints'/>
						<option value='Plaster'/>
					</datalist>
				</input>
				<br><br>
				<button class='back' onclick="switchTab(event, 'nameTab')">Back</button>
				<button class='next' onclick="switchTab(event, 'sizeTab')">Next</button>
			</fieldset>
		</div>
		<div id='sizeTab' class='tabcontent'>
			<fieldset>
				<p>Spatula Size</p><br>
				<input class='inputfield' value='10'></input>
				<br><br>
				<button class='back' onclick="switchTab(event, 'typeTab')">Back</button>
				<button class='next' onclick="switchTab(event, 'colourTab')">Next</button>
			</fieldset>
		</div>
		<div id='colourTab' class='tabcontent'>
			<fieldset>
				<p>Spatula Colour</p><br>
				<input class='inputfield' value='Blue'></input>
				<br><br>
				<button class='back' onclick="switchTab(event, 'sizeTab')">Back</button>
				<button class='next' onclick="switchTab(event, 'priceTab')">Next</button>
			</fieldset>
		</div>
		<div id='priceTab' class='tabcontent'>
			<fieldset>
				<p>Price ($AU)</p><br>
				<input class='inputfield' value=9.95></input>
				<br><br>
				<button class='back' onclick="switchTab(event, 'colourTab')">Back</button>
				<button class='next' onclick="switchTab(event, 'summaryTab')">Next</button>
			</fieldset>
		</div>
		<div id='summaryTab' class='tabcontent'>
			<fieldset>
				<form method='POST' action='results.php'>
					<p>Search Summary</p><br>
					<table border='1'>
						<tr>
							<td>Name</td>
							<td><input class='summaryfield' name='name'></input></td>
						</tr>
						<tr>
							<td>Type</td>
							<td><input class='summaryfield' name='type'></input></td>
						</tr>
						<tr>
							<td>Size</td>
							<td><input class='summaryfield' name='size'></input></td>
						</tr>
						<tr>
							<td>Colour</td>
							<td><input class='summaryfield' name='colour'></input></td>
						</tr>
						<tr>
							<td>Price</td>
							<td><input class='summaryfield' name='price'></input></td>
						</tr>
					</table>
					<br>
					<button class='submit' type='submit'>Search</button>
				</form>
			<button class='back' onclick="switchTab(event, 'priceTab')">Back</button>
			</fieldset>
		</div>
	</body>
</html>
