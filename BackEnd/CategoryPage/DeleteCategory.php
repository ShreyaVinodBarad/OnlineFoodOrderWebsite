<?php
session_start();
// echo "Delete Category Page!";
// Check whether the id name and image name is set or not
if(isset($_GET['id']) AND isset($_GET['ImageName']))
{
    // Get the value and Delete
    // echo "Get Value and Delete";
    $id=$_GET['id'];
    $ImageName=$_GET['ImageName'];
    // Remove the Image File if Available
    if($ImageName!=""){
        // Image Available So remove it
        $Path="../CategoryPage/Images/.".$ImageName;
        // Remove The Image
        $Remove=unlink($Path);
        // This will have boolean value
        if($Remove==false){
            // Set the Session Message
            $_SESSION['Remove']="<div class='failure'>Fail to Remove Category Image!</div>";
            // Redirect to Category Page
            ?>
            <script>
                window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/CategoryPage/CategoryPage.php';
            </script>
            <?php
            // Stop the Process
            die();
        }
    }
    // Delete Data from Database
    $sql="DELETE FROM table_category WHERE id=$id";
    // Execute the Query
    $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
    $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
    $result=mysqli_query($conn,$sql);
    // Check whether the data is deleted from the database or not
    if($result==true){
        // Set Success message and Redirect
        $_SESSION['Delete']="<div class='success'>Category Deleted Successfully!</div>";
        // Redirect
        ?>
        <script>
            window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/CategoryPage/CategoryPage.php';
        </script>
        <?php
    }
    else{
        // Set Failure Message and Redirect
        $_SESSION['Delete']="<div class='failure'>Category Not Deleted!</div>";
        // Redirect
        ?>
        <script>
            window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/CategoryPage/CategoryPage.php';
        </script>
        <?php

    }
}
else
{
    // Redirect to Category page
    ?>
    <script>
        window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/CategoryPage/CategoryPage.php';
    </script>
    <?php   
}
?>