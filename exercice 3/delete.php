<?php
if(isset($_POST['delete']))
{
    $id=$_POST['id'];
    $bdd = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8', 'root', 'PRli1992');

    $stmt = $bdd->prepare("DELETE FROM hiking WHERE id=:id;");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $stmt->closeCursor();   
}   
header("Location: php-pdo/read.php");