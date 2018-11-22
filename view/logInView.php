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
		<form action='../controller/loginController.php' method='post'>
		<p>
			<h3>Login</h3>
			<input type='text' name='login' value="<?php
				if (isset($_SESSION['login']))
					echo ($_SESSION['login']); ?>"/>
			<?php if (isset($_GET['login_err'])) {
				if ($_GET['login_err'] === 'no_log') { ?>
				<div class='err_message'>Please type your login</div>
				<?php
				}
				else if ($_GET['login_err'] === 'no_exist') { ?>
					<div class='err_message'>This login doesn't exist</div>
					<?php
				}
			 } ?>

			<h3>Password</h3>
			<input type='password' name='passwd'/>
			<?php if (isset($_GET['passwd_err'])) {
				if ($_GET['passwd_err'] === 'no_passwd') { ?>
				<div class='err_message'>Please type your password</div>
				<?php
				}
				else if ($_GET['passwd_err'] === 'wrng_psswd') { ?>
					<div class='err_message'>Wrong password</div>
					<?php
				}
			 } ?>
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
