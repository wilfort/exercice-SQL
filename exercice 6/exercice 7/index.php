<?php
$message="";
if(isset($_POST['envoie'])){
    try{
        print_r($_POST);
        
        $sql="DELETE FROM clients WHERE id BETWEEN 24 AND 25";
        include('./php-pdo/connect.php');
        $requete->execute();
        $message="Le client a été supprimer avec succès";
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
    $sql="SELECT * FROM clients WHERE id BETWEEN 24 AND 25";
    include('./php-pdo/connect.php');
    $requete->execute();
    $donnees = $requete->fetchAll();
    $requete->closeCursor();
    for($val=0;$val<=1;$val++)
    { 
        if($donnees[$val]["card"]==1){$check[$val]="checked";$numbC[$val]=$donnees["cardNumber"];}
        else{$check[$val]="";$numbC[$val]="";}
    }
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

        <input class="invisible" type="number" name="id<?=$key?>" id="id<?=$key?>" value=<?=$value["id"]?>>
        <label for="nom<?=$key?>">nom : </label>
        <input type="text" name="nom<?=$key?>" id="nom<?=$key?>" value=<?=$value["lastName"]?>>
        <br>
        <label for="prenom<?=$key?>">prénom : </label>
        <input type="text" name="prenom<?=$key?>" id="prenom<?=$key?>" value=<?=$value["firstName"]?>>
        <br>
        <label for="birthDate<?=$key?>">date de naissance : </label>
        <input type="date" name="birthDate<?=$key?>" id="birthDate<?=$key?>" value=<?=$value["birthDate"]?>>
        <br>
        <label for="card<?=$key?>">carte de fidélité : </label>
        <input type="checkbox" name="card<?=$key?>" id="card<?=$key?>" value="1" <?=$check[$key]?>>
        <br>
        <label for="cardNulber<?=$key?>">numéro de carte de fidélité : </label>
        <input type="number" name="cardNulber<?=$key?>" id="cardNulber<?=$key?>" value=<?=$numbC[$key]?>><br>
        
    <hr>
    <?php   
    }
    ?><button type="submit" name="envoie" >delete</button>
    </form>
    <br><br><?=$message?>
</body>
</html>
