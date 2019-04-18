<?php
  
namespace App\Controller;

use App\Repository\MatchRepository;

class MatchController {

    //View the Matchs
    public function index() {
        //Si deja 4 équipes, on ne pourra pas relancer le tournoi, prévoir un moyen soit de remélanger soit de supprimer le tournoi
        $matchRepository = new MatchRepository();
        $matchRepository->startTournament();
        $tournamentQuart = $matchRepository->getResults("WHERE match_tag = 'quart';");
        $tournamentDemiFinale = $matchRepository->getResults("WHERE match_tag = 'demi-finale';");
        $tournamentFinale = $matchRepository->getResults("WHERE match_tag = 'finale';");
        $tournamentPetiteFinale = $matchRepository->getResults("WHERE match_tag = 'petite-finale';");
        include_once 'src/View/Tournament/read.php';
    }

    //Function to resolve the quart
    public function quart (){

        $score1 = $_POST['score1'];
        echo $_POST['score1'];
        $score2 = $_POST['score2'];
        echo $_POST['score2'];
        $id = $_POST['matchId'];
        echo $_POST['matchId'];

        $matchRepository = new MatchRepository();
        $matchRepository->updateScores($id, $score1, $score2);

        $teamid = $matchRepository->compareScore($id);
    }

}