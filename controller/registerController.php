<?php 

require_once '/var/www/html/model/userModel.php';
session_start();

$err = FALSE;
$path = '/view/registerView.php?';
$user = new UserClass;

// Checks if login field is filled

if (!isset($_POST['login']) || $_POST['login'] == "") {
	$path .= $err === TRUE ? '&' : '';
	$path .= 'login_err=no_log';
	$err = TRUE;
}

else { // checks if login already exists
	$log_check = $user->getUser($_POST['login']);
	if ($log_check != NULL) {
		$path .= $err === TRUE ? '&' : '';
		$path .= 'login_err=already_exists';
		$err = TRUE;
	}
	else
		$_SESSION['login'] = $_POST['login']; //Gets the field in the session cookie
}
// Checks if email field is filled and correct

if (!isset($_POST['email']) || $_POST['email'] == "") {
	$path .= $err === TRUE ? '&' : '';
	$path .= 'mail_err=no_mail';
	$err = TRUE;	
}
else {
	$pattern = '/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@(([0-9a-zA-Z])+([-\w]*[0-9a-zA-Z])*\.)+[a-zA-Z]{2,9})$/';
	$mail_check = $user->getEmail($_POST['email']);
	if (preg_match($pattern, $_POST['email']) == 0) { // Checks if email's format is correct
		$path .= $err === TRUE ? '&' : '';
		$path .= 'mail_err=wrng_frmt';
		$err = TRUE;
	}
	else if ($mail_check != NULL) {
			$path .= $err === TRUE ? '&' : '';
			$path .= 'mail_err=already_exists';
			$err = TRUE;
	}
	else
		$_SESSION['email'] = $_POST['email']; //Gets the field in the session cookie
}

// Checks if email_confirm field is filled and correct

if (!isset($_POST['email_confirm']) || $_POST['email_confirm'] == "") {
	$path .= $err === TRUE ? '&' : '';
	$path .= 'mail_conf_err=no_conf';
	$err = TRUE;	
}
else {
	$pattern = '/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@(([0-9a-zA-Z])+([-\w]*[0-9a-zA-Z])*\.)+[a-zA-Z]{2,9})$/';
	if (preg_match($pattern, $_POST['email_confirm']) == 0) { // Checks if email's format is correct
		$path .= $err === TRUE ? '&' : '';
		$path .= 'mail_conf_err=wrng_frmt';
		$err = TRUE;
	}
	else
		$_SESSION['email_confirm'] = $_POST['email_confirm']; //Gets the field in the session cookie
}

// Checks if password field is filled

if (!isset($_POST['passwd']) || $_POST['passwd'] == "") {
	$path .= $err === TRUE ? '&' : '';
	$path .= 'passwd_err=no_passwd';
	$err = TRUE;	
}

// Checks if password_confirm field is filled

if (!isset($_POST['passwd_conf']) || $_POST['passwd_conf'] == "") {
	$path .= $err === TRUE ? '&' : '';
	$path .= 'pwd_conf_err=no_conf';
	$err = TRUE;	
}

// Checks if email_confirm and email fields are the same

if (isset($_POST['email'], $_POST['email_confirm']))
{
	if ($_POST['email'] !== $_POST['email_confirm']) {
		$path .= $err === TRUE ? '&' : ''; 
		$path .= 'mail_conf_err=mail_diff';
		$err = TRUE;
	}
}

// Checks if password_confirm and password fields are the same

if (isset($_POST['passwd_conf'], $_POST['passwd']))
{
	if ($_POST['passwd'] !== $_POST['passwd_conf']) {
		$path .= $err === TRUE ? '&' : ''; 
		$path .= 'pwd_conf_err=pwd_diff';
		$err = TRUE;
	}
}

// Reloads the page with the errors


if ($err === TRUE) {
	//echo $path;
	header('Location:' . $path);	
}

// If form is OK, heads to the login page

else if ($err === FALSE) {
	//$_SESSION['loggued'] = TRUE;
	$user->addUser($_POST['login'], $_POST['passwd'], $_POST['email']);
	unset($_SESSION['login']);
	unset($_SESSION['email']);
	unset($_SESSION['email_confirm']);
	header ("Location: ../index.php?action=login");
}