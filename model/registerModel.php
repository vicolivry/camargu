<?php
include "../config/install_db.php";

function createNewUser($user_db) {
$sql = returnDB();
$log_val = $user_db['login'];
$pwd_val = $user_db['password'];
$mail_val = $user_db['email'];
echo 'mail_value = ' . $mail_val;
$sql->request('INSERT INTO users (`login`, `password`, `email`)
			VALUES ($log_val, $pwd_val, $mail_val;);');
}