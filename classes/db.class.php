<?php
class db {
	private $mysql_connection, $raw_sql, $data, $info;

	// Make connection
	function __construct($host, $user, $password, $db) {
		$this->mysql_connection = mysql_connect($host, $user, $password);

		if(!$this->mysql_connection) {
			throw new Exception(mysql_error());
			return false;
		}

		if(!mysql_select_db($db)) {
			throw new Exception('Cannot get access to db');
			return false;
		}

		// Set connection encoding
		mysql_query("SET NAMES 'UTF8'");
	}

	// Obviously, in the end we close connection :)
	function close_connection() {
		mysql_close($this->mysql_connection);
	}
}
?>