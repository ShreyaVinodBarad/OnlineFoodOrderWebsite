<?php
// echo "Update Food"
// Check whether the id is set or not
if(isset($_GET['id']))
{
    // Get all the details 
    $Id=$_GET['id'];
    // SQL Query to get the selected food
    $sql2="SELECT * FROM table_food WHERE Id=$Id";
    // Execute the query
    $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
    $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
    $Result2=mysqli_query($conn,$sql2);
    // Get the data based on query executed
    $row2=mysqli_fetch_assoc($Result2);
    // Get the individual value of selected data.
    $Title=$row2['Title'];
    $Description=$row2['Description'];
    $Price=$row2['Price'];
    $CurrentImage=$row2['ImageName'];
    $CurrentCategory=$row2['CategoryId'];
    $Featured=$row2['Featured'];
    $Active=$row2['Active'];

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Online Food Delivery Website-Admin Panel</title>
    <link rel="stylesheet" href="../HomePage/index.css">
    <link rel="stylesheet" href="FoodPage.css">
</head>
<body>
    <!-- Menu Section Starts Here -->
    <?php
    include("../Section/MenuSection.php");    
    ?>
    <!-- Menu Section Ends Here -->

    <!-- Main Content Section Starts Here -->
    <div class="MainContent">
        <div class="Wrapper">
            <h1>
                <Strong>Update Food</Strong>
            </h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="AddCategoryTable">
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="Title" placeholder="Category Title" value="<?php echo $Title;?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Description</td>
                        <td>
                            <textarea name="Description" cols="30" rows="5" placeholder="Here will be your Description for the Food!"><?php echo $Description; ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Price</td>
                        <td>
                            <input type="number" name="Price" placeholder="Here will be the Price for the Food!" value="<?php echo $Price; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Current Image</td>
                        <td>
                            <?php 
                            define('SITEURL','http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/');
                            if($CurrentImage=="")
                            {
                                // Image not available
                                echo "<div class='Failure'>Image not Available!</div>";
                            }
                            else
                            {
                                // Image Available
                                ?>
                                <img src="<?php echo SITEURL;?>BackEnd/FoodPage/Images/.<?php echo $CurrentImage;?>" width="200px">
                                <?php
                            }
                            ?>
                        </td>
                    </tr>

                    
                    <tr>
                        <td>Select Image</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Category</td>
                        <td>
                            <select name="Category" >
                                <?php
                                // Create the code to display the data from database
                                // 1)Create a sql query to get the all the active categories from the database.
                                $sql="SELECT * FROM table_category WHERE Active='Yes'";
                                // Execute the query
                                $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
                                $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
                                $Result=mysqli_query($conn,$sql);
                                // Count Rows to check whether we have categories or not
                                $count=mysqli_num_rows($Result);
                                // If count is greater then zero we have categories or else we do not have categories
                                if($count>0){
                                    // We have categries
                                    while($row=mysqli_fetch_assoc($Result))
                                    {
                                        // Get details of Categories
                                        $CategoryId=$row['Id'];
                                        $CategoryTitle=$row['Title'];
                                        ?>
                                        <option <?php if($CurrentCategory==$CategoryId) echo "selected"; ?> value="<?php echo $CategoryId; ?>"><?php echo $CategoryTitle; ?></option>
                                        <?php
                                    }
                                }  
                                else{
                                    // we do not have category
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }
                                ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Featured</td>   
                        <td>
                            <input <?php if($Featured=="Yes") echo "checked";?> type="radio" name="featured" value="Yes">Yes     
                            <input <?php if($Featured=="No") echo "checked";?> type="radio" name="featured" value="No">No
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Active</td>
                        <td>
                            <input <?php if($Active=="Yes") echo "checked";?> type="radio" name="active" value="Yes">Yes
                            <input <?php if($Active=="No") echo "checked";?> type="radio" name="active" value="No">No
                        </td>
                    </tr>

                    <td colspan="2">
                        <input type="hidden" name="Id" value="<?php echo $Id;?>"> 
                        <input type="hidden" name="CurrentImage" value="<?php echo $CurrentImage;?>"> 
                        <input type="submit" name="Submit" value="Update Food" class="AddCategoryButton">
                    </td>
                </table>
            </form>
       
        </div>
    </div>
    <!-- Main Content Section Ends Here -->

    <!-- PHP Code -->
    <?php
    if(isset($_POST['Submit']))
    {
        // Get all the details from the form
        $Id=$_POST['Id'];
        $Title=$_POST['Title'];
        $Description=$_POST['Description'];
        $Price=$_POST['Price'];
        $CurrentImage=$POST['CurrentImage'];
        $Category=$_POST['Category'];
        $Featured=$_POST['featured'];
        $Active=$_POST['active'];
        // Upload image if selected
        // Check wether the upload button is clicked or not
        if(isset($_FILES['image']['name']))
        {
            // Upload button is clicked
            $ImageName=$_FILES['image']['name'];
            // Check whether the file is available or not
            if($ImageName!=""){
                // Image is available
                // Rename the image
                $Extension=end(explode('.',$ImageName));
                // Create new name for the image
                $ImageName="FoodName".rand(0000,9999).'.'.$Extension;
                // New Image name will be FoodName.456.jpg
                // upload the image 
                // Get the Source and Destination Path
                // Source path is current location of the image
                $Source=$_FILES['image']['tmp_name'];
                // Destination path for the image to be uploaded
                $DestinationPath="../FoodPage/Images/.".$ImageName;
                // Finally upload the food image
                $Upload=move_uploaded_file($Source,$DestinationPath);
                // Check wether the image is uploaded or not
                if($Upload==false)
                {
                    // Failed to upload 
                    $_SESSION['FailedToUploadImageInUpdateFood']="<div class='failure'>Failed to Upload Image!</div>";
                    ?>
                    <script>
                        window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/FoodPage/FoodPage.php'
                    </script>
                    <?php
                    // Stop the process
                    die();
                }
                // Remove current image if available
                if($CurrentImage!="")
                {
                    // Current image is available
                    // Remove the image
                    $Remove_Path="../FoodPage/Images/.".$CurrentImage;
                    $Remove=unlink($Remove_Path);
                    // Check Wether the image is removed or not
                    // If failed to remove the image then display then display the message and stop the process
                    if($Remove==false)
                    {
                        // Failed to Remove message
                        $_SESSION['FailedToRemoveImage']="<div class='failure'>Failed to Remove Current Image!</div>";
                        ?>
                        <script>
                            window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/FoodPage/FoodPage.php';
                        </script>
                        <?php
                        // Stop the process
                        die();

                    }   
                }
            }
            else
            {
                $ImageName=$CurrentImage;  
                // Default Image when image is not selected
            }
        }
        else
        {
            $ImageName=$CurrentImage;
            // Default Image when Button is not Clicked!
        }
        // Update the food in the database
        $sql3="UPDATE table_food SET
        Title='$Title',
        Description='$Description',
        Price='$Price',
        ImageName='$ImageName',
        CategoryId='$Category',
        Featured='$Featured',
        Active='$Active'
        WHERE Id=$Id";
        // Execute the sql query
        $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
        $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
        $Result3=mysqli_query($conn,$sql3);
        // Check whether the query is executed or not
        if($Result3==true){
            $_SESSION['UpdateFood']="<div class='success'>Food Updated Successfully!</div>";
            ?>
            <script>
                window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/FoodPage/FoodPage.php'
            </script>
            <?php
        }
        else{
            // Failed to Update Category
            $_SESSION['UpdateFood']="<div class='failure'>Failed to Update Food!</div>";
            ?>
            <script>
                window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/FoodPage/FoodPage.php'
            </script>
            <?php
        }

    }
    ?>

    <!-- Footer Section Starts Here -->
    <?php
    include ('../Section/FooterSection.php');
    ?>
    <!-- Footer Section Ends Here -->

</body>
</html>