<?php

namespace App\Model;

Class Team {

    private $id;
    private $teamName;

    public function getId(){
        return $this->id;
    }

    public function setId($value){
        $this->id = $value;
        return $this;
    }

	public function getTeamName() {
		return $this->name;
    }
    
    public function setTeamName($value){
        $this->teamName = $value;
        return $this;
    }
    
}