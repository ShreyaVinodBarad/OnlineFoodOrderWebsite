<?php
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