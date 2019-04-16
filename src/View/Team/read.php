<!DOCTYPE html>
<html>
<head>
<title>Liste des Teams</title>
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
    <td> <?php echo $team->getId(); ?></td>
    <td> <?php echo $team->getTeamName(); ?></td>
    <td> <?php echo $team->getPlayer1(); ?></td>
    <td> <?php echo $team->getPlayer2(); ?></td>
</tr>
<?php endforeach; ?>
   </tbody>
   </table>
   </body>
</html>