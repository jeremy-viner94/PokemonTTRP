<?php



class Pokemon extends Model
{
	const DB_NAME = "Pokemon";


    public function __construct($array)
    {
        $this->Id = $array['Id'];
        $this->Name = $array['Name'];
        $this->Type1 = $array['Type1'];
        $this->Type2 = $array['Type2'];
    }

	public function getPokemon() {
			return $this->DBConnect(Pokemon);
	}

}