<?php
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'PRli1992');
    $requete = $bdd->prepare($sql);?>