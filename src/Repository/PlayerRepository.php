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
            var_dump($res);
            $players[] = $this->converToModel($res);
        }
        return $players;
    }
}