<!DOCTYPE html>
    <html>
        <head>
            <title>Création des Teams</title>
            <script src="public/js/bootstrap.min.js"></script>                  
            <link  href="public/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body> 
        <img src="public/banner.jpg" alt="police-game-of-thrones" border="0">
         <?php foreach ($teams as $team) : ?> 
            <div class="card" style="width: 400px; margin : 20px; text-align : center;">
                    
                <h5 class="card-title"> <?php echo $team->getTeamName(); ?> </h5>
                <p class="card-text"> Joueur 1 : <?php echo $team->getplayer1Id(); ?> et Joueur 2 :<?php echo $team->getplayer2Id(); ?>  </p>     
                <p class="card-text"> </p>     
                   
             </div>
             <?php endforeach; ?> 
        </body>
           
    </html>