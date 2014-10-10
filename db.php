<?php

$host='localhost'; // le chemin vers le serveur
$db_name='txt'; // le nom de votre base de données
$user='root'; // nom d'utilisateur pour se connecter
$password='root'; // mot de passe de l'utilisateur pour se connecter

try
{
	$bdd = new PDO('mysql:host='.$host.';dbname='.$db_name, $user, $password);
}
 
catch(Exception $e)
{
	echo 'Erreur : '.$e->getMessage().'<br />';
	echo 'N° : '.$e->getCode();
	die();
}

?>