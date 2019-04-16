<?php
  
namespace App\Controller;

use App\Repository\TournamentRepository;

class TournamentController {

    public function index() {
        echo 'index';
        $tournamentRepository = new TournamentRepository();
        $tournament = $tournamentRepository->startTournament();

        include_once 'src/View/Tournament/read.php';
    }

    public function create() {
        echo 'create';
    }

    public function update(){
        echo 'update';
    }

    

}