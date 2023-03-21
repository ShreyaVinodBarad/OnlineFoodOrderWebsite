<?php
session_start();
// Authorization :Access Control
// Checked whether the User is logged in or not?
if(!isset($_SESSION['User'])){  
    // If User Session is not set
    // User is not Loged in 
    $_SESSION['NotLoggedIn']="<div class='failure'>Please Login to Access Admin Panel.</div>";
    // Redirect to Login Page
    define('SITEURL','http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/');
    header("location:".SITEURL."BackEnd/AdminPage/LoginPage.php");
}
?>