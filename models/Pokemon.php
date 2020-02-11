<?php



class Pokemon
{

	var $id;
	var $name;
	var $type1;
	var $type2;
	var $imageURL;
	const DB_NAME = "Pokemon";


    public function __construct($array)
    {
        $this->Id = $array['Id'];
        $this->Name = $array['Name'];
        $this->Type1 = $array['Type1'];
        $this->Type2 = $array['Type2'];
    }

	public function getPokemon() {
			return Self::DBConnect(Pokemon);
	}

	public function DBConnect($Ob) {

	$servername = "3.17.10.222";
	$username = "app";
	$password = "Melanie0811";
	// Create connection
	$conn = new mysqli($servername, $username, $password,'ttrpg');

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
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
	

}