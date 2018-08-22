<?php
$sql="SELECT * FROM clients";

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
    <?php
    foreach ($exercice1 as $key => $value) {?>
    <tr>

        Nom : <?=$value['lastName']?><br>
        Prénom : <?=$value['firstName']?><br>
        Date de naissance : <?=$value['birthDate']?><br>
        Carte de fidélité : <?php if($value['card']){echo "Oui<br>Numéro de carte : ".$value['cardNumber']."<br>";}else{echo "Non<br>";}?><br>
    </tr>
<?php
    }
    ?>
    </table>
</body>
</html>