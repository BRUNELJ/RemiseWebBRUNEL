<?php
require __DIR__ . '/functions.php';

if(isset($_POST['name']) && isset($_POST['strength']) && isset($_POST['life']) && isset($_POST['type'])) {
	//Récupération des données grâce à la variable globale $_POST et appel de la fonction addMonster
	addMonster($_POST['name'],$_POST['strength'],$_POST['life'],$_POST['type']);
	//Redirection directe vers index.php
	header('Location: index.php');
} else {
	header('Location: /index.php?error=missing_data');
    die;
}
?>