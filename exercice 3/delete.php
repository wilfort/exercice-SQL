<?php
if(isset($_POST['delete']))
{
    $id=$_POST['id'];
    $sql="DELETE FROM hiking WHERE id=:id;";
    include('./php-pdo/connect.php');
    $requete->bindParam(":id", $id);
    $requete->execute();
    $requete->closeCursor();   
}   
header("Location: index.php");