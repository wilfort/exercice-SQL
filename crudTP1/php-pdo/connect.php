<?php
    $bdd = new PDO('mysql:host=localhost;dbname=crudTP1;charset=utf8', 'root', 'PRli1992');
    $requete = $bdd->prepare($sql);?>