<?php

namespace App\Repository;

use App\Model\Tournament;
use App\Model\Match;

use App\Repository\TeamRepository;

class TournamentRepository extends Repository  {

    private static $tournamentTable = 'tournament';
    private static $matchTable = 'match';

    function __construct() {
        parent::__construct(self::$tournamentTable);
        parent::__construct(self::$matchTable);
    }

    private function getTeamsStart() {
        $teamRepository = new TeamRepository();
        $teams =  $teamRepository->getResults();
        $teamsTournament = [];
        for ($i=0 ; $i<8 ; $i++){
            $teamsTournament[] = $teams[$i];
        }
        return $teamsTournament;
    }

    public function startTournament(int $id = 1) {
        $teams = self::getTeamsStart();
        var_dump($teams);
        $quart = [];
        for ($i = 0 ; $i<4 ; $i++){
            $match = new Match();
            $player1Id = $teams[0]->getTeamId();
            array_shift($teams);
            $player2Id = $teams[0]->getTeamId();
            array_shift($teams);
            // A améliorer
            $match->setPlayer1($player1Id)
                    -> setPlayer2($player2Id)
                    ->setIdTournament($id);
            $quart[] = $match;
        }
        return $quart;
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