<!DOCTYPE html>
    <html>
        <head>
            <title>Création des Teams</title>
        </head>
        <body>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>TeamName</th>
                        <th>Player1_id</th>
                        <th>Player2_id</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($teams as $team) : ?>
                    <tr>
                        <td> <?php echo $team->getTeamId(); ?></td>
                        <td> <?php echo $team->getTeamName(); ?></td>
                        <td> <?php echo $team->getplayer1Id(); ?></td>
                        <td> <?php echo $team->getplayer2Id(); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </body>
    </html>