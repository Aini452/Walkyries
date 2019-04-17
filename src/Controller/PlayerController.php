<?php
  
//CRUD Player

namespace App\Controller;

use App\Repository\PlayerRepository;
use  App\Model\Player;

class PlayerController {

    public function index() {
        echo 'index';

        $playerRepository = new PlayerRepository();
        $players = $playerRepository->getResults();
        
        include_once 'src/View/Player/read.php';
    }

    public function create() {
        echo 'create';
        $playerRepository = new PlayerRepository();
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['lastName']) && !empty($_POST['lastName']) && isset($_POST['firstName']) && !empty($_POST['firstName'])) {
                $player = new Player();
                $player->setLastName($_POST['lastName'])
                    ->setFirstName($_POST['firstName']);
                var_dump($player);
                $playerRepository->insert($player);

                header('Location: /walkyries/index.php?c=Player');
                exit;

            } else {
                $errors[] = 'Missing Fiels';
            }
        }
        require_once 'src/View/Player/create.php';
    }

    public function update(){
        echo 'update';

        $playerRepository = new PlayerRepository();
        $id= $_GET['id'];
        $errors = [];

        $player = $playerRepository->getResult('WHERE player_id =' . $id);
        var_dump($player);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['firstName']) && !empty($_POST['firstName']) && 
                isset($_POST['lastName']) && !empty($_POST['lastName'])) {

                $player->setLastName(htmlspecialchars($_POST['lastName']))
                    ->setFirstName(htmlspecialchars($_POST['firstName']));

                $playerRepository->update($player);

                header('Location: /walkyries/index.php?c=Player');
                exit;
            } else {
                $errors[] = 'Missing fields';
            }
        }

        require_once 'src/View/Player/update.php';
    }

    public function delete() {

        $playerRepository = new PlayerRepository();
        
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            header('Location: /player');
            exit;
        }
        $player = $playerRepository->getResult('WHERE player_id =' . $_GET['id']);
        var_dump($player);
        $playerRepository->delete($player);

        header('Location: /walkyries/index.php?c=Player');
        return;
    } 

}
