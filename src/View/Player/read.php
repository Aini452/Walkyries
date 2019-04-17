<!DOCTYPE html>
<html>
<head>
<title>Liste des joueurs</title>
<script src="public/js/bootstrap.min.js"></script>                  
<link  href="public/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

        <?php require_once'menu.php'?>
           
            <?php foreach ($players as $player) : ?>     
            <div class="card" style="width: 300px; margin : 20px; text-align : center;">
                <h5 class="card-title"> Numéro du joueur : <?php echo $player->getId(); ?> </h5>
                <p class="card-text"> Nom et prénom du joueur : <?php echo $player->getLastName(); ?>  <?php echo $player->getFirstName(); ?>  </p>     
                <p class="card-text"> </p>                     
             </div>
    <?php endforeach; ?>
   </body>
</html>

