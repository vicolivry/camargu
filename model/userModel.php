<?php

require_once "modeldb.Class.php";

class UserClass extends DataBaseClass {

	public function addUser($log_val, $pwd_val, $mail_val) {
		$request = "INSERT INTO users (`login`, `password`, `email`) VALUES (?, ?, ?)";
		$stmt = $this->_sql->prepare($request);
		$hashed_pwd = hash("whirlpool", $pwd_val);
		$stmt->execute(array($log_val, $hashed_pwd, $mail_val));
	}

	public function getUser($user) {
		$request = 'SELECT id, `login`, `password`, email FROM users WHERE `login` = ?';		
		$stmt = $this->_sql->prepare($request);
		$stmt->execute(array($user));
		$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return ($user_data);
	}

	public function getEmail($email) {
		$request = 'SELECT email FROM users WHERE `email` = ?';		
		$stmt = $this->_sql->prepare($request);
		$stmt->execute(array($email));
		$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return ($user_data);
	}

	public function getPwd($psswd) {
		$request = 'SELECT `password` FROM users WHERE `password` = ?';
		$stmt = $this->_sql->prepare($request);
		$stmt->execute(array($psswd));
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