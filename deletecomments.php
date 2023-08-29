<?php

/*******w******** 
    
    Name: Yali Carvajal
    Date: August 8,2023
    Description: Web Development 2 Final Project Full Spec

****************/

require('connect.php');

$reviewId = $_GET['reviewId'];
$query = "DELETE FROM review WHERE reviewId='$reviewId'";

$statement = $db->prepare($query);

header("comments.php?movieId=" . $movieId);
 
?>