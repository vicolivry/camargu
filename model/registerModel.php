<?php
require_once "modeldb.Class.php";

function createNewUser($user_db) {
$log_val = $user_db['login'];
$pwd_val = $user_db['password'];
$mail_val = $user_db['email'];
$db = new ModelUser;
$db->addUser($log_val, $pwd_val, $mail_val);
}