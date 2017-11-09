<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="sign-up.css">
	</head>
	<body>
		<div class="header">
			<ul>
			  <li><a href="NA.html" id = "banner"><img src="lightdustloop.png"></a></li>
			  <li><a href="NA.html">Articles</a></li>
			  <li><a href="NA.html">Forums</a></li>
			  <li><a href="NA.html">Calendar</a></li>
			  <li><a href="NA.html">Activity</a></li>
			  <li><a href="NA.html">Pictures</a></li>
			  <li><a href="NA.html">Video Databases</a></li>
			  <li><a href="NA.html">Shoutbox</a></li>
			  <li><a href="NA.html">Leaderboards</a></li>
			</ul>
		</div>
		<div class="sign-up">
			<h1>Sign-Up</h1>
			<?php 
			require('sign_up.php');
			$signUp = new sign_up($_POST["email"], $_POST["password"], $_POST["fname"], $_POST["lname"], $_POST["phone"], $_POST["birth"], $_POST["gender"]);
			$signUp->register();
			?>
			<div class="form-group">
				<label for="fname">First Name:</label></br>
				<input type="text" class="form-control" id="fname">
			</div>
			<div class="form-group">
				<label for="lname">Last Name:</label></br>
				<input type="text" class="form-control" id="lname">
			</div>
			<div class="form-group">
				<label for="email">E-mail Address:</label></br>
				<input type="text" class="form-control" id="email">
			</div>
			<div class="form-group">
				<label for="phone">Phone Number:</label></br>
				<input type="text" class="form-control" id="phone">
			</div>
			<div class="form-group">
				<label for="bday">Birthday:</label></br>
				<input type="text" class="form-control" id="bday">
			</div>
			<div class="form-group">
				<label for="gender">Gender:</label></br>
				<input type="text" class="form-control" id="gender">
			</div>
			<button type="button" class="btn btn-primary form-control" id="submit">Submit</button>
			<h3>Already a member? <a href="login.html" id="login">Log in here</a>.</h3>

			<?php 
			require('sign_up.php');
			$signUp = new sign_up($_POST["email"], $_POST["password"], $_POST["fname"], $_POST["lname"], $_POST["phone"], $_POST["birth"], $_POST["gender"]);
			$signUp->register();
			?>
		</div>
	</body>
</html>