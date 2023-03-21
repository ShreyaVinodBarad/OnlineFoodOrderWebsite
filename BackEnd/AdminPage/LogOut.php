<?php
//1)Destory the session 
session_destroy();
// 2)Redirect to Login Page 
define('SITEURL','http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/');
header("location:".SITEURL."BackEnd/AdminPage/LoginPage.php");
?>