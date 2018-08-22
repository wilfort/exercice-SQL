<?php
$sql="SELECT * FROM clients limit 20";

include('./php-pdo/connect.php');

$requete->execute();
$exercice1 = $requete->fetchAll();
// print_r($exercice1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
    <tr>
        <th>id</th>
        <th>lastName</th>
        <th>firstName</th>
        <th>birthDate</th>
        <th>card</th>
        <th>cardNumber</th>
    </tr>
    <?php
    foreach ($exercice1 as $key => $value) {?>
    <tr>
        <td><?=$value['id']?></td>
        <td><?=$value['lastName']?></td>
        <td><?=$value['firstName']?></td>
        <td><?=$value['birthDate']?></td>
        <td><?=$value['card']?></td>
        <td><?=$value['cardNumber']?></td>
    </tr>
<?php
    }
    ?>
    </table>
</body>
</html>