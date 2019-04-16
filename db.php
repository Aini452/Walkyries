<?php

require_once 'vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$env = getenv('ENV');//chargement des variables d environnement seulement en local

if(!$env || $env === 'dev') {
    $dotenv = new DotEnv();
    $dotenv->load(__DIR__ . '/.env');

}

$db = new mysqli(getenv('DB_HOST'), 
                getenv('DB_USER'),
                getenv('DB_PASSWORD'),
                getenv('DB_NAME'),
                getenv('DB_PORT')
);

if($db->connect_errno){
    throw new Exception($db->connect_error);
}

$db->query('CREATE TABLE IF NOT EXISTS `team`(team_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, team_name VARCHAR(255);');

if ($db->errno){
    throw new Exception($db->error);
}
$db->query('CREATE TABLE IF NOT EXISTS `player`(player_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, last_name VARCHAR(255), first_name VARCHAR(255)),FOREIGN KEY (team_id) REFERENCES team(team_id);');

if ($db->errno){
    throw new Exception($db->error);
}