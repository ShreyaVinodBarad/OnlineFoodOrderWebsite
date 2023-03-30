<?php
// Check  wether the value of Id and Image or not
echo "hello";

if(isset($_GET['id']) AND isset($_GET['ImageName'])){
    define('SITEURL','http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/');
    // Get the value and Delete
    $Id=$_GET['id'];
    $ImageName=$_GET['ImageName'];
    // Remove the physical file available
    if($ImageName!=""){
        // Image is Available remove it
        $Path= SITEURL."BackEnd/CategoryPage/Images/.".$ImageName;
        echo $Path;
        // Remove the Image
        $Remove=unlink($Path);
        // If failed to remove image add an error message and stop the process
        if($Remove==false){
            // define('SITEURL','http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/');
            // Set the session message
            $_SESSION['Remove']="<div class='failure'>Failed to remove Category Image!</div>";
            // Redirect to Category page
            header('location:'.SITEURL.'BackEnd/CategoryPage/CategoryPage.php');
            // Stop the process
            die();

        }

        
    }
    // Delete data from database
    // SQL query to delete the data
    $sql="DELETE FROM table_category Where Id=$Id";
    // Execute the query
    $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
    $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
    $result=mysqli_query($conn,$sql);
    // Check whether the data is deleted or not
    if($result==true){
        // Display success messsage and redirect
        $_SESSION['Delete']="<div class='success'>Category deleted successfully!</div>";
        // Redirect to Category page
        header('location:'.SITEURL.'BackEnd/CategoryPage/CategoryPage.php');
    }
    else{
        // Display failure messsage and redirect
        $_SESSION['Delete']="<div class='failure'>Category Not Deleted!!</div>";
        // Redirect to Category page
        header('location:'.SITEURL.'BackEnd/CategoryPage/CategoryPage.php');

    }

}
else{
    // Redirect to manage Category page
    // header('location:'.SITEURL.'BackEnd/CategoryPage/CategoryPage.php');
}
?>