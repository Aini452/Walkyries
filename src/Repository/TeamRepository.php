<?php

namespace App\Repository;

use App\Model\Team;
use App\Repository\PlayerRepository;

class TeamRepository extends Repository {
    
    private static $teamTable = 'team';

    //constructor de TeamRepository
    public function __construct(){
        parent::__construct(TeamRepository::$teamTable);
    }

    private function converToModel(array $data): Team {
        $team = new Team();
        $team->setTeamId((int)$data['team_id'])
                ->setTeamName((string)$data['team_name'])
                ->setplayer1Id($this->getPlayerFromId($data['player1_id']))
                ->setplayer2Id($this->getPlayerFromId($data['player2_id']));
        return $team;
    }

    public function getResults(string $request = ''): array {
        $result = parent::getResults($request);
        $teams = [];
        foreach($result as $result){
            //var_dump($result);
            $teams[] = $this->converToModel($result);
        }
        return $teams;
    }

    public function getPlayerFromId ($id) {
        $player = new PlayerRepository();
        $player = $player->getOnePlayer($id);
        return $player;
    }

    //find team
    public function getResult(string $request = ''): ?Team
    {
        $team = null;
        $result = parent::getResult($request);

        if ($result) {
            $team = new Team();
            $team->setTeamId($result['team_id'])
                ->setTeamName($result['team_name'])
                ->setPlayer1Id($result['player1_id'])
                ->setPlayer1Id($result['player2_id']);
        }
        return $team;
    }

    //insert team
    public function insert($team)
    {
        if (!$team instanceof Team) {
            throw new \Exception('You can save only team');
        }
        $request = "(team_name, player1_id, player2_id) VALUES ('" . $team->getTeamName() . "','" . $team->getPlayer1Id() . "','" . $team->getPlayer2Id() . "')";
        return parent::insert($request);
    }

    //update team

    public function update($team)
    {
        if (!$team instanceof Team) {
            throw new \Exception('You can save only team');
        }
        $request = "SET team_name = '" . $team->getTeamName() . "', player1_id = '" . $team->getPlayer1Id() . "', player2_id = '" . $team->getPlayer2Id() . "' WHERE team_id = " . $team->getTeamId() . " ";
        parent::update($request);
    }

    //delete team
    public function delete($team){
        if(!$team instanceof Team){
            throw new \Exception('You can save only teams');
        }
        $request = "WHERE team_id= " . $team->getTeamId();
        parent::delete($request);
    }


}