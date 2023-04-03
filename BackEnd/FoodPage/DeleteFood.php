<?php
session_start();
// echo "Delete Food Page!"
// First we need to check whether the Value is passed or not
if(isset($_GET['id']) && ($_GET['ImageName']))
{
    // Process to Delete
    // Get Id and IamgeName
    $Id=$_GET['id'];
    $ImageName=$_GET['ImageName'];
    // Remove the image if available
    // Check whether the image is available or not and delete only if available
    if($ImageName!="")
    {
        // It has image and it si needed to remove
        // Get the image path
        $Path="../FoodPage/Images/.".$ImageName;
        // Remove image from folder
        $Remove=unlink($Path);
        // Check whether the image is available or not
        if($Remove==false)
        {
            // Failed to remove image
            $_SESSION['Remove']="<div class='failure'>Failed to remove image!</div>";
            // Redirect to Food Page
            ?>
            <script>
                window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/FoodPage/FoodPage.php'
            </script>
            <?php
            // Stop the process of deleting food
            die();
        }
    } 
    // Delete food from database
    $sql="DELETE FROM table_food WHERE Id=$Id";
    //Execute the query
    $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
    $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
    $Result=mysqli_query($conn,$sql);
    // Check whether the query is executed or not
    if($Result==true)
    {
        // Query Executed
        $_SESSION['FoodDeleted']="<div class='success'>Data is Successfully Deleted!</div>";
        ?>
        <script>
            window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/FoodPage/FoodPage.php'
        </script>
        <?php

    }
    else{
        // Query not Executed
        $_SESSION['FoodDeleted']="<div class='failure'>Data is Failed to Delete!</div>";
        ?>
        <script>
            window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/FoodPage/FoodPage.php'
        </script>
        <?php
    }
}
else
{
    $_SESSION['Delete']="<div class='failure'>Unathorized Access!</div>";
    ?>
    <script>
        window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/FoodPage/FoodPage.php'
    </script>
    <?php
}
?>