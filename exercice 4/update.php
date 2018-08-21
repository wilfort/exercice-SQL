<?php
    $tf="";
    $f="";
    $m="";
    $d="";
    $td="";
    $message="";
    if(isset($_POST['buttonU']))
    {
        $errors = array();
        $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $available = filter_var($_POST['available'],FILTER_SANITIZE_STRING);
        $difficulty = $_POST['difficulty'];
        $duration = filter_var($_POST['duration'],FILTER_SANITIZE_STRING);
        $distance =filter_var($_POST['distance'],FILTER_SANITIZE_NUMBER_INT);
        $height_difference =filter_var($_POST['height_difference'],FILTER_SANITIZE_NUMBER_INT);
        $id =filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);       
        if (empty($name)==true) {
            $errors['name'] =  "Cette name est invalide.";
//				$errorEmail="<span class='erreur'>Cette distance est invalide.</span>";
        }
        
        if (empty($duration)==true) {
            $errors['duration'] =  "Cette duration est invalide.";
//				$errorEmail="<span class='erreur'>Cette distance est invalide.</span>";
        }
        if (empty($distance)==true) {
            $errors['distance'] =  "Cette distance est invalide.";
//				$errorEmail="<span class='erreur'>Cette distance est invalide.</span>";
        }
        if ((false === filter_var($height_difference, FILTER_VALIDATE_INT)) OR (empty($height_difference)==true)) {
            $errors['height_difference'] =  "Cette height difference est invalide.";
//				$errorEmail="<span class='erreur'>Cette height difference est invalide.</span>";
        }
        if (count($errors)=== 0){
			$sql="UPDATE hiking SET name=:nom, difficulty=:niveau, distance=:dist, duration=:temps, height_difference=:devi, available=:avail WHERE id=$id";	
            include('./php-pdo/connect.php');
            
            
                    
            $requete->bindParam(":nom", $name);
            $requete->bindParam(":niveau", $difficulty);
            $requete->bindParam(":dist", $distance);
            $requete->bindParam(":temps", $duration);
            $requete->bindParam(":devi", $height_difference);
            $requete->bindParam(":avail", $available);
            $name = $_POST['name'];
            $difficulty = $_POST['difficulty'];
            $distance = $_POST['distance'];
            $duration = $_POST['duration'];
            $height_difference = $_POST['height_difference'];
            $available = $_POST['available'];        
            $requete->execute();
            $message="La randonnée ".$name." a été upload avec succès.";
            $requete->closeCursor();   
        }
    }   
    else{$id=$_GET['id'];}

    //echo $id;
    try
    {
        $sql="SELECT * FROM hiking WHERE id=$id";
        // On se connecte à MySQL
        include('./php-pdo/connect.php');
        
        $requete->execute();
        $donnees = $requete->fetchAll();
        $donnees =$donnees[0];
        //print_r($donnees);
        $requete->closeCursor(); 
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
    <?php 
    $php="update.php?id='".$id."'";
    include('./test.php');?>
	<a href="./index.php">Liste des données</a>
	<h1>Modifier</h1>
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