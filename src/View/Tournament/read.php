<!DOCTYPE html>
    <html>
        <head>
            <title>Création du Tournoi</title>
            <script src="http://code.jquery.com/jquery-1.9.0rc1.js"></script>
        </head>
    <body>

        <?php require_once'menu.php'?>
            <div class="container">
                <div class="row">

                    <div class='col-4'>
                        <strong>Quart de finale</strong>
                        <?php foreach ($tournament as $match) : ?>
                            <div id="<?php echo $match->getId(); ?>">
                                <p><?php echo $match->getId(); ?></p>
                                <ul class="list-group" style="width : 250px; margin : 50px;">      
                                    <li class="list-group-item d-flex justify-content-between align-items-center"><?php echo $match->getPlayer1()->getTeamName(); ?>
                                        <input class="score1" type="score" placeholder="score" style="width : 50px;" name="<?php echo $match->getPlayer2()->getTeamId()?>"
                                        value="<?php echo $match->getScore1(); ?>">    
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center"><?php echo $match->getPlayer2()->getTeamName(); ?>
                                    <input class="score2" type="score" placeholder="score" style="width : 50px;" name="<?php echo $match->getPlayer2()->getTeamId()?>"
                                        value="<?php echo $match->getScore2(); ?>">
                                    </li> 
                                </ul>
                                <button onclick="loadDFinale(<?php echo $match->getId(); ?>)">Demie Finale !</button>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class='col-4'>
                        <strong>Demie Finale</strong>
                    </div>

                    <div class='col-4'>
                        <strong> Finale</strong>
                    </div>
                </div>
            <script>
             function loadDFinale(id){
                    console.log("On passe à la demie finale !");
                    var match = id;
                    console.log(match);
                    var score1 = $('#'+id+' .score1').val(); 
                    console.log(score1);
                    var score2 = $('#'+id+' .score2').val(); 
                    console.log(score2);

                    $.ajax({
                        url: 'index.php?c=Tournament&a=quart',
                        type: 'POST',
                        data: {
                            matchId : match,
                            score1 : score1,
                            score2 : score2
                        }
                    });
             }
            </script>
        </body>
    </html>