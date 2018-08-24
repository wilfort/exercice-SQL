<?php
if(isset($_POST['delete'])){
    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=crudTP1;charset=utf8', 'root', 'PRli1992');
        
        
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    } 
    foreach ($_POST as  $value) {
      if ($value != "delete"){
        $bdd->exec("DELETE FROM utilisateur WHERE id='".$value."'");
        }
    }

  }
  try{
$date= date("Y-m-d");
$service1=array();
$service2=array();
$service3=array();
$service4=array();
$age=array();

    // $check=array();
    // $numbC=array();
     $sql="SELECT * FROM utilisateur";
     include('./php-pdo/connect.php');
     $requete->execute();
     $donnees = $requete->fetchAll();
     $requete->closeCursor();
     foreach ($donnees as $key => $value) {
         switch ($value['serve']) {
            case 1:
                    $service1[$key]="selected";
                    $service2[$key]="";
                    $service3[$key]="";
                    $service4[$key]="";
                break;
            case 2:
                    $service1[$key]="";
                    $service2[$key]="selected";
                    $service3[$key]="";
                    $service4[$key]="";
                break;
            case 3:
                    $service1[$key]="";
                    $service2[$key]="";
                    $service3[$key]="selected";
                    $service4[$key]="";
                break;
            case 4:
                    $service1[$key]="";
                    $service2[$key]="";
                    $service3[$key]="";
                    $service4[$key]="selected";
                break;
         }
         $age[$key]=$date-$value['birthDate'];
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
    <table>
        <tr>
            <th>selection delete</th><th>information utilisateur</th>
        </tr>
        <?php
    foreach ($donnees as $key => $value) {?>
        <tr>
            <td><input type="checkbox" name="id<?=$key?>" id="id<?=$key?>" value="<?=$value['id']?>"></td>
            <td>
                <label for="">Nom : </label><input type="text" name="" id="" value="<?=$value['lastName']?>">
                <label for="">Prénom</label><input type="text" name="" id="" value="<?=$value['firstName']?>"><br>
                <label for="">Age : </label><input type="number" name="" id="" value="<?=$age[$key]?>"><br>
                <label for="">rue : </label><input type="text" name="" id="" value="<?=$value['address']?>">
                <label for="">code Postale : </label><input type="number" name="" id="" value="<?=$value['zipCode']?>"><br>
                <label for=""> numéro de téléphone : </label><input type="tel" name="" id="" value="<?=$value['phoneNumber']?>"><br>
                <label for="">service : </label><select name="" >
                    <option value="Maintenance" <?=$service1[$key]?>>Maintenance</option>
                    <option value="Web Developer" <?=$service2[$key]?>>Web Developer</option>
                    <option value="Web Designer" <?=$service3[$key]?>>Web Designer</option>
                    <option value="Reférenceur" <?=$service4[$key]?>>Reférenceur</option>
                </select>
            </td>
        </tr>
        <?php   
    }
    ?>
    </table>
    <br>
    <button type="submit" name="delete" >delete</button>
    </form>
    <a href="create.php">ajout nouveau utilisateur</a>
</body>
</html>
