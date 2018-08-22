<?php
$message="";
if(isset($_POST['envoie'])){
    try{
        $sql="INSERT INTO shows (title,performer,date,showTypesId,firstGenresId,secondGenreId,duration,startTime) VALUES (:title,:performer,:date,:showTypesId,:firstGenresId,:secondGenresId,:duration,:startTime)";
        include('./php-pdo/connect.php');  
        $requete->bindParam(":title", $_POST['title']);
        $requete->bindParam(":performer", $_POST['performer']);
        $requete->bindParam(":date", $_POST['date']);
        $requete->bindParam(":showTypesId", $_POST['showTypesId']);
        $requete->bindParam(":firstGenresId", $_POST['firstGenresId']);
        $requete->bindParam(":secondGenresId", $_POST['secondGenresId']);
        $requete->bindParam(":duration", $_POST['duration']);
        $requete->bindParam(":startTime", $_POST['startTime']);

        $requete->execute();
        $message="Le shows a été ajoutée avec succès";
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
        <label for="title">titre : </label>
        <input type="text" name="title" id="title">
        <br>
        <label for="performer">artiste : </label>
        <input type="text" name="performer" id="performer">
        <br>
        <label for="date">date : </label>
        <input type="date" name="date" id="date">
        <br>
        <label for="showTypesId">type de spectacle</label>
			<select name="showTypesId">
				<option value="1">Concert</option>
				<option value="2">Théâtre</option>
				<option value="3">Humour</option>
				<option value="4">Danse</option>
			</select>
        <br>
        <label for="firstGenresId">1er genre</label>
			<select name="firstGenresId">
				<option value="1">Variété et chanson française</option>
				<option value="2">Variété internationale</option>
				<option value="3">Pop/Rock</option>
				<option value="4">Musique électronique</option>
                <option value="5">Folk</option>
				<option value="6">Rap</option>
                <option value="7">Hip Hop</option>
				<option value="8">Slam</option>
                <option value="9">Reggae</option>
				<option value="10">Clubbing</option>
                <option value="11">RnB</option>
				<option value="12">Soul</option>
				<option value="13">Funk</option>
				<option value="14">Jazz</option>
                <option value="15">Blues</option>
				<option value="16">Country</option>
                <option value="17">Gospel</option>
				<option value="18">Musique du monde</option>
                <option value="19">Classiquz</option>
				<option value="20">Opéra</option>
                <option value="21">Autres</option>
				<option value="22">Drame</option>
				<option value="23">Comédie</option>
				<option value="24">Comtemporain</option>
                <option value="25">Monologue</option>
			</select>
        <br>
        <label for="secondGenresId">2ème genre</label>
			<select name="secondGenresId">
                <option value="1">Variété et chanson française</option>
				<option value="2">Variété internationale</option>
				<option value="3">Pop/Rock</option>
				<option value="4">Musique électronique</option>
                <option value="5">Folk</option>
				<option value="6">Rap</option>
                <option value="7">Hip Hop</option>
				<option value="8">Slam</option>
                <option value="9">Reggae</option>
				<option value="10">Clubbing</option>
                <option value="11">RnB</option>
				<option value="12">Soul</option>
				<option value="13">Funk</option>
				<option value="14">Jazz</option>
                <option value="15">Blues</option>
				<option value="16">Country</option>
                <option value="17">Gospel</option>
				<option value="18">Musique du monde</option>
                <option value="19">Classiquz</option>
				<option value="20">Opéra</option>
                <option value="21">Autres</option>
				<option value="22">Drame</option>
				<option value="23">Comédie</option>
				<option value="24">Comtemporain</option>
                <option value="25">Monologue</option>
			</select>
        <br>
        <label for="duration">duration</label>
        <input type="time" name="duration" id="duration"><br>
        <label for="startTime">heure de début</label>
        <input type="time" name="startTime" id="startTime"><br>
        <button type="submit" name="envoie" >envoie</button>
    </form>

    <br><br><?=$message?>
</body>
</html>