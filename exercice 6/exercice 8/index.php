<?php
$message="";
if(isset($_POST['envoie'])){
    try{
        print_r($_POST);
        
        $sql="DELETE FROM bookings WHERE id BETWEEN 24 AND 25";
        include('./php-pdo/connect.php');
        $requete->execute();
        $message="Les réservations ont étées supprimer avec succès";
        $requete->closeCursor();
    }
    catch(Exception $e)
			{
				// En cas d'erreur, on affiche un message et on arrête tout
					die('Erreur : '.$e->getMessage());
			}
}
try{
    $check=array();
    $numbC=array();
    $sql="SELECT * FROM bookings WHERE id BETWEEN 24 AND 25";
    include('./php-pdo/connect.php');
    $requete->execute();
    $donnees = $requete->fetchAll();
    $requete->closeCursor();
}
catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<form action="#" method="post">
<?php
    foreach ($donnees as $key => $value) {?>

        <label for="id<?=$key?>">Numéro réservation : </label>
        <input type="number" name="id<?=$key?>" id="id<?=$key?>" value=<?=$value["id"]?>>
        <br>
        <label for="clientId<?=$key?>">Numéro client : </label>
        <input type="number" name="clientId<?=$key?>" id="clientId<?=$key?>" value=<?=$value["clientId"]?>>
    <hr>
    <?php   
    }
    ?><button type="submit" name="envoie" >delete</button>
    </form>
    <br><br><?=$message?>
</body>
</html>
