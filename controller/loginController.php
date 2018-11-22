<?php

require_once '/var/www/html/model/userModel.php';
session_start();

$err = FALSE;
$path = '/view/loginView.php?';
$user = new UserClass;
$log_check = $user->getUser($_POST['login']);
if (isset($_POST['passwd']))
	$hashed_psswd = hash("whirlpool", $_POST['passwd']);
else
	$hashed_psswd = NULL;
$pwd_check = $user->getPwd($hashed_psswd);

// Checks if login field is filled

if (!isset($_POST['login']) || $_POST['login'] == "") {
	$path .= $err === TRUE ? '&' : '';
	$path .= 'login_err=no_log';
	$err = TRUE;
}
else if ($log_check === NULL) { 
		$path .= $err === TRUE ? '&' : '';
		$path .= 'login_err=no_exist';
		$err = TRUE;
	}
	else
		$_SESSION['login'] = $_POST['login']; //Gets the field in the session cookie

// Checks if password field is filled

if (!isset($_POST['passwd']) || $_POST['passwd'] == "") {
	$path .= $err === TRUE ? '&' : '';
	$path .= 'passwd_err=no_passwd';
	$err = TRUE;	
}
// Checks if password is good
else if ($pwd_check[0]['password'] === NULL) {
		$path .= $err === TRUE ? '&' : '';
		$path .= 'passwd_err=wrng_psswd';
		$err = TRUE;
}


if ($err === TRUE) {
	//echo $path;
	var_dump($pwd_check);
	echo $hashed_psswd;
	//header('Location:' . $path);
}

// If form is OK, heads to the login page
else if ($err === FALSE) {
	$_SESSION['loggued'] = TRUE;
	header ("Location: ../index.php");
}