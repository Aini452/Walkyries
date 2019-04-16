<!DOCTYPE html>
    <html>
        <head>
            <title>Création du Tournoi</title>
        </head>
        <body>
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