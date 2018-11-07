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
			<h3>Login</h3>
			<input type='text' name='login' />
			<h3>Email</h3>
			<input type='text' name='email' />
			<h3>Please confirm your email</h3>
			<input type='text' name='email_confirm' />
			<?php
			if (isset($_GET['reg_err'])) {
				if ($_GET['reg_err'] === 'no_mail_conf') { ?>
				<div class='err_message'>Please confirm your email address</div>
				<?php
				}
				else if ($_GET['reg_err'] === 'email_err') { ?>
				<div class='err_message'>Both emails are different</div>
			<?php }
			} ?>
			<h3>Password</h3>
			<input type='text' name='passwd' />	
	
			<input type='submit' value='Submit' />
	</body>
</html>

<?php
$content = ob_get_clean();
require("template.php");
?>
