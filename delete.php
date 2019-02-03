<?php
require __DIR__ . '/functions.php';

if(isset($_POST['name'])) {
	deleteMonster($_POST['name']);
} else {
	header('Location: /index.php?error=missing_data');
	die;
}

header('Location: index.php');
die
?>