<?php

namespace App\Repository;

use App\Model\Team;

class TeamRepository extends Repository {
    
    private static $teamTable = 'team';

    //constructor de TeamRepository
    public function __construct(){
        parent::__construct(TeamRepository::$teamTable);
    }

    private function converToModel(array $data): Team {
        $team = new Team();
        $team->setId((string)$data['team_id'])
                ->setId((string)$data['team_name'])
                ->setId((string)$data['player1_id'])
                ->setId((string)$data['player2_id']);
        return $team;
    }

    public function getResults(string $request = ''): array {
        $result = parent::getResults($request);
        $teams = [];
        foreach($result as $result){
            var_dump($result);
            $teams[] = $this->converToModel($result);
        }
        return $teams;
    }

    //find team
    public function getResult(string $request = ''): ?Team
    {
        $team = null;
        $result = parent::getResult($request);

        if ($result) {
            $team = new Team();
            $team->setId($result['team_id'])
                ->setTeamName($result['team_name'])
                ->setPlayer1($result['player1_id'])
                ->setPlayer1($result['player2_id']);
        }
        return $team;
    }

    //insert team
    public function insert($team)
    {
        if (!$team instanceof Team) {
            throw new \Exception('You can save only team');
        }
        $request = "(team_name, player1_id, player2_id) VALUES ('" . $team->getTeamName() . "','" . $team->getPlayer1() . "','" . $team->getPlayer2() . "')";
        return parent::insert($request);
    }

    //update team

    public function update($team)
    {
        if (!$team instanceof Team) {
            throw new \Exception('You can save only team');
        }
        $request = "SET team_name = '" . $team->getTeamName() . "', player1_id = '" . $team->getPlayer1() . "', player2_id = '" . $team->getPlayer2() . "' WHERE team_id = " . $team->getId() . " ";
        parent::update($request);
    }

    //delete team
    public function delete($team){
        if(!$team instanceof Team){
            throw new \Exception('You can save only teams');
        }
        $request = "WHERE team_id= " . $team->getId();
        parent::delete($request);
    }


}