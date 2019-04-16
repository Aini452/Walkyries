<?php
  
namespace App\Controller;

use App\Repository\PlayerRepository;

class PlayerController {

    public function index() {
        echo 'index';

        $playerRepository = new PlayerRepository();
        $players = $playerRepository->getResults();
        
        include_once 'src/View/Player/read.php';
    }

    public function create() {
        echo 'create';

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['lastName']) && !empty($_POST['lastName']) || isset($_POST['firstName']) && !empty($_POST['firstName'])) {
                $player = new Player();
                $player->setLastName($_POST['lastName'])
                    ->setFirstName($_POST['firstName']);

                $this->playerRepository->insert($player);

                /*header('Location: /player');
                exit;*/

            } else {
                $errors[] = 'Missing Fiels';
            }
        }

        require_once 'src/View/Player/create.php';
        return;
    }

    public function update(){
        echo 'update';

        $id= $_GET['id'];
        //$id=1;
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['lastName']) && !empty($_POST['firstName'])) {
                $player = new Player();
                $player->setLastName($_POST['lastName'])
                    ->setFirstName($_POST['firstName']);

                $this->playerRepository->update($player);

                /*header('Location: /player');
                exit;*/
            } else {
                $errors[] = 'Missing fields';
            }
        }

        require_once 'src/View/Player/update.php';
        return;
    }

    public function delete() {
        echo 'delete';

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['lastName']) && !empty($_POST['firstName'])) {
                $player = new player();
                $player->setFirstName($_POST['lastName'])
                    ->setLastName($_POST['firstName']);

                $this->playerRepository->insert($player);

                /*header('Location: /player');
                exit;*/
            } else {
                $errors[] = 'Missing fields';
            }
        }

        require_once 'src/View/Player/delete.php';
        return;
    } 

}
