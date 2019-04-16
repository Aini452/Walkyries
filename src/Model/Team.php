<?php

namespace App\Model;

Class Team {

    private $id;
    private $teamName;
    private $player1;
    private $player2;

    public function getId(){
        return $this->id;
    }

    public function setId($value){
        $this->id = $value;
        return $this;
    }

	public function getTeamName() {
		return $this->teamName;
    }
    
    public function setTeamName($value){
        $this->teamName = $value;
        return $this;
    }

    public function getPlayer1() {
		return $this->player1;
    }
    
    public function setPlayer1($value){
        $this->player1 = $value;
        return $this;
    }

    public function getPlayer2() {
		return $this->player2;
    }
    
    public function setPlayer2($value){
        $this->player2 = $value;
        return $this;
    }
    
}