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

    public function getOnePlayer(int $id): Player {
        $playersTab = $this->getResults();
        foreach ($playersTab as $res) {
            if ($res->getId() === $id){
                return $res;
            }
        }
        return false;
    }
}