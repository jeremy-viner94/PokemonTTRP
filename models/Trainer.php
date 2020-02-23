<?php

class Trainer extends Model
{
	var $Id;
	var $Name;
	var $Password;
	const DB_NAME = "Trainers";

    public function __construct($array)
    {
        $this->Id = $array['Id'];
        $this->Name = $array['Name'];
        $this->Password = $array['Password'];
    }

    public function login($array) {
    	$trainer = $this->getTrainerByLogin($array);
    	if(is_null($trainer)) {
    		$trainer = false;
    	} else {
    		$trainer = $trainer[0];
    	}
    	return $trainer;
    }

    public function getId() {
    	return $this->Id;
    }

    public function getName() {
    	return $this->Name;
    }

    private function getTrainerByLogin($array) {

		$sql = "SELECT * FROM ttrpg." . $this::DB_NAME . " Where Name = '".$array['Name']. "' And Password = '". $array['Password'] ."'";
		$trainer = $this->executeSQL($sql,Trainer);
		return $trainer;
    }
}