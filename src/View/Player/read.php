<!DOCTYPE html>
<html>
   <head>
      <title>Liste des joueurs</title>
         <script src="public/js/bootstrap.min.js"></script>                  
         <link  href="public/css/bootstrap.min.css" rel="stylesheet">
   </head>
   
   <body>
      <?php require_once'menu.php'?>
         <div class="container-fluid">
            <div class="row">
               <?php foreach ($players as $player) : ?>   
                  <div class="card border-dark mb-3" style="width: 300px; text-align :center; margin : 30px;">
                     <div class="card-header"><h3>Joueur N° <?php echo $player->getId(); ?> </h3>
                        <div class="card-body">
                              <p class="card-text"> <?php echo $player->getLastName(); ?> <?php echo $player->getFirstName(); ?></p> 
                        </div>
                           <a href="index.php?c=Player&a=update&id=<?php echo $player->getId(); ?>"><button type="button" class="btn btn-success" style="margin-right : 50px;">Update</button></a>                         
                           <a href="index.php?c=Player&a=delete&id=<?php echo $player->getId(); ?>"><button type="button" class="btn btn-danger" style="margin-left : 50px;">Delete</button></a>
                     </div>
                  </div>               
               <?php endforeach; ?>  
            </div>
         </div>
   </body>
</html>

