<?php

namespace App\Model;

class Match {
    /** @var int id */
    private $id;
    /** @var int player1 */
    private $player1;
    /** @var int score1 */
    private $score1;
    /** @var int player2 */
    private $player2;
    /** @var int  score2 */
    private $score2;
    /** @var int idTournament */
    private $idTournament;
    /** @var string tag */
    private $tag;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of player1
     */ 
    public function getPlayer1()
    {
        return $this->player1;
    }

    /**
     * Set the value of player1
     *
     * @return  self
     */ 
    public function setPlayer1($player1)
    {
        $this->player1 = $player1;

        return $this;
    }

    /**
     * Get the value of score1
     */ 
    public function getScore1()
    {
        return $this->score1;
    }

    /**
     * Set the value of score1
     *
     * @return  self
     */ 
    public function setScore1($score1)
    {
        $this->score1 = $score1;

        return $this;
    }

    /**
     * Get the value of player2
     */ 
    public function getPlayer2()
    {
        return $this->player2;
    }

    /**
     * Set the value of player2
     *
     * @return  self
     */ 
    public function setPlayer2($player2)
    {
        $this->player2 = $player2;

        return $this;
    }

    /**
     * Get the value of score2
     */ 
    public function getScore2()
    {
        return $this->score2;
    }

    /**
     * Set the value of score2
     *
     * @return  self
     */ 
    public function setScore2($score2)
    {
        $this->score2 = $score2;

        return $this;
    }

    /**
     * Get the value of idTournament
     */ 
    public function getIdTournament()
    {
        return $this->idTournament;
    }

    /**
     * Set the value of idTournament
     *
     * @return  self
     */ 
    public function setIdTournament($idTournament)
    {
        $this->idTournament = $idTournament;

        return $this;
    }

    /**
     * Get the value of tag
     */ 
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set the value of tag
     *
     * @return  self
     */ 
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }
}