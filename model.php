<?php
require_once 'config/install_db.php';

function getPictures() {
	$req = $sql->query('SELECT id, title, img,
	DATE_FORMAT(creation_date, \'%d/%m/%Y\') 
	AS creation_date FROM pictures
	ORDER BY creation_date DESC LIMIT 0, 5');
	return $req;
}

function getPicture($pictureId) {
	$req = $sql->prepare('SELECT id, title, img,
	DATE_FORMAT(creation_date, \'%d/%m/%Y\') 
	AS creation_date FROM pictures
	WHERE id = ?');
	$req->execute(array($pictureId));
	$pictureId = $req->fetch();
	return $pictureId;
}

function getUser($user) {
	$req = $sql->prepare('SELECT id, login, password, email
	FROM users_table WHERE login === $user');
	$req->execute(array($user));
	$user = $req->fetch();
	return ($user);
}

function createUser($login, $password, $email) {
	$sql->query('INSERT INTO `users`
	(login, password, email)
	VALUES ($login, $password, $email)');
}


