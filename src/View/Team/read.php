<!DOCTYPE html>
    <html>
        <head>
            <title>Création des Teams</title>
            <script src="public/js/bootstrap.min.js"></script>                  
            <link  href="public/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body> 
       
        <?php require_once'menu.php'?>

        <div class="container">
         <?php foreach ($teams as $team) : ?> 
            <div class="card" style="margin : 20px; text-align : center;">
                    
                <h5 class="card-title"> <?php echo $team->getTeamName(); ?> </h5>
                <p class="card-text"> Joueur 1 : <?php echo $team->getplayer1Id()->getFirstname(); ?> et Joueur 2 :<?php echo$team->getplayer2Id()->getFirstname(); ?>  </p>     
                <p class="card-text"> </p>     
                   
             </div>
             <?php endforeach; ?> 
             </div>
        </body>
           
    </html>