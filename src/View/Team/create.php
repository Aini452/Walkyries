<!DOCTYPE html>

<html>
<head>
<title>Création des équipes</title>
<script src="public/js/bootstrap.min.js"></script> 
<link  href="public/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php require_once'menu.php'?>
    <div class="container">  
    <div class="row">
    <div class="col-3"></div>
        <form method=POST  class="col-6" style ="text-align : center; background-color : rgb(169,169,169); padding : 30px; border-radius : 20px; margin-top : 20px;">
        <h3 style="margin-top :10px; margin-bottom : 30px; color : white;"> Crée ta propre équipe de petanqueur</h3>
            <div class="form-group">
                <label>Nom de ton équipe</label>
                <input type="text" class="form-control" name="teamName">
            </div>
            <div class="form-group">
            <label>Pétanqueur N°1 </label>
                <select class="form-control" name='player1'>
                    <?php foreach ($players as $player): ?>
                    <option value='<?php echo $player->getId(); ?>'><?php echo $player->getLastName()?> <?php echo $player->getFirstName() ?> </option>
                    <?php endforeach; ?>  
                </select>

            </div>
            <div class="form-group">
            <label>Pétanqueur N°2 </label>
            <select class="form-control" name='player2'>
                    <?php foreach ($players as $player) : ?>
                    <option value='<?php echo $player->getId(); ?>'><?php echo $player->getLastName() ?> <?php echo $player->getFirstName() ?> </option>
                    <?php endforeach; ?>  
                </select>

            </div>
            <button type="submit" class="btn btn-light">Lancer la création</button>
        </form>
        <div class="col-3"></div>
        </div>
    </div>
</body>
</html>