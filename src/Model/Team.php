<?php

namespace App\Model;

Class Team {

    private $teamId;
    private $teamName;
    private $player1Id;
    private $player2Id;

    public function getTeamId(){
        return $this->teamId;
    }

    public function setTeamId($value){
        $this->teamId = $value;
        return $this;
    }

	public function getTeamName() {
		return $this->teamName;
    }
    
    public function setTeamName($value){
        $this->teamName = $value;
        return $this;
    }

    public function getPlayer1Id() {
		return $this->player1Id;
    }
    
    public function setPlayer1Id($value){
        $this->player1Id = $value;
        return $this;
    }

    public function getPlayer2Id() {
		return $this->player2Id;
    }
    
    public function setPlayer2Id($value){
        $this->player2Id = $value;
        return $this;
    }
    
}