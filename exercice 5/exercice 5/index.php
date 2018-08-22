<?php
$sql="SELECT lastName,firstName FROM clients where lastName like 'M%' order by lastName asc";

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

        
        Nom : <?=$value['lastName']?><br>
        Prénom : <?=$value['firstName']?><br><br>

<?php
    }
    ?>
</body>
</html>