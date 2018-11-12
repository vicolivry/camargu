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
		<form action='../controller/registerController.php' method='post'>
			<h3>Login</h3>
			<input type='text' name='login' />
			<?php if (isset($_GET['login_err'])) {
				if ($_GET['login_err'] === 'no_log') { ?>
				<div class='err_message'>Please type your login</div>
				<?php
				}
			 } ?>
			<h3>Email</h3>
			<input type='text' name='email' />
			<?php if (isset($_GET['mail_err'])) {
				if ($_GET['mail_err'] === 'no_mail') { ?>
				<div class='err_message'>Please type your email address</div>
				<?php
				}
			 } ?>
			<h3>Please confirm your email</h3>
			<input type='text' name='email_confirm' />
			<?php
				if (isset($_GET['mail_conf_err'])) {
				if ($_GET['mail_conf_err'] === 'no_conf') { ?>
				<div class='err_message'>Please confirm your email address</div>
				<?php
				}
			}
				if (isset ($_GET['mail_conf_err']) && $_GET['mail_conf_err'] === 'mail_diff') { ?>
				<div class='err_message'>Both emails are different</div>
			<?php } ?>
			<h3>Password</h3>
			<input type='text' name='passwd' />
			<?php
				if (isset($_GET['passwd_err'])) {
				if ($_GET['passwd_err'] === 'no_passwd') { ?>			
				<div class='err_message'>Please type your password</div>
				<?php
				}
			}?>
				<h3>Password confirmation</h3>
			<?php
				if (isset($_GET['pwd_conf_err'])) {
				if ($_GET['pwd_conf_err'] === 'no_conf') { ?>
				<div class='err_message'>Please confirm your password</div>
				<?php
				}
				if ($_GET['pwd_conf_err'] === 'pwd_diff') { ?>
				<div class='err_message'>Both passwords are different</div>
				<?php
				}
			}?>
			<input type='text' name='passwd_conf' />	
			<input type='submit' value='Submit' />
	</body>
</html>

<?php
$content = ob_get_clean();
require("template.php");
?>
