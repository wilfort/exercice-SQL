<?php
    $bdd = new PDO('mysql:host=localhost;dbname=crudTP2;charset=utf8', 'root', 'PRli1992');
    $requete = $bdd->prepare($sql);?>