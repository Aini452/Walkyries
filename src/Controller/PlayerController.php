<?php
  
//CRUD Player

namespace App\Controller;

use App\Repository\PlayerRepository;
use  App\Model\Player;

class PlayerController {

    //view of all players
    public function index() {
        $playerRepository = new PlayerRepository();
        $players = $playerRepository->getResults();
        
        include_once 'src/View/Player/read.php';
    }

    // Create a new player
    public function create() {
        $playerRepository = new PlayerRepository();
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['lastName']) && !empty($_POST['lastName']) && isset($_POST['firstName']) && !empty($_POST['firstName'])) {
                $player = new Player();
                $player->setLastName($_POST['lastName'])
                    ->setFirstName($_POST['firstName']);
                $playerRepository->insert($player);

                header('Location: /index.php?c=Player');
                exit;

            } else {
                $errors[] = 'Missing Fiels';
            }
        }
        require_once 'src/View/Player/create.php';
    }

    // Update a player
    public function update(){

        $playerRepository = new PlayerRepository();
        $id= $_GET['id'];
        $errors = [];

        $player = $playerRepository->getResult('WHERE player_id =' . $id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['firstName']) && !empty($_POST['firstName']) && 
                isset($_POST['lastName']) && !empty($_POST['lastName'])) {

                $player->setLastName(htmlspecialchars($_POST['lastName']))
                    ->setFirstName(htmlspecialchars($_POST['firstName']));

                $playerRepository->update($player);

                header('Location: /index.php?c=Player');
                exit;
            } else {
                $errors[] = 'Missing fields';
            }
        }

        require_once 'src/View/Player/update.php';
    }

    //Delete a player
    public function delete() {

        $playerRepository = new PlayerRepository();
        
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            header('Location: /player');
            exit;
        }
        $player = $playerRepository->getResult('WHERE player_id =' . $_GET['id']);
        $playerRepository->delete($player);

        header('Location: /index.php?c=Player');
        return;
    } 

}
