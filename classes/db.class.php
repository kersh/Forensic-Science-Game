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

	public function __toString() {
		//mysql_select_db()
		//return $this->
	}

	// return object
	// function select() {
	// 	$this->raw_sql = "SELECT ";
	// 	return $this;
	// }

	// function from($tableName) {
	// 	$this->raw_sql .= "* FROM " . $tableName;
	// 	return $this;
	// }

	// // return INSERT *
	// function insert() {
	// 	$this->$raw_sql = "INSERT * ";
	// 	return $this;
	// }

	// function insert($id) {
	// 	return "ok";
	// }

	// function execute() {
	// 	$this->data = mysql_query($this->raw_sql) or die(mysql_error());
	// 	if($this->data == null)
	// 		Print "No data received";

	// 	$info = mysql_fetch_array($this->data);
	// 	$this->raw_sql = "";
	// 	return $this->info;
	// }

	// Obviously, in the end we close connection :)
	function close_connection() {
		mysql_close($this->mysql_connection);
	}
}
?>