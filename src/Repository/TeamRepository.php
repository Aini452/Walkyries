<?php

namespace App\Repository;

use App\Model\Team;

class TeamRepository extends Repository implements IRepository {
    private static $table = 'team';

    //constructor de TeamRepository
    public function __construct(){
        parent::__construct(TeamRepository::$table);
    }

    //find one team
    public function getTeam(string $request = ''): Team {

        $team = null;
        $result = parent:: getTeam($request);

        if($result) {
            $team = new Team();
            $team->setTeamName($result['teamName'])
                ->setPlayer1($result['player1'])
                ->setPlayer2($result['player2']);
        }

        return $team;
    }

    //find teams
    public function getTeams(string $request = ''): Team {

        $teams = [];
        $results = parent:: getTeams($request);

        if($result) {
            $team = new Team();
            $team->setTeamName($result['teamName'])
                ->setPlayer1($result['player1'])
                ->setPlayer2($result['player2']);
            $teams[] = $team;
        }

        return $teams;
    }

    //delete team
    public function delete($team){
        if(!$team instanceof Team){
            throw new \Exception('You can save only teams');
        }
        $request = "WHERE id= " . $team->getId();
        parent::delete($request);
    }


}