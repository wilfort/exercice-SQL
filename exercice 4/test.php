<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)

session_start ();

//print_r($log);
// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
	$sql="SELECT nom, prenom FROM Users Where user = :user AND pwd = :pwd";
include('./php-pdo/connect.php');
$requete->bindParam(":user", $_SESSION['login']);
$pwd=sha1($_SESSION['pwd']);
$requete->bindParam(":pwd", $pwd);
$requete->execute();
$log = $requete->fetchAll();
$log=$log[0];?>
	<form action="./logout.php" method="post">
		Bienvenue <?=$log['nom']?> <?=$log['prenom']?>
		<input class="invisible" type="text" name="php" value=<?=$php?>>
		<button type="submit">Déconnection</button>
	</form>

<?php }
else {?>
	<form action="./login.php" method="post">
	<input class="invisible" type="text" name="php" value=<?=$php?>>
		<button type="submit">connection</button>
	</form>
<?php }

