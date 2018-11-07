<?php
require("model.php");

function routeCmds() {
	if ($_GET['action'] == 'listPictures')
		listPictures();
	else if ($_GET['action'] == 'register')
		register();
	else if ($_GET['action'] == 'login')
		login();
}

function register() { 
	require 'view/registerView.php';
}

function logIn() {
	require 'view/logInView.php';

}

function listPictures() {
	$pictures = getPictures();
	require('listPicturesView');
}

function checkRegistration() {
	if ($_POST['email'] !== $_POST['email_confirm'])
		return (1);
	return (0);

}


$err = FALSE;
$path = 'view/registerView.php?';

if (!isset($_POST['email_confirm'])) {
	$path .= 'reg_err=no_mail_conf';
	header('Location:' .$path);	
}

if (isset($_POST['login'], $_POST['email'], $_POST['email_confirm'], $_POST['passwd']))
{
	if ($_POST['email'] !== $_POST['email_confirm']) {
		$path .= 'reg_err=email_err';
		$err = TRUE;
	}
	if ($err === TRUE) {
		echo $path;
		header('Location:' .$path);	
	}
	else {
		$_SESSION['loggued'] = TRUE;
		header ("Location: index.php");
	}
}