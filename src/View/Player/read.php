<!DOCTYPE html>
<html>
<head>
<title>Liste des joueurs</title>
</head>
<body>
<table>
<thead>
<tr>
    <th>#</th>
    <th>FirstName</th>
    <th>LastName</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($players as $player) : ?>
    <tr>
    <td> <?php echo $player->getId(); ?></td>
    <td> <?php echo $player->getFirstName(); ?></td>
    <td> <?php echo $player->getLastName(); ?></td>
</tr>
<?php endforeach; ?>
   </tbody>
   </table>
   </body>
</html>