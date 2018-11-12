<?php
require_once 'database.php';

$users_table = 'CREATE TABLE IF NOT EXISTS users (
	`id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`login` varchar(15) NOT NULL,
	`password` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL)';

$pictures = 'CREATE TABLE IF NOT EXISTS pictures (
	`id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`title` varchar(15) NOT NULL,
	`img` varchar(255) NOT NULL,
	`creation_date` DATE NOT NULL)';


try {
		$sql = new PDO($SERV_DSN, $DB_USER, $DB_PASSWORD);
		$sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql->exec("CREATE DATABASE IF NOT EXISTS ". $DB_NAME);
		$sql->exec("use " . $DB_NAME);
		$sql->exec($users_table);
		$sql->exec($pictures);

		}

		catch (PDOException $exc) {
			die ("DB ERROR: " . $exc->getMessage() . "<br>");
		}
	$conn = NULL;