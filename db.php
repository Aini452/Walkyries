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



$db->query('CREATE TABLE IF NOT EXISTS `player`(
    player_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    last_name VARCHAR(255),
    first_name VARCHAR(255));');

if ($db->errno){
    throw new Exception($db->error);    
}

$db->query('CREATE TABLE IF NOT EXISTS `team`(
    team_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    team_name VARCHAR(255),
    player1_id INT,
    player2_id INT,
    FOREIGN KEY (player1_id) REFERENCES player(player_id),
    FOREIGN KEY (player2_id) REFERENCES player(player_id));');
    
if ($db->errno){
    throw new Exception($db->error);
}

$db->query('CREATE TABLE IF NOT EXISTS `tournament`(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT);');
    
if ($db->errno){
    throw new Exception($db->error);
}

$db->query('CREATE TABLE IF NOT EXISTS `match`(
    match_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    team_1 INT,
    team_2 INT,
    match_tag VARCHAR(255),
    score_1 INT,
    score_2 INT,
    tournament_id INT,
    FOREIGN KEY (team_1) REFERENCES team(team_id),
    FOREIGN KEY (team_2) REFERENCES team(team_id),
    FOREIGN KEY (tournament_id) REFERENCES tournament(id));');
    
if ($db->errno){
    throw new Exception($db->error);
}


if ( !$db->query ("INSERT INTO player (last_name, first_name)  
                                VALUES  ('Stark', 'Sansa'),
                                        ('Stark', 'Bran'),
                                        ('Stark', 'Arya'),
                                        ('Targaryen', 'Daenerys'),
                                        ('Targaryen', 'Aegon'),
                                        ('Lannister', 'Tyrion'),
                                        ('Lannister', 'Jaime'),
                                        ('Lannister', 'Cersei'),
                                        ('King', 'Night'),
                                        ('Baratheon', 'Gendry'),
                                        ('De Torth', 'Brienne'),
                                        ('Fleau D\'Ogre', 'Tormund'),
                                        ('Clegane', 'Sandor'),
                                        ('Mormont', 'Jorah'),
                                        ('Lord', 'Varys'),                                      
                                        ('Greyjoy','Theon');"))                                      
        {
                echo "5- Erreur : ".$db->errno." - ".$db->error;
        }

        if (!$db->query ("INSERT INTO team (team_name, player1_id, player2_id)
                                VALUES ('Team Dragon',4,5),
                                       ('Team Sauvageon',11,12),
                                       ('Team Dead',9,2),
                                       ('Team Stark',1,3),
                                       ('Team Fraticide',6,7),
                                       ('Team Secondaire',10,13),
                                       ('Team Khaleesi',16,14),
                                       ('Team Bizarre',8,15);"))
        {
                echo "6- Erreur : ".$db->errno." - ".$db->error;
        }