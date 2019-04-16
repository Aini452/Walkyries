<?php

namespace App\Model;

Class Player {
    /** @var int id */
    private $id;
    /** @var string firstName */
    private $firstName;
    /** @var string lastName */
    private $lastName;

    /**
      * Get the value of id
      *
      * @return int
      */ 
    public function getId(): int {
        return $this->id;
    }
     /**
      * Set the value of id
      *
      * @return  self
      */ 
    public function setId($value): self {
        $this->id = $value;
        return $this;
    }

    /**
      * Get the value of firstName
      *
      * @return string
      */ 
	public function getFirstName(): string {
		return $this->firstName;
    }
    /**
      * Set the value of firstName
      *
      * @return  self
      */ 
    public function setFirstName($value): self {
        $this->firstName = $value;
        return $this;
    }

    /**
      * Get the value of lastName
      *
      * @return string
      */ 
    public function getLastName(): string {
		return $this->lastName;
    }
    /**
      * Set the value of lastName
      *
      * @return  self
      */ 
    public function setLastName($value): self {
        $this->lastName = $value;
        return $this;
    }
}