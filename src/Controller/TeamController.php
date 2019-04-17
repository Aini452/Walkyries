<?php

namespace App\Controller;

use App\Repository\TeamRepository;

class TeamController {

    private $teamRepository;

    
    public function index(){
        echo 'index';

        $teamRepository = new TeamRepository();
        $teams = $teamRepository->getResults();

        include_once 'src/View/Team/read.php';
    }

    public function create(){
        echo 'create';

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['teamName']) && !empty($_POST['teamName']) || isset($_POST['player1']) && !empty($_POST['player1']) || isset($_POST['player2']) && !empty($_POST['player2'])) {
                $team = new Team();
                $team->setTeamName($_POST['teamName'])
                    ->setplayer1Id($_POST['player1'])
                    ->setplayer2Id($_POST['player2']);

                $this->teamRepository->insert($team);

                /*header('Location: /team');
                exit;*/

            } else {
                $errors[] = 'Missing Fiels';
            }
        }

        require_once 'src/View/Team/create.php';
        return;
    }
    
    public function update(){
        echo 'update';

        $id = $_GET['id'];
        //$id = 1;
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['teamName']) && !empty($_POST['player1']) && !empty($_POST['player2'])) {
                $team = new Team();
                $team->setTeamName($_POST['teamName'])
                    ->setplayer1Id($_POST['player1'])
                    ->setplayer2Id($_POST['player2']);
                $this->teamRepository->insert($team);

                /*header('Location: /team');
                exit;*/
            } else {
                $errors[] = 'Missing fields';
            }
        }

        require_once 'src/View/Team/update.php';
        return;
    }
    
    public function delete(){
        echo 'delete';

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['teamName']) && !empty($_POST['player1']) && !empty($_POST['player2'])) {
                $team = new Team();
                $team->setTeamName($_POST['teamName'])
                    ->setplayer1Id($_POST['player1'])
                    ->setplayer2Id($_POST['player2']);

                $this->teamRepository->insert($team);

                /*header('Location: /team');
                exit;*/
            } else {
                $errors[] = 'Missing fields';
            }
        }

        require_once 'src/View/Team/delete.php';
        return;
    }
    
}
