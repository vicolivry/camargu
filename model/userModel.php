<?php

require_once "modeldb.Class.php";

class UserClass extends DataBaseClass {

	public function addUser($log_val, $pwd_val, $mail_val) {
		$request = "INSERT INTO users (`login`, `password`, `email`) VALUES (?, ?, ?)";
		$stmt = $this->_sql->prepare($request);
		$stmt->execute(array($log_val, $pwd_val, $mail_val));
	}

	public function getUser($user) {
		$request = 'SELECT id, `login`, `password`, email FROM users WHERE `login` = ?';		
		$stmt = $this->_sql->prepare($request);
		$stmt->execute(array($user));
		$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return ($user_data);
	}
	
	public function getUserLogin() {
		$request = 'SELECT `login` FROM users';
		$stmt = $this->_sql->prepare($request);
		$stmt->execute();
		$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return ($users);
	}
}