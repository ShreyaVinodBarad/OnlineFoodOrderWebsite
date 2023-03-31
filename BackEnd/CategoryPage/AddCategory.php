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
                <Strong>Add Category</Strong>
            </h1>
            <br>

            <?php

            if(isset($_SESSION['addCategory'])){
                echo ($_SESSION['addCategory']);
                // Displaying Session Message

                unset($_SESSION['addCategory']);
                // Removing Session Message
            }
            if(isset($_SESSION['Upload'])){
                echo ($_SESSION['Upload']);
                // Displaying Session Message

                unset($_SESSION['Upload']);
                // Removing Session Message
            }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="AddCategoryTable">
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="Title" placeholder="Category Title">
                        </td>
                    </tr>

                    <tr>
                        <td>Select Images</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Featured</td>   
                        <td>
                            <input type="radio" name="featured" value="Yes">Yes     
                            <input type="radio" name="featured" value="No">No
                        </td>
                    </tr>

                    
                    <tr>
                        <td>Active</td>
                        <td>
                            <input type="radio" name="active" value="Yes">Yes
                            <input type="radio" name="active" value="No">No
                        </td>
                    </tr>

                    <td colspan="2">
                        <input type="submit" name="Submit" value="Add Category" class="AddCategoryButton">
                    </td>




                </table>
            </form>

            <?php
            // Check whether the submit button is clicked or not
            if(isset($_POST['Submit'])){
                // Echo button is clicked!
                // echo "BUtton is Clicked!";
                // 1)Get the value from Category Form
                $Title=$_POST['Title'];
                // For radio input we need to check the button is selected or not
                // Featured
                if(isset($_POST['featured'])){
                    // Get the value from the form
                    $featured=$_POST['featured'];
                }
                else{
                    // Set the default value
                    $featured="No";
                }
                // Active
                if(isset($_POST['active'])){
                    // Get the value from the form
                    $active=$_POST['active'];
                }
                else{
                    // Set the default value
                    $active="No";
                }
                // Check whether the image is selected or not and set the value for the image name accordingly
                // print_r($_FILES['image']);
                // die(); //Break the code here 
                if(isset($_FILES['image']['name']))
                {
                    // Upload the Image
                    // To upload the image we need image name,source path, and Destination path
                    $imageName=$_FILES['image']['name'];

                    // Upload the image if the image is selected
                    if($imageName !="")
                    {

                    

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
                                window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/CategoryPage/AddCategory.php';
                            </script>
                            <?php
                            // Stop the process
                            die();
                        }
                    }
                }
                else{
                    // Dont upload the image and set the image name as blank
                    $imageName="";
                }




                // Create sql query to insert the data in the database
                $sql="INSERT INTO table_category SET 
                Title='$Title',
                imageName='$imageName',
                featured='$featured',
                active='$active'
                ";
                // Execute the query and save the data in the database
                $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
                $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));

                $result=mysqli_query($conn,$sql);
                // Check whether the query is executed or not and data is added or not

                if($result==true){
                    // Query executed and category added
                    $_SESSION['addCategory']="<div class='success'>Category Added Successfully!</div>";
                    ?>
                    <script>
                        window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/CategoryPage/CategoryPage.php'
                    </script>
                    <?php

                }
                else{
                    // Failed to Add Category
                    $_SESSION['addCategory']="<div class='failure'>Category not Added!</div>";
                    ?>
                    <script>
                        window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/CategoryPage/AddCategory.php'
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