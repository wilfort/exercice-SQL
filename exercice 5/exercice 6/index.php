<?php
$sql="SELECT title, performer, date, startTime FROM shows order by title asc";

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
    <?php
    foreach ($exercice1 as $key => $value) {?>
        <?=$value['title']?> par <?=$value['performer']?>, le <?=$value['date']?> à <?=$value['startTime']?>.<br>
<?php
    }
    ?>
    </table>
</body>
</html>