<?php

class TrainerPokemon extends Pokemon
{

	const DB_NAME = "CapturedPokemon";

	var $idCapturedPokemon;
	var $TrainerId;
	var $PokemonId;
	var $MaxHP;
	var $CurrentHP;
	var $Exp;
	var $Level;
	var $Move1;
	var $Move2;
	var $Active;


    public function __construct($array = null)
    {

    	if(is_null($array)) {
    		return;
    	}
        $this->idCapturedPokemon = $array['idCapturedPokemon'];
        $this->TrainerId = $array['TrainerId'];
        $this->PokemonId = $array['PokemonId'];
        $this->MaxHP = $array['MaxHP'];
        $this->CurrentHP = $array['CurrentHP'];
        $this->Exp = $array['Exp'];
        $this->Level = $array['Level'];
        $this->Move1 = $array['Move1'];
        $this->Move2 = $array['Move2'];
        $this->Active = $array['Active'];
        parent::__construct($array);
    }

	public function getTrainersPokemon($trainerId)
	{
		$sql = "Select * From " . $this::DB_NAME;
		$sql .= " Left JOIN ". parent::DB_NAME ." ON ".$this::DB_NAME.".PokemonId = ". parent::DB_NAME.".Id";
		$sql .= " where TrainerId = '".$trainerId. "' And Active = '1'";
		$sql .= " UNION";
		$sql .= " Select * From " . $this::DB_NAME;
		$sql .= " Right JOIN ". parent::DB_NAME ." ON ".$this::DB_NAME.".PokemonId = ". parent::DB_NAME.".Id";
		$sql .= " where TrainerId = '".$trainerId. "' And Active = '1'";
		$Pokemon = $this->executeSQL($sql,TrainerPokemon);
		return $Pokemon;

	}

	public function getMoveSet() {
		$sql = "Select * From " . Move::DB_NAME;
		$sql .=" Where MoveId = '".$this->Move1. "' or MoveId = '". $this->Move2 ."'";
		$moves = $this->executeSQL($sql,Move);
		return $moves;
	}

}