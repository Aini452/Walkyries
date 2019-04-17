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
                        <div class="card text-white bg-dark mb-3" style="width: 300px; text-align :center; margin : 30px;">
                              <div class="card-header"><h3>Joueur N° <?php echo $player->getId(); ?> </h3>
                                     <div class="card-body">
              
                <p class="card-text"> <?php echo $player->getLastName(); ?> <?php echo $player->getFirstName(); ?></p> 
             
                                     </div>
                                     <button type="button" class="btn btn-light" style="margin-right : 50px;">Update</button>
                                     <button type="button" class="btn btn-danger" style="margin-left : 50px;">Delete</button>
                              </div>
                        </div>
               
             <?php endforeach; ?>  
                </div>
            </div>

   </body>
</html>

