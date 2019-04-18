<?php

namespace App\Repository;

use App\Model\Player;

class PlayerRepository extends Repository  {

    private static $playerTable = 'player';

    function __construct() {
        parent::__construct(self::$playerTable);
    }

    private function converToModel(array $data): Player {
        $player = new Player();
        $player->setId((int)$data['player_id'])
                ->setFirstName((string)$data['first_name'])
                ->setLastName((string)$data['last_name']);
        return $player;
    }

    public function getResults(string $request = ''): array {
        $result = parent::getResults($request);
        $players = [];
        foreach($result as $res){
            $players[] = $this->converToModel($res);
        }
        return $players;
    }

    public function getOnePlayer(int $id) {
        $playersTab = $this->getResults();
        foreach ($playersTab as $res) {
            if ($res->getId() === $id){
                return $res;
            }
        }
        return false;
    }

    public function getResult(string $request = '')
    {
        $player = null;
        $result = parent::getResult($request);

        if ($result) {
            $player = new Player();
            $player->setId($result['player_id'])
                ->setFirstName($result['first_name'])
                ->setLastName($result['last_name']);
        }
        return $player;
    }

    //insert player
    public function insert($player)
    {
        if (!$player instanceof Player) {
            throw new \Exception('You can save only player');
        }
        $request = "( last_name, first_name) VALUES ('" . $player->getFirstName() . "','" . $player->getLastName() . "')";
        return parent::insert($request);
    }

    //update player
    public function update($player)
    {
        if (!$player instanceof Player) {
            throw new \Exception('You can save only player');
        }
        $request = "SET last_name = '" . $player->getLastName() . "', first_name = '" . $player->getFirstName() . "' WHERE player_id = " . $player->getId() . " ";
        parent::update($request);
    }

    //delete player
    public function delete($player){
        if(!$player instanceof Player){
            throw new \Exception('You can save only player');
        }
        $request = "WHERE player_id= " . $player->getId();
        parent::delete($request);
    }
}