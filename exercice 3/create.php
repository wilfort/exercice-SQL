<?php
$message=""; 
if(isset($_POST['button'])){
		try
			{
				// On se connecte à MySQL
				$bdd = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8', 'root', 'PRli1992');

				$stmt = $bdd->prepare("INSERT INTO hiking (name, difficulty, distance, duration, height_difference, available) VALUES (:nom,:niveau,:dist,:temps,:devi,:avail)");
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
				$available = $_POST['available'];

				$stmt->execute();
				$message="La randonnée a été ajoutée avec succès.";
				$stmt->closeCursor();
				
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
	<a href="./php-pdo/read.php">Liste des données</a>
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