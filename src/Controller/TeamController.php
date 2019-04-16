<?php

namespace App\Controller;

use App\Repository\TeamRepository;

class TeamController {

    private $teamRepository;

    public function create(){
        echo 'create';
    }
    
    public function index(){
        echo 'index';

        $teamRepository = new TeamRepository();
        $teams = $this->teamRepository->getTeams();

        require_once 'src/View/Team/read.php';
    }
    
    public function update(){
        echo 'update';
    }
    
    public function delete(){
        echo 'delete';
    }
    
}
