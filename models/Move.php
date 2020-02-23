<?php 


class Move extends Model
{

	const DB_NAME = "MoveTable";


    public function __construct($array)
    {
        $this->MoveId = $array['MoveId'];
        $this->Name = $array['Name'];
        $this->MovePower = $array['MovePower'];
        $this->Type = $array['Type'];
    }


}