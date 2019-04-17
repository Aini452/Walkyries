<?php
  
namespace App\Controller;

use App\Repository\TournamentRepository;

class TournamentController {


    public function index() {
        echo 'index';
        $tournamentRepository = new TournamentRepository();
        $tournamentRepository->startTournament();
        $tournament = $tournamentRepository->getResults();
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
    }
    

}