<?php

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





