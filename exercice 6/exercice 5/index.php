<?php
$message="";
if(isset($_POST['envoie'])){
    try{
        $id=$_POST['id'];
        $sql="UPDATE shows set title=:title,performer=:performer,date=:date,showTypesId=:showTypesId,firstGenresId=:firstGenresId,secondGenreId=:secondGenresId,duration=:duration,startTime=:startTime where id=$id";
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
        $message="Le shows a été modifié avec succès";
        $requete->closeCursor();
    }
    catch(Exception $e)
			{
				// En cas d'erreur, on affiche un message et on arrête tout
					die('Erreur : '.$e->getMessage());
			}
}
try{
    $showTypesId = array("1"=>"","","","");
    $firstGenresId = array("1"=>"","","","","","","","","","","","","","","","","","","","","","","","","");
    $secondGenreId = array("1"=>"","","","","","","","","","","","","","","","","","","","","","","","","");
    $sql="SELECT * FROM shows where title='Vestibulum accumsan'";
    include('./php-pdo/connect.php');
    $requete->execute();
    $donnees = $requete->fetchAll();
    
    $donnees =$donnees[0];
    $title="'".$donnees['title']."'";

    $requete->closeCursor();
    foreach ($showTypesId as $key => $value) {
                    if ($key==$donnees['showTypesId'])
                    {$showTypesId[$key]="selected";
                        }
                    else
                    {$showTypesId[$key]="";}
                    ;
                }
                
    foreach ($firstGenresId as $key => $value) {
                    if ($key==$donnees['firstGenresId'])
                    {$firstGenresId[$key]="selected";
                        }
                    else
                    {$firstGenresId[$key]="";}
                    
                }
    foreach ($secondGenreId as $key => $value) {
                    if ($key==$donnees['secondGenreId'])
                    {$secondGenreId[$key]="selected";
                       
                    }
                    else
                    {$secondGenreId[$key]="";}
                    
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
    <input class="invisible" type="number" name="id" value=<?=$donnees['id']?>>
        <label for="title">titre : </label>
        <input type="text" name="title" id="title" value=<?php echo $title;?>>
        <br>
        <label for="performer">artiste : </label>
        <input type="text" name="performer" id="performer" value=<?=$donnees['performer']?>>
        <br>
        <label for="date">date : </label>
        <input type="date" name="date" id="date" value=<?=$donnees['date']?>>
        <br>
        <label for="showTypesId">type de spectacle</label>
			<select name="showTypesId">
				<option value="1" <?=$showTypesId['1']?>>Concert</option>
				<option value="2" <?=$showTypesId['2']?>>Théâtre</option>
				<option value="3" <?=$showTypesId['3']?>>Humour</option>
				<option value="4" <?=$showTypesId['4']?> >Danse</option>
			</select>
        <br>
        <label for="firstGenresId">1er genre</label>
			<select name="firstGenresId">
				<option value="1" <?=$firstGenresId['1']?>>Variété et chanson française</option>
				<option value="2" <?=$firstGenresId['2']?>>Variété internationale</option>
				<option value="3" <?=$firstGenresId['3']?>>Pop/Rock</option>
				<option value="4" <?=$firstGenresId['4']?>>Musique électronique</option>
                <option value="5" <?=$firstGenresId['5']?>>Folk</option>
				<option value="6" <?=$firstGenresId['6']?>>Rap</option>
                <option value="7" <?=$firstGenresId['7']?>>Hip Hop</option>
				<option value="8" <?=$firstGenresId['8']?>>Slam</option>
                <option value="9" <?=$firstGenresId['9']?>>Reggae</option>
				<option value="10" <?=$firstGenresId['10']?>>Clubbing</option>
                <option value="11" <?=$firstGenresId['11']?>>RnB</option>
				<option value="12" <?=$firstGenresId['12']?>>Soul</option>
				<option value="13" <?=$firstGenresId['13']?>>Funk</option>
				<option value="14" <?=$firstGenresId['14']?>>Jazz</option>
                <option value="15" <?=$firstGenresId['15']?>>Blues</option>
				<option value="16" <?=$firstGenresId['16']?>>Country</option>
                <option value="17" <?=$firstGenresId['17']?>>Gospel</option>
				<option value="18" <?=$firstGenresId['18']?>>Musique du monde</option>
                <option value="19" <?=$firstGenresId['19']?>>Classiquz</option>
				<option value="20" <?=$firstGenresId['20']?>>Opéra</option>
                <option value="21" <?=$firstGenresId['21']?>>Autres</option>
				<option value="22" <?=$firstGenresId['22']?>>Drame</option>
				<option value="23" <?=$firstGenresId['23']?>>Comédie</option>
				<option value="24" <?=$firstGenresId['24']?>>Comtemporain</option>
                <option value="25" <?=$firstGenresId['25']?>>Monologue</option>
			</select>
        <br>
        <label for="secondGenresId">2ème genre</label>
			<select name="secondGenresId">
                <option value="1" <?=$secondGenreId['1']?>>Variété et chanson française</option>
				<option value="2" <?=$secondGenreId['2']?>>Variété internationale</option>
				<option value="3" <?=$secondGenreId['3']?>>Pop/Rock</option>
				<option value="4" <?=$secondGenreId['4']?>>Musique électronique</option>
                <option value="5" <?=$secondGenreId['5']?>>Folk</option>
				<option value="6" <?=$secondGenreId['6']?>>Rap</option>
                <option value="7" <?=$secondGenreId['7']?>>Hip Hop</option>
				<option value="8" <?=$secondGenreId['8']?>>Slam</option>
                <option value="9" <?=$secondGenreId['9']?>>Reggae</option>
				<option value="10" <?=$secondGenreId['10']?>>Clubbing</option>
                <option value="11" <?=$secondGenreId['11']?>>RnB</option>
				<option value="12" <?=$secondGenreId['12']?>>Soul</option>
				<option value="13" <?=$secondGenreId['13']?>>Funk</option>
				<option value="14" <?=$secondGenreId['14']?>>Jazz</option>
                <option value="15" <?=$secondGenreId['15']?>>Blues</option>
				<option value="16" <?=$secondGenreId['16']?>>Country</option>
                <option value="17" <?=$secondGenreId['17']?>>Gospel</option>
				<option value="18" <?=$secondGenreId['18']?>>Musique du monde</option>
                <option value="19" <?=$secondGenreId['19']?>>Classiquz</option>
				<option value="20" <?=$secondGenreId['20']?>>Opéra</option>
                <option value="21" <?=$secondGenreId['21']?>>Autres</option>
				<option value="22" <?=$secondGenreId['22']?>>Drame</option>
				<option value="23" <?=$secondGenreId['23']?>>Comédie</option>
				<option value="24" <?=$secondGenreId['24']?>>Comtemporain</option>
                <option value="25" <?=$secondGenreId['25']?>>Monologue</option>
			</select>
        <br>
        <label for="duration">duration</label>
        <input type="time" name="duration" id="duration" value=<?=$donnees['duration']?>><br>
        <label for="startTime">heure de début</label>
        <input type="time" name="startTime" id="startTime" value=<?=$donnees['startTime']?>><br>
        <button type="submit" name="envoie" >envoie</button>
    </form>

    <br><br><?=$message?>
</body>
</html>