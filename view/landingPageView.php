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
		<?php if (!isset($_SESSION['loggued'])):?>
		<a  href='../index.php?action=login' class='button'><p>Log In</p></a>
		<a  href='../index.php?action=register' class='button'><p>Register</p></a>
		<?php else: ?>
		<p>LOGGUED</p>
		<?php endif ?>
	</body>
</html>

<?php
$content = ob_get_clean();
require "template.php";
?>
