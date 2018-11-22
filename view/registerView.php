<?php
session_start();
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
			<input type='text' name='login' value="<?php
				if (isset($_SESSION['login']))
					echo ($_SESSION['login']); ?>"/>
			<?php if (isset($_GET['login_err'])) {
				if ($_GET['login_err'] === 'no_log') { ?>
				<div class='err_message'>Please type your login</div>
				<?php
				}
				else if ($_GET['login_err'] === 'already_exists') { ?>
					<div class='err_message'>Login already taken, please choose another</div>
					<?php
				}
			 } ?>
			
			<h3>Email</h3>
			<input type='text' name='email' value="<?php
				if (isset($_SESSION['email']) && !isset($_GET['mail_err']))
					echo ($_SESSION['email']); ?>"/>
			<?php if (isset($_GET['mail_err'])) {
				if ($_GET['mail_err'] === 'no_mail') { ?>
				<div class='err_message'>Please type your email address</div>
				<?php
				}
				else if ($_GET['mail_err'] === 'wrng_frmt') { ?>
				<div class='err_message'>Wrong address format</div>
				<?php
				}
				else if ($_GET['mail_err'] === 'already_exists') { ?>
					<div class='err_message'>An account with this email address already exists</div>
					<?php
				}
			 } ?>
			
			<h3>Please confirm your email</h3>
			<input type='text' name='email_confirm' value="<?php
				if (isset($_SESSION['email_confirm']) && !isset($_GET['mail_conf_err']))
					echo ($_SESSION['email_confirm']); ?>"/>
			<?php
				if (isset($_GET['mail_conf_err'])) {
				if ($_GET['mail_conf_err'] === 'no_conf') { ?>
				<div class='err_message'>Please confirm your email address</div>
				<?php
				}
				else if ($_GET['mail_conf_err'] === 'wrng_frmt') {?>
				<div class='err_message'>Wrong address format</div>
			<?php }
			}
				if (isset($_GET['mail_conf_err']) && $_GET['mail_conf_err'] === 'mail_diff') { ?>
				<div class='err_message'>Both emails are different</div>
			<?php } ?>
			
			<h3>Password</h3>
			<input type='password' name='passwd' />
			<?php
				if (isset($_GET['passwd_err'])) {
				if ($_GET['passwd_err'] === 'no_passwd') { ?>			
				<div class='err_message'>Please type your password</div>
				<?php
				}
			}?>
				
			<h3>Password confirmation</h3>
			<input type='password' name='passwd_conf' />
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
	
			<input type='submit' value='Submit' />
	</body>
</html>

<?php
$content = ob_get_clean();
require("template.php");
?>
