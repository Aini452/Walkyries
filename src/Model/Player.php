<?php

namespace App\Model;

Class Player {

    private $id;
    private $firstName;
    private $lastName;
    private $equipe;

    public function getId(){
        return $this->id;
    }

    public function setId($value){
        $this->id = $value;
        return $this;
    }

	public function getFirstName() {
		return $this->firstName;
    }
    
    public function setFirstName($value){
        $this->firstName = $value;
        return $this;
    }

    public function getLastName() {
		return $this->lastName;
    }
    
    public function setLastName($value){
        $this->lirstName = $value;
        return $this;
    }

    public function getEquipe() {
		return $this->equipe;
    }
    
    public function setEquipe($value){
        $this->equipe = $value;
        return $this;
    }
    
}