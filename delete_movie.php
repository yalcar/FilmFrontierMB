<?php

/*******w******** 
    
    Name: Yali Carvajal
    Date: August 8,2023
    Description: Web Development 2 Final Project Full Spec

****************/

require('connect.php');
$movieId = $_GET['movieId'];

$statement = $db->prepare("DELETE * FROM movie WHERE movieId = :movieId");
$statement->bindValue(':movieId', $movieId);
$statement->execute();

header('Location: moviesearch.php');
exit;
?>
