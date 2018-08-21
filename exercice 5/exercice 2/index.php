<?php
$sql="SELECT type FROM showTypes";

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
        <th>type</th>
        
    </tr>
    <?php
    foreach ($exercice1 as $key => $value) {?>
    <tr>
        <td><?=$value['type']?></td>
    </tr>
<?php
    }
    ?>
    </table>
</body>
</html>