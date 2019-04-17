<!DOCTYPE html>

<html>
        <head>
            <title>Création des Teams</title>
            <script src="public/js/bootstrap.min.js"></script>                  
            <link  href="public/css/bootstrap.min.css" rel="stylesheet">
        </head>

    <body>        
        <?php require_once'menu.php'?>

            <div class="container-fluid">
                 <div class="row">
                    <?php foreach ($teams as $team) : ?>  
                        <div class="card border-dark mb-3" style="width: 300px; text-align :center; margin : 30px;">
                              <div class="card-header"><h3><?php echo $team->getTeamName(); ?> </h3>
                                     <div class="card-body">
                                         <h6 class="card-title">Nom des joueurs  </h6>
                                             <p class="card-text"></p> <?php echo $team->getplayer1Id()->getFirstname(); ?>
                                             <p class="card-text"> <?php echo $team->getplayer2Id()->getFirstname(); ?></p>
                                     </div>
                                     <a href="index.php?c=Team&a=update&id=<?php echo $team->getTeamId(); ?>"><button type="button" class="btn btn-success" style="margin-right : 50px;">Update</button></a>
                                     <a href="index.php?c=Team&a=delete&id=<?php echo $team->getTeamId(); ?>"><button type="button" class="btn btn-danger" style="margin-left : 50px;">Delete</button></a>
                              </div>                              
                        </div>               
                     <?php endforeach; ?>  
                </div>
            </div>
    </body>
           
</html>