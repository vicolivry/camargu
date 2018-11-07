<?php
ob_start();
?>

<html>
	<head>
	<title><?php $title = 'Bienvenue sur Camagru' ?></title>
	<link rel='stylesheet' type='text/css' href='../css/style.css'/>
	</head>
	<div class='landing_page'>
		<div class='title_strip'>
			<div class='landing_title'>
				<h1>CAMAGRU</h1>
				<h3>Comme Instagram, mais moins bien</h3>
			</div>
		</div>
	</div>
	<body>
		<form action='../controller.php' method='post'>
		<p>
			<h3>Login</h3>
			<input type='text' name='login' />
			<h3>Password</h3>
			<input type='text' name='passwd' />
			<p>Forgot your password ?</p>
			<input type='submit' value='Submit' />
		</p>
		</form>
	</body>
</html>

<?php

$content = ob_get_clean();
require("template.php");
?>
