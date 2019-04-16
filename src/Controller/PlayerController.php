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
    }

    public function update(){
        echo 'update';
    }

    public function delete() {
        echo 'delete';
    } 

}
