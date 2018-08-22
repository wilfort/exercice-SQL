<?php
$message="";
if(isset($_POST['envoie'])){
    try{
        if (empty($_POST['card'])==false){

            $sql="INSERT INTO clients (lastName, firstName,birthDate,card,cardNumber ) VALUES (:nom,:prenom,:naissance,:card,:cardN)";
            include('./php-pdo/connect.php');
            $requete->bindParam(":card", $_POST['card']);
            $requete->bindParam(":cardN", $_POST['cardNulber']);
        }else{

            $sql="INSERT INTO clients (lastName, firstName,birthDate,card ) VALUES (:nom,:prenom,:naissance,:card)";
            include('./php-pdo/connect.php');
            $val=0;
            $requete->bindParam(":card", $val);
        }
        $requete->bindParam(":nom", $_POST['nom']);
        $requete->bindParam(":prenom", $_POST['prenom']);
        $requete->bindParam(":naissance", $_POST['birthDate']);
        

        $requete->execute();
        $message="Le client a été ajoutée avec succès";
    }
    catch(Exception $e)
			{
				// En cas d'erreur, on affiche un message et on arrête tout
					die('Erreur : '.$e->getMessage());
			}
}
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
    <form action="#" method="post">
        <label for="nom">nom : </label>
        <input type="text" name="nom" id="nom">
        <br>
        <label for="prenom">prénom : </label>
        <input type="text" name="prenom" id="prenom">
        <br>
        <label for="birthDate">date de naissance : </label>
        <input type="date" name="birthDate" id="birthDate">
        <br>
        <label for="card">carte de fidélité : </label>
        <input type="checkbox" name="card" id="card" value="1">
        <br>
        <label for="cardNulber">numéro de carte de fidélité : </label>
        <input type="number" name="cardNulber" id="cardNulber">
        <br>
        <button type="submit" name="envoie" >envoie</button>
    </form>

    <br><br><?=$message?>
</body>
</html>