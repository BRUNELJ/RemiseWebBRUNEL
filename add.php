<?php
require __DIR__ . '/functions.php';

//Récupération des données grâce à la variable globale $_POST et appel de la fonction addMonster
addMonster($_POST['name'],$_POST['strength'],$_POST['life'],$_POST['type']);
//Redirection directe vers index.php
header('Location: index.php');
?>