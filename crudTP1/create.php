<?php
$message=""; 
if(isset($_POST['button'])){
		try
			{
				$errors = array();
				$lastName = filter_var($_POST['lastName'],FILTER_SANITIZE_STRING);
				$firstName = filter_var($_POST['firstName'],FILTER_SANITIZE_STRING);
				$serve = $_POST['serve'];
				$birthDate = filter_var($_POST['birthDate'],FILTER_SANITIZE_STRING);
				$address = filter_var($_POST['address'],FILTER_SANITIZE_STRING);
				$phoneNumber =filter_var($_POST['phoneNumber'],FILTER_SANITIZE_NUMBER_INT);
				$zipCode =filter_var($_POST['zipCode'],FILTER_SANITIZE_NUMBER_INT);
				if (empty($lastName)==true) {
					$errors['lastName'] =  "Cette nom est invalide.";
	//				$errorEmail="<span class='erreur'>Cette distance est invalide.</span>";
				}
				if (empty($firstName)==true) {
					$errors['firstName'] =  "Cette prénom est invalide.";
	//				$errorEmail="<span class='erreur'>Cette distance est invalide.</span>";
				}

				if (empty($birthDate)==true) {
					$errors['birthDate'] =  "Cette date est invalide.";
	//				$errorEmail="<span class='erreur'>Cette distance est invalide.</span>";
				}
				if (empty($address)==true) {
					$errors['address'] =  "Cette adresse est invalide.";
	//				$errorEmail="<span class='erreur'>Cette distance est invalide.</span>";
				}
				if (empty($phoneNumber)==true) {
					$errors['phoneNumber'] =  "Cette numéro de téléphone est invalide.";
	//				$errorEmail="<span class='erreur'>Cette height difference est invalide.</span>";
				}
				if ((false === filter_var($zipCode, FILTER_VALIDATE_INT)) OR (empty($zipCode)==true)) {
					$errors['zipCode'] =  "Cette code postal est invalide.";
	//				$errorEmail="<span class='erreur'>Cette height difference est invalide.</span>";
				}
				if (count($errors)=== 0){
					// On se connecte à MySQL
					$sql="INSERT INTO utilisateur (lastName, firstName, birthDate, address, zipCode, phoneNumber, serve) VALUES (:lastName, :firstName, :birthDate, :address, :zipCode, :phoneNumber, :serve)";
					include('./php-pdo/connect.php');
    				
					$requete->bindParam(":lastName", $lastName);
					
					$requete->bindParam(":firstName", $firstName);
					
					$requete->bindParam(":birthDate", $birthDate);
					
					$requete->bindParam(":address", $address);
					
					$requete->bindParam(":zipCode", $zipCode);
					
					$requete->bindParam(":phoneNumber", $phoneNumber);
					
					$requete->bindParam(":serve", $serve);
					

					$requete->execute();
					$message="L'utilisateur a été ajoutée avec succès.";

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
			<label for="lastName">Nom : </label><input type="text" name="lastName" id="lastName">
			<label for="firstName">Prénom</label><input type="text" name="firstName" id="firstName">
		</div>
		<div>
			<label for="birthDate">date de naissance : </label><input type="date" name="birthDate" id="birthDate"><br>
		</div>
		<div>
			<label for="address">rue : </label><input type="text" name="address" id="address">
			<label for="zipCode">code Postale : </label><input type="number" name="zipCode" id="zipCode"><br>
		</div>
		<div>
			<label for="phoneNumber"> numéro de téléphone : </label><input type="tel" name="phoneNumber" id="phoneNumber"><br>
		</div>
		<div>
			<label for="serve">service : </label>
			<select name="serve" id="serve">
				<option value="1">Maintenance</option>
				<option value="2">Web Developer</option>
				<option value="3">Web Designer</option>
				<option value="4">Reférenceur</option>
			</select>
		</div>
		<div>
			<button type="submit" name="button">Envoyer</button>
		</div>
	</form>
	<br>
	<?=$message ?>
</body>
</html>