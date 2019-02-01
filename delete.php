<?php
require __DIR__ . '/functions.php';

deleteMonster($_POST['name']);
header('Location: index.php');

?>