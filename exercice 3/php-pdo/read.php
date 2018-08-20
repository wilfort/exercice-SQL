<?php

try
  {
    // On se connecte à MySQL
      // include('./php-pdo/connect.php');
      $sql="SELECT * FROM hiking";
      include('./php-pdo/connect.php');
      
      $requete->execute();
      $donnees = $requete->fetchAll();
      
  }
catch(Exception $e)
  {
    // En cas d'erreur, on affiche un message et on arrête tout
          die('Erreur : '.$e->getMessage());
  } 

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="./css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table>
    <tr>
      <th>Nom du parcoure</th>
      <th>difficulté</th>
      <th>distance</th>
      <th>durée</th>
      <th>dénivelé</th>
      <th>dénivelé</th>
      <th>upload</th>
      <th>delete</th>
   </tr>
    <?php 
foreach ($donnees as $key => $value) {

        echo "<tr><td>".$value['name']."</td>
        <td>".$value['difficulty']."</td>
        <td>".$value['distance']." km</td>
        <td>".$value['duration']."</td>
        <td>".$value['height_difference']." m</td>
        <td>".$value['available']."</td>
        <td><a href=\"./update.php?id='".$value['id']."'\">upload</a></td>
        <td><form action='./delete.php' method='post'><input class=\"invisible\" type='number' name='id' value='".$value['id']."'><button type='submit' name='delete'>delete</button></form></td>
        </tr>" ;
      }?>
      <?php $requete->closeCursor(); ?>
    </table>
    <a href="./create.php">Crée une donnée</a>
  </body>
</html>