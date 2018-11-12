<?PHP
$path = '/var/www/html/config/install_DB.php';
require_once $path;

abstract class DataBaseClass {
protected $_sql;

public function getSQL() { return $this->_sql ; }

function __construct() {
	require '/var/www/html/config/database.php';
	echo $DB_DSN;
	$this->_sql = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	}

function __destruct() {}
}


class ModelUser extends DataBaseClass {

	public function addUser($log_val, $pwd_val, $mail_val) {
		$request = "INSERT INTO users (`login`, `password`, `email`) VALUES (?, ?, ?)";
		$stmt = $this->_sql->prepare($request);
		$stmt->execute(array($log_val, $pwd_val, $mail_val));
	}
}

