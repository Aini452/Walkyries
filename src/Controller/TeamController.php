<?php

namespace App\Controller;


use App\Repository\TeamRepository;
use App\Repository\PlayerRepository;
use App\Model\Team;

class TeamController {

    private $teamRepository;

    
    public function index(){
        $teamRepository = new TeamRepository();
        $teams = $teamRepository->getResults();

        include_once 'src/View/Team/read.php';
    }

    public function create(){
        $teamRepository = new TeamRepository();
        $playerRepository = new PlayerRepository();
        $players = $playerRepository->getResults();
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['teamName']) && !empty($_POST['teamName']) && 
                isset($_POST['player1']) && !empty($_POST['player1']) && 
                isset($_POST['player2']) && !empty($_POST['player2'])) {
                if ($_POST['player1'] == $_POST['player2']){
                    //echo "Veuillez choisir des pétanqueurs différents";
                    header('Location: /index.php?c=Team&a=create&message=Veuillez choisir des pétanqueur différents');
                    exit;
                }
                $team = new Team();

                $team->setTeamName($_POST['teamName'])
                    ->setplayer1Id($_POST['player1'])
                    ->setplayer2Id($_POST['player2']);
                $teamRepository->insert($team);

                header('Location: /index.php?c=Team');
                exit;
            } else {
                $errors[] = 'Missing Fiels';

            }

        }

        require_once 'src/View/Team/create.php';

        return;

    }
    
    public function update(){
        $teamRepository = new TeamRepository();
        $playerRepository = new PlayerRepository();
        $players = $playerRepository->getResults();
        $id = $_GET['id'];
        $errors = [];
        $team = $teamRepository->getResult('WHERE team_id=' . $id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['player1']) && !empty($_POST['player1']) && 
                isset($_POST['player2']) && !empty($_POST['player2'])) {
                if ($_POST['player1'] == $_POST['player2']){
                    //echo "Veuillez choisir des pétanqueurs différents";
                    header('Location: /index.php?c=Team&message=Veuillez choisir des pétanqueur différents');
                    exit;
                }
                $team->setplayer1Id(htmlspecialchars($_POST['player1']))
                    ->setplayer2Id(htmlspecialchars($_POST['player2']));
                $teamRepository->update($team);
                header('Location: /index.php?c=Team');
                exit;
            } else {

                $errors[] = 'Missing fields';

            }

        }

        require_once 'src/View/Team/update.php';

    }

    //chemin de redirection à modifier selon le chemin de l'URL

    

    public function delete() {

        $teamRepository = new TeamRepository();

        

        if (!isset($_GET['id']) || empty($_GET['id'])) {

            header('Location: /index.php?c=Team');

            exit;

        }

        $team = $teamRepository->getResult('WHERE team_id =' . $_GET['id']);

        var_dump($team);

        $teamRepository->delete($team);

        header('Location: /index.php?c=Team');

        return;

    }
    
}
