<?php

namespace App\Repository;

use App\Model\Tournament;
use App\Model\Match;

use App\Repository\TeamRepository;
use App\Repository\PlayerRepository;

class TournamentRepository extends Repository  {

    private static $matchTable = 'match';

    function __construct() {
        parent::__construct(TournamentRepository::$matchTable);
    }

    private function getTeamsStart() {
        $teamRepository = new TeamRepository();
        $teams =  $teamRepository->getResults();
      
        $teamsTournament = [];
        for ($i=0 ; $i<8 ; $i++){
            $teamsTournament[] = $teams[$i];
        }
        shuffle($teamsTournament);
        return $teamsTournament;
    }

    public function startTournament(int $id = 1) {
        $teams = self::getTeamsStart();
        if (count($teams)>3){ 
            echo 'Vous avez deja assez d\'équipes pour ce tournoi';
        } else {
            for ($i = 0 ; $i<4 ; $i++){
                $match = new Match();
                $player1Id = $teams[0]->getTeamId();
                array_shift($teams);
                $player2Id = $teams[0]->getTeamId();
                array_shift($teams);
                // A améliorer
                $match->setPlayer1($this->getTeamFormId($player1Id))
                        ->setPlayer2($this->getTeamFormId($player2Id))
                        ->setScore1(0)
                        ->setScore2(0)
                        ->setIdTournament($id)
                        ->setTag('quart');
                $this->insert($match);
            }
        }
       
    }

    public function getTeamFormId($id) {
        $team = new TeamRepository();
        $team = $team->getOneTeam($id);
        return $team;
    }

    public function insert($match)
    {
        if (!$match instanceof Match) {
            throw new \Exception('You can save only match');
        }
        $request = "(team_1, team_2, match_tag, score_1, score_2, tournament_id ) VALUES 
        ('" . $match->getPlayer1()->getTeamId() . "','" 
        . $match->getPlayer2()->getTeamId() . "','" 
        . $match->getTag() . "','"
        . $match->getScore1() . "','"
        . $match->getScore2() . "','"
        . $match->getIdTournament()
        . "')";
        return parent::insert($request);
    }

    public function getResults(string $request = ''): array {
        $result = parent::getResults($request);
        $matchs = [];
        foreach($result as $result){
            //var_dump($result);
            $matchs[] = $this->converToModel($result);
        }
        return $matchs;
    }

    private function converToModel(array $data): Match {
        $match = new Match();
        $match->setId((int)$data['match_id'])
                ->setPlayer1($this->getTeamFormId($data['team_1']))
                ->setScore1((int)$data['score_1'])
                ->setPlayer2($this->getTeamFormId($data['team_2']))
                ->setScore2((int)$data['score_2'])
                ->setIdTournament((int)$data['tournament_id'])
                ->setTag((int)$data['match_tag']);
        return $match;
    }

    public function updateScores($id, $score1, $score2){
        //$match = this->getMatch($id);
        $request = 'SET score_1=' . $score1 . ', score_2=' . $score2 . ' WHERE match_id=' . $id . ';';
        var_dump($request);
        parent::update($request);
    }

    public function compareScore($id){

    }
}