<?php
$message=""; 
if(isset($_POST['button'])){
		try
			{
				$errors = array();
				$name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
				$available = filter_var($_POST['available'],FILTER_SANITIZE_STRING);
				$difficulty = $_POST['difficulty'];
				$duration = filter_var($_POST['duration'],FILTER_SANITIZE_STRING);
				$distance =filter_var($_POST['distance'],FILTER_SANITIZE_NUMBER_INT);
				$height_difference =filter_var($_POST['height_difference'],FILTER_SANITIZE_NUMBER_INT);
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
					// On se connecte à MySQL
					$sql="INSERT INTO hiking (name, difficulty, distance, duration, height_difference, available) VALUES (:nom,:niveau,:dist,:temps,:devi,:avail)";
					include('./php-pdo/connect.php');
    				
					$requete->bindParam(":nom", $name);
					$requete->bindParam(":niveau", $difficulty);
					$requete->bindParam(":dist", $distance);
					$requete->bindParam(":temps", $duration);
					$requete->bindParam(":devi", $height_difference);
					$requete->bindParam(":avail", $available);				
					$requete->execute();
					$message="La randonnée a été ajoutée avec succès.";
					$requete->closeCursor();
				}
			}
		catch(Exception $e)
			{
				// En cas d'erreur, on affiche un message et on arrête tout
					die('Erreur : '.$e->getMessage());
			} 
			
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="./index.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="#" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value=""> KM
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="0:00:00">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value=""> m
		</div>
		<div>
			<label for="available">available</label>
			<input type="text" name="available" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
	<br>
	<?=$message ?>
</body>
</html>