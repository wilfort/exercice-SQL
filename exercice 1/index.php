<?php
if(isset($_POST['delete'])){
  try
  {
      // On se connecte à MySQL
      $bdd = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', 'PRli1992');
      
      
  }
  catch(Exception $e)
  {
      // En cas d'erreur, on affiche un message et on arrête tout
          die('Erreur : '.$e->getMessage());
  } 
  //print_r($_POST);
  foreach ($_POST as  $value) {
    if ($value != "delete"){
      $bdd->exec("DELETE FROM meteo WHERE ville='".$value."'");
      }
  }
  //$bdd->closeCursor();
  //$bdd->exec("INSERT INTO meteo VALUES ('".$_POST['ville']."', ".$_POST['haut'].", ".$_POST['bas'].")");
}
if(isset($_POST['envoie'])){
  try
  {
      // On se connecte à MySQL
      $bdd = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', 'PRli1992');
      $bdd->exec("INSERT INTO meteo VALUES ('".$_POST['ville']."', ".$_POST['haut'].", ".$_POST['bas'].")");
      
  }
  catch(Exception $e)
  {
      // En cas d'erreur, on affiche un message et on arrête tout
          die('Erreur : '.$e->getMessage());
  } 
  //$bdd->closeCursor();
}
try
{
	// On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', 'PRli1992');
    $resultat = $bdd->query('SELECT * FROM meteo');
    
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
</head>
<body>
<br>
    <form action="" method="post">
    <?php while ($donnees = $resultat->fetch())
      {
        //  echo $donnees;
        echo "<input type='checkbox' name='".$donnees['ville']."' value='".$donnees['ville']."'/> nom de ville : ".$donnees['ville'].". sa temperature max : ".$donnees['haut']."°C. sa temperature min : ".$donnees['bas']."°C.<br>" ;
      }?><br>
      <button type="submit" name="delete">delete</button>
    </form>
    <?php $resultat->closeCursor();?><br><br><br>
    <form action="#" method="post">
        <label for="ville">nom de la ville </label>
        <input type="text" name="ville" id="ville"><br>
        <label for="haut">la tempèrature haute</label>
        <input type="number" name="haut" id="haut"><br>
        <label for="bas">la tempèrature basse</label>
        <input type="number" name="bas" id="bas"><br><br>
        <button type="submit" name="envoie">envoie</button>
    </form>
</body>
</html>