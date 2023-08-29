<?php

/*******w******** 
    
    Name: Yali Carvajal
    Date: August 8,2023
    Description: Web Development 2 Final Project Full Spec

****************/

SESSION_START();
// Remove all session variables

$_SESSION = array();
// Destroy the session
session_destroy();
header('location: login.php');
exit;


?>
