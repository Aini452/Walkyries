<?php
  
namespace App\Controller;

use App\Repository\TournamentRepository;

class TournamentController {


    public function index() {
        //Si deja 4 équipes, on ne pourra pas relancer le tournoi, prévoir un moyen soit de remélanger soit de supprimer le tournoi
        $tournamentRepository = new TournamentRepository();
        $tournamentRepository->startTournament();
        $tournament = $tournamentRepository->getResults("WHERE match_tag = 'quart';");
        include_once 'src/View/Tournament/read.php';
    }

    public function create() {
        echo 'create';
    }

    public function update(){
        echo 'update';
    }

    public function quart (){
        echo 'lala';
        $score1 = $_POST['score1'];
        echo $_POST['score1'];
        $score2 = $_POST['score2'];
        echo $_POST['score2'];
        $id = $_POST['matchId'];
        echo $_POST['matchId'];

        $tournamentRepository = new TournamentRepository();
        $tournamentRepository->updateScores($id, $score1, $score2);



    }
    
    public function compareScore($id){
      // On retourne l'équipe qui gagne
    }

}