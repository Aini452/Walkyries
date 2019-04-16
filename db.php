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


   if (!$db->query("DROP TABLE IF EXISTS team;")) {
        echo "2- Erreur : ".$db->errno." - ".$db->error;
    }

if (!$db->query("DROP TABLE IF EXISTS player;")) {
    echo "1- Erreur : ".$db->errno." - ".$db->error;
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
                echo "3- Erreur : ".$db->errno." - ".$db->error;
        }

        if (!$db->query ("INSERT INTO team (team_name, player1_id, player2_id)
                                VALUES ('Team Dragon',4,5),
                                       ('Team Sauvageon',11,12),
                                       ('Team WeReDead',9,2),
                                       ('Team SisStark',1,3),
                                       ('Team MySisWantsUsDead',6,7),
                                       ('Team WeReSecondaryPeople',10,13),
                                       ('Team WeReLoveTheQueen',16,14),
                                       ('Team WeReReallyWeird',8,15);"))
        {
                echo "4- Erreur : ".$db->errno." - ".$db->error;
        }