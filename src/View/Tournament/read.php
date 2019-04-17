<!DOCTYPE html>
    <html>
        <head>
            <title>Création du Tournoi</title>
            <script src="http://code.jquery.com/jquery-1.9.0rc1.js"></script>
        </head>
    <body>

        <?php require_once'menu.php'?>
            <div class="container">
                <div><strong>Quart de finale</strong></div>
                <?php $i=1; ?>
                    <?php foreach ($tournament as $match) : ?>
                    <ul class="list-group" style="width : 250px; margin : 50px;">      
                        <li class="list-group-item d-flex justify-content-between align-items-center"><?php echo $match->getPlayer1()->getTeamName(); ?>
                            <input id="<?php echo $i++; ?>" type="score" placeholder="score" style="width : 50px;" name="<?php echo $match->getPlayer2()->getTeamId()?>">
                            <?php echo $match->getScore1(); ?>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center"><?php echo $match->getPlayer2()->getTeamName(); ?>
                        <input id="<?php echo $i++; ?>"  type="score" placeholder="score" style="width : 50px;" name="<?php echo $match->getPlayer2()->getTeamId()?>">
                        <?php echo $match->getScore2(); ?>
                        </li> 
                    </ul>
                <?php endforeach; ?>
            </div>
            <button type="button" onclick="loadDFinale()">Passer à la prochaine phase</button>

            <script>
             function loadDFinale(){
                    console.log("On passe à la demie finale !");
                    console.log($('#1').val());
                    console.log($('#1').attr("name"));
                    var team1 = $('#1').attr("name"); 
                    var score1 = $('#1').val();

                    $.ajax({
                        url: 'index.php?c=Tournament&a=quart',
                        type: 'POST',
                        data: {
                            team1 : team1,
                            score1 : score1
                        }
                    });
             }
            </script>
        </body>
    </html>