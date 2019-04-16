<?php

namespace App\Model;

class Tournament {
     /** @var int id */
     private $id;

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
}