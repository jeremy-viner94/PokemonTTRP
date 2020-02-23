<?php 


class Move extends Model
{

	const DB_NAME = "MoveTable";


    public function __construct($array)
    {
    	if(is_null($array)) {
    		return;
    	}
        $this->MoveId = $array['MoveId'];
        $this->Name = $array['Name'];
        $this->MovePower = $array['MovePower'];
        $this->Type = $array['Type'];
    }


}