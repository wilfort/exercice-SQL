<?php
    $tf="";
    $f="";
    $m="";
    $d="";
    $td="";
    $message="";
    if(isset($_POST['buttonU']))
    {
        $id=$_POST['id'];
        $bdd = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8', 'root', 'PRli1992');
    
        $stmt = $bdd->prepare("UPDATE hiking SET name=:nom, difficulty=:niveau, distance=:dist, duration=:temps, height_difference=:devi, available=:avail WHERE id=$id");
                
        $stmt->bindParam(":nom", $name);
        $stmt->bindParam(":niveau", $difficulty);
        $stmt->bindParam(":dist", $distance);
        $stmt->bindParam(":temps", $duration);
        $stmt->bindParam(":devi", $height_difference);
        $stmt->bindParam(":avail", $available);
        $name = $_POST['name'];
        $difficulty = $_POST['difficulty'];
        $distance = $_POST['distance'];
        $duration = $_POST['duration'];
        $height_difference = $_POST['height_difference'];
        $available = $_POST['available'];        
        $stmt->execute();
        $message="La randonnée ".$name." a été upload avec succès.";
        $stmt->closeCursor();   
    }   
    else{$id=$_GET['id'];}

    //echo $id;
    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8', 'root', 'PRli1992');
        $resultat = $bdd->prepare("SELECT * FROM hiking WHERE id=$id");
        $resultat->execute();
        $donnees = $resultat->fetchAll();
        $donnees =$donnees[0];
        //print_r($donnees);
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    } 
    switch ($donnees['difficulty']) {
        case 'Très facile':
            $tf="selected";
            $f="";
            $m="";
            $d="";
            $td="";     
            break;
        case 'facile':
        $tf="";
        $f="selected";
        $m="";
        $d="";
        $td=""; 
            break;
        case 'moyen':
        $tf="";
        $f="";
        $m="selected";
        $d="";
        $td=""; 
            break;
        case 'difficile':
            $tf="";
            $f="";
            $m="";
            $d="selected";
            $td=""; 
            break;
        case 'Très difficile':
            $tf="";
            $f="";
            $m="";
            $d="";
            $td="selected"; 
            break;
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier une randonnée</title>
	<link rel="stylesheet" href="./css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="./php-pdo/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="#" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?=$donnees['name']?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile" <?=$tf;?>>Très facile</option>
				<option value="facile" <?=$f;?>>Facile</option>
				<option value="moyen" <?=$m;?>>Moyen</option>
				<option value="difficile" <?=$d;?>>Difficile</option>
				<option value="très difficile" <?=$td;?>>Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?=$donnees['distance']?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?=$donnees['duration']?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?=$donnees['height_difference']?>">
        </div>
        <div>
			<label for="name">available</label>
			<input type="text" name="available" value="<?=$donnees['available']?>">
		</div>
        <input class="invisible" type="number" name="id" value="<?=$donnees['id']?>">
		<button type="submit" name="buttonU">Envoyer</button>
    </form>
    <br>
    <br><br><br>
    <?=$message?>
</body>
</html>