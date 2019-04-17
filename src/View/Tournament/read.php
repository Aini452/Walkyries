<!DOCTYPE html>
    <html>
        <head>
            <title>Création du Tournoi</title>
        </head>
    <body>

        <?php require_once'menu.php'?>
            <div class="container">
                <div><strong>Quart de finale</strong></div>
                    <?php foreach ($tournament as $match) : ?>
                    <ul class="list-group" style="width : 250px; margin : 50px;">      
                        <li class="list-group-item d-flex justify-content-between align-items-center"><?php echo $match->getPlayer1(); ?>
                            <input type="score" placeholder="score" style="width : 50px;"><?php echo $match->getScore1(); ?>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center"><?php echo $match->getPlayer2(); ?>
                        <input type="score" placeholder="score" style="width : 50px;"><?php echo $match->getScore2(); ?>
                        </li> 
                    </ul>
                <?php endforeach; ?>
            </div>


            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Player 1</th>
                        <th>Score 1</th>
                        <th>Player 2</th>
                        <th>Score 2</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tournament as $match) : ?>
                    <tr>
                        <td> <?php echo $match->getId(); ?></td>
                        <td> <?php echo $match->getPlayer1(); ?></td>
                        <td> <?php echo $match->getScore1(); ?></td>
                        <td> <?php echo $match->getPlayer2(); ?></td>
                        <td> <?php echo $match->getScore2(); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </body>
    </html>