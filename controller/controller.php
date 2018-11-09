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

