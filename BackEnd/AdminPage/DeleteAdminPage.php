<!-- Get the Id of Admin to be Deleted -->
<?php
define('SITEURL','http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/');
$conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
$Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
session_start();
// Get the Id of Admin to deleted
$id= $_GET['id'];
// SQL Query to delete the Admin
$sql="DELETE FROM table_admin WHERE Id=$id";
// Execute the query
$result=mysqli_query($conn,$sql);
// Check whether the query is executed successfully or not!
if($result==true){
    // echo "Admin Deleted!";
    // Create a session variable to display the message
    $_SESSION['DeleteAdmin']="<div class='success'>Admin Deleted Successfully!</div>";
    // Redirect to Admin Page
    header('location:'.SITEURL.'BackEnd/AdminPage/AdminPage.php');
}
else{
    // echo "Admin Not Deleted!";
    $_SESSION['DeleteAdmin']="<div class='failure'>Failed to Delete Admin!</div>";
    header('location:'.SITEURL.'BackEnd/AdminPage/AdminPage.php');
}


?>

