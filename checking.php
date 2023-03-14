<?php
include_once('includes/all.php');
session_destroy();
//header('location: index.php');

echo 'This is the champion: '. $_POST['champion'] .'// This is the support1: '. $_POST['support1'] .'// This is the support2: '. $_POST['support2'];
?>