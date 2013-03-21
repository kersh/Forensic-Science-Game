<?php
/*
 * Singelton class for database. This class can be reached from any part of the application
 */
class db {
	private $mysql_connection, $raw_sql, $data, $info;

	/**
	 * Call this method to get singelton
	 * @return db
	 */
	public static function Instance() {
		static $inst = null;
		if ($inst === null) {
			$inst = new db();
		}
		return $inst;
	}

	// Make connection
	private function __construct() {
		// echo "inside consruct";

		// Get DB data from file. For secure reason it's in separate file.
		$dbFileName = "dbSecuredData.txt";
		$dataFromFile = file($dbFileName, FILE_IGNORE_NEW_LINES);

		// check file and find DB data.
		foreach ($dataFromFile as $key => &$value) {
			$arr = explode("\t", $value);
		}
		$dbHost = $arr[0];
		$dbUser = $arr[1];
		$dbPassword = $arr[2];
		$dbDb = $arr[3];

		$mysql_connection = mysql_connect($dbHost, $dbUser, $dbPassword);

		if(!$mysql_connection) {
			throw new Exception(mysql_error());
			return false;
		}

		if(!mysql_select_db($dbDb)) {
			throw new Exception('Cannot get access to db');
			return false;
		}

		// Set connection encoding
		mysql_query("SET NAMES 'UTF8'");
	}

	// Obviously, in the end we close connection :)
	function close_connection() {
		mysql_close();
	}
}


// class db {
// 	private $mysql_connection, $raw_sql, $data, $info;

// 	// Make connection
// 	function __construct($host, $user, $password, $db) {
// 		$this->mysql_connection = mysql_connect($host, $user, $password);

// 		if(!$this->mysql_connection) {
// 			throw new Exception(mysql_error());
// 			return false;
// 		}

// 		if(!mysql_select_db($db)) {
// 			throw new Exception('Cannot get access to db');
// 			return false;
// 		}

// 		// Set connection encoding
// 		mysql_query("SET NAMES 'UTF8'");
// 	}

// 	// Obviously, in the end we close connection :)
// 	function close_connection() {
// 		mysql_close($this->mysql_connection);
// 	}
// }
?>