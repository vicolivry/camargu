<?php
include '../model/registerModel.php';
$err = FALSE;
$path = '../view/registerView.php?';

if (!isset($_POST['login']) || $_POST['login'] == "") {
	$path .= $err === TRUE ? '&' : '';
	$path .= 'login_err=no_log';
	$err = TRUE;	
}

if (!isset($_POST['email']) || $_POST['email'] == "") {
	$path .= $err === TRUE ? '&' : '';
	$path .= 'mail_err=no_mail';
	$err = TRUE;	
}

if (!isset($_POST['email_confirm']) || $_POST['email_confirm'] == "") {
	$path .= $err === TRUE ? '&' : '';
	$path .= 'mail_conf_err=no_conf';
	$err = TRUE;	
}

if (!isset($_POST['passwd']) || $_POST['passwd'] == "") {
	$path .= $err === TRUE ? '&' : '';
	$path .= 'passwd_err=no_passwd';
	$err = TRUE;	
}

if (!isset($_POST['passwd_conf']) || $_POST['passwd_conf'] == "") {
	$path .= $err === TRUE ? '&' : '';
	$path .= 'passwd_conf_err=no_conf';
	$err = TRUE;	
}

if (isset($_POST['login'], $_POST['email'], $_POST['email_confirm'], $_POST['passwd']))
{
	if ($_POST['email'] !== $_POST['email_confirm']) {
		$path .= $err === TRUE ? '&' : ''; 
		$path .= 'mail_conf_err=mail_diff';
		$err = TRUE;
	}

}
if ($err === TRUE) {
	echo $path;
	header('Location:' .$path);	
}
else if ($err === FALSE) {
	$_SESSION['loggued'] = TRUE;
	$user_db = array('login' => $_POST['login'], 'password' => $_POST['passwd'],
		'email' => $_POST['email']);
	createNewUser($user_db);
	header ("Location: ../index.php?action=login");
}