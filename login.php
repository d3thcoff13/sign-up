<html>
	<?php
	require('sign_up.php');
	$signUp = new sign_up($_POST["email"], $_POST["password"]);
	$auth = $signUp->login();
	?>
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
			<?php
			if ($auth == 1 || $auth == 2 || $auth == 3) {
			?>
			<h1>Log In</h1>
			<div class="form-group">
				<form action="login.php" method="post">
					<?php
					if ($auth == 1) {
						?>
						Entered e-mail and password are incorrect.<br><br>

						E-mail: <br>
						<input type="text" name="email" class="form-control"><br>
						Password: <br>
						<input type="text" name="password" class="form-control"><br>
						<input type="submit" class="btn btn-primary form-control" id="submit">
						</form>
						<h3>Need an account? <a href="NA.html" id="login">Sign up here</a>.</h3>
					<?php
					}else if($auth == 2) {
						?>
						Entered e-mail is incorrect.<br><br>

						E-mail: <br>
						<input type="text" name="email" class="form-control"><br>
						Password: <br>
						<input type="text" name="password" class="form-control"><br>
						<input type="submit" class="btn btn-primary form-control" id="submit">
						</form>
						<h3>Need an account? <a href="NA.html" id="login">Sign up here</a>.</h3>
					<?php
					}else if($auth == 3) {
						?>
						Entered password is incorrect. Please try again with the same e-mail address.<br><br>

						E-mail: <br>
						<input type="text" name="email" class="form-control"><br>
						Password: <br>
						<input type="text" name="password" class="form-control"><br>
						<input type="submit" class="btn btn-primary form-control" id="submit">
						</form>
						<h3>Need an account? <a href="sign-up.html" id="login">Sign up here</a>.</h3>
					<?php
					}
			}else if($auth == 4) {
				?>
				<h1>Welcome!</h1>	
				<?php
				echo "<p>Hello, " . $signUp->getFName() . " " . $signUp->getLName() . "</p>";
			}
			?>
			</div>
		</div>
	</body>
</html>