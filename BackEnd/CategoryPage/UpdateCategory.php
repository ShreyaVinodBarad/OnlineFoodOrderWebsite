<!DOCTYPE html>
<html>
<head>
    <title>Online Food Delivery Website-Admin Panel</title>
    <link rel="stylesheet" href="CategoryPage.css">
    <link rel="stylesheet" href="../HomePage/index.css">
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
                <Strong>Update Category</Strong>
            </h1>
            <br>

            <?php
            // Check whether the id is set or not
            if(isset($_GET['id'])){
                // Get the id and all other details
                $Id=$_GET['id'];
                // Create the sql query to get all other details
                $sql="SELECT * FROM table_category WHERE id=$Id";
                // Execute the query
                $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
                $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));

                $result=mysqli_query($conn,$sql);
                // Count Rows
                $count=mysqli_num_rows($result);
                // CHeck whether the whether the id is valid or not!
                if($count==1){
                    // Get all the data
                    $row=mysqli_fetch_assoc($result);
                    $Title=$row['Title'];
                    $CurrentImage=$row['ImageName'];
                    $Featured=$row['Featured'];
                    $Active=$row['Active'];


                }
                else{
                    // Redirect to Category with Session Message
                    $_SESSION['NoCategoryFound']="<div class='failure'>Category Not Found!</div>";
                    ?>
                    <script>
                        window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/CategoryPage/CategoryPage.php'
                    </script>
                    <?php
                }
            }
            else{
                // Redirect to category page
                ?>
                <script>
                    window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/CategoryPage/CategoryPage.php'
                </script>
                <?php
            }
            
            
            
            
            ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="AddCategoryTable">
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="Title" placeholder="Category Title" value="<?php echo $Title;?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Current Image</td>
                        <td>
                            <?php
                            if($CurrentImage != ""){
                                // Display the image
                                ?>
                                <img src="http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/CategoryPage/Images/.<?php echo $CurrentImage;?>" width="100px">

                                <?php
                            }
                            else{
                                //Display the message
                                echo "<div class='failure'>Image not Added!</div>";
                            }
                            
                            
                            
                            
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>New Image</td>   
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Featured</td>
                        <td>
                            <input <?php if($Featured=="Yes")echo "checked";?> type="radio" name="featured" value="Yes">Yes
                            <input <?php if($Featured=="No")echo "checked";?> type="radio" name="featured" value="No">No
                        </td>
                    </tr>

                    
                    <tr>
                        <td>Active</td>
                        <td>
                            <input <?php if($Active=="Yes")echo "checked";?> type="radio" name="active" value="Yes">Yes
                            <input <?php if($Active=="No")echo "checked";?> type="radio" name="active" value="No">No
                        </td>
                    </tr>

                    <td colspan="2">
                        <input type="hidden" name="CurrentImage" value="<?php echo $CurrentImage; ?>">
                        <input type="hidden" name="Id" value="<?php echo $Id; ?>">
                        <input type="Submit" name="Submit" value="Update Category" class="AddCategoryButton">
                    </td>
                </table>
            </form>
            <?php
            if(isset($_POST['Submit'])){
                echo "Clicked";
                // 1)Get all the values from our form
                $Id=$_POST['Id'];
                $Title=$_POST['Title'];
                $CurrentImage=$_POST['CurrentImage'];
                $Featured=$_POST['featured'];
                $Active=$_POST['active'];
                // 2)Updating new image if selected
                // Check whether the image is selected or not
                if(isset($_FILES['image']['name']))
                {
                    // Get The IMAGE Details
                    $imageName=$_FILES['image']['name'];
                    // Check weather image is available or not
                    if($imageName!=""){
                        // Image avilable
                        // Upload new image
                        // AUTO rename the image
                        // Get the extension of our image (jpg, png, gif , etc) eg."food.jpg"
                        $ext=end(explode('.',$imageName));
                        // Rename the image
                        $imageName="FoodCategory_".rand(000,999).'.'.$ext; 
                        // The name of the image that will be stored in the database is 
                        // FoodCategory_834.jpg
                        $sourcePath=$_FILES['image']['tmp_name'];
                        $destinationPath=$_FILES="Images/.$imageName";
                        // Upload the image
                        $Upload=move_uploaded_file($sourcePath,$destinationPath);
                        // Check whether the image is uploaded or not
                        // And image is not uploaded then we will stop the process and redirect with an 
                        // Error message
                        if($Upload==false){
                            $_SESSION['Upload']="<div class='failure'>Image not Uploaded!</div>";
                            // Redirect to category page
                            ?>
                            <script>
                                window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/CategoryPage/CategoryPage.php';
                            </script>
                            <?php
                            // Stop the process
                            die();
                        }
                        // remove the current image if avilable
                        if($CurrentImage!="")
                        {
                            $Remove_Path="../CategoryPage/Images/.".$CurrentImage;
                            $Remove=unlink($Remove_Path);
                            // Check Wether the image is removed or not
                            // If failed to remove the image then display then display the message and stop the process
                            if($Remove==false)
                            {
                                // Failed to Remove message
                                $_SESSION['FailedToRemoveImage']="<div class='failure'>Failed to Remove Current Image!</div>";
                                ?>
                                <script>
                                    window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/CategoryPage/CategoryPage.php';
                                </script>
                                <?php
                                // Stop the process
                                die();

                            }   
                        }
                    }
                    else{
                        $imageName=$CurrentImage;
                    }
                }
                else
                {
                    $imageName=$CurrentImage;
                }
                // 3)Update the Database
                $sql2="UPDATE table_category SET
                Title='$Title',
                ImageName='$imageName',
                Featured='$Featured',
                Active='$Active'
                WHERE Id=$Id
                ";
                // Execute the Query
                $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
                $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
                $result2=mysqli_query($conn,$sql2);
                // 4)Redirect to Category Page with Message
                // Check wether query is executed or not
                if($result2==true){
                    // Category Updated
                    $_SESSION['Update']="<div class='success'>Category Updated Successfully!</div>";
                    ?>
                    <script>
                        window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/CategoryPage/CategoryPage.php'
                    </script>
                    <?php
                }
                else{
                    // Failed to Update Category
                    $_SESSION['Update']="<div class='failure'>Failred to Update Category!</div>";
                    ?>
                    <script>
                        window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/CategoryPage/CategoryPage.php'
                    </script>
                    <?php
                }


            }
            
            
            
            ?>
        </div>
    </div>
    <!-- Main Content Section Ends Here -->


    <!-- Footer Section Starts Here -->
    <?php
    include ('../Section/FooterSection.php');
    ?>
    <!-- Footer Section Ends Here -->

</body>
</html>