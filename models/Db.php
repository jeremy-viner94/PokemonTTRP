<?php


class Db
{
	const servername = "3.17.10.222";
	const username = "app";
	const password = "Melanie0811";

	public function DBConnect($Ob) {
	$conn = $this->createConnection();
	$sql = "SELECT * FROM ". $Ob::DB_NAME;
	$result = $conn->query($sql);
	$arrayObject = array();

	if ($result->num_rows > 0) {
	    // output data of each row
    	while($row = $result->fetch_assoc()) {
	    	$temp = new $Ob($row);
	    	$arrayObject[] = $temp;
	    }
	}
	$conn->close();
	return $arrayObject;
	}

	private function createConnection() {
		// Create connection
		$conn = new mysqli(Db::servername, Db::username, Db::password,'ttrpg');

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
	}

	public function executeSQL($sql,$Ob) {
	$conn = $this->createConnection();
	error_log($sql,4);
	$result = $conn->query($sql);
	$arrayObject = array();
	error_log($result->num_rows,4);

	if ($result->num_rows > 0) {
	    // output data of each row
    	while($row = $result->fetch_assoc()) {
	    	$temp = new $Ob($row);
	    	$arrayObject[] = $temp;
	    }
	}
	$conn->close();
	error_log(print_r($arrayObject,true),4);
	return $arrayObject;

	}
}