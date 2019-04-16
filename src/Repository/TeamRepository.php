<?php

namespace App\Repository;

use App\Model\Team;

class TeamRepository extends Repository {
    
    private static $teamTable = 'team';

    //constructor de TeamRepository
    public function __construct(){
        parent::__construct(TeamRepository::$teamTable);
    }

    //convert to model
    private function converToModel (array $data): Team {
        $team = new Team();
        $team->setId((int)$data['team_id'])
            ->setTeamName((string)$data['team_name'])
            ->setPlayer1((string)$data['player1'])
            ->setPlayer2((string)$data['player2']);
        return $team;
    }

    //find teams
    public function getTeams(string $request = ''): array {
        $teams = [];
        $results = parent:: getTeams($request);

        foreach ($results as $result){
            var_dump($result);
            $teams[]= $this->converToModel($result);
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