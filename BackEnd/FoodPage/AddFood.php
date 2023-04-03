<!-- <?php
echo "This is Add Category Page!";
?> -->
<!DOCTYPE html>
<html>
<head>
    <title>Online Food Delivery Website-Admin Panel</title>
    <link rel="stylesheet" href="FoodPage.css">
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
                <Strong>Add Food</Strong>
            </h1>
            <br>
            <?php
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
                        <td>Description</td>
                        <td>
                            <textarea name="Description" cols="30" rows="5" placeholder="Here will be your Description for the Food!"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Price</td>
                        <td>
                            <input type="number" name="Price" placeholder="Here will be the Price for the Food!">
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
                                        $Id=$row['Id'];
                                        $Title=$row['Title'];
                                        ?>
                                        <option value="<?php echo $Id; ?>"><?php echo $Title; ?></option>
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
                        <input type="submit" name="Submit" value="Add Food" class="AddCategoryButton">
                    </td>
                </table>
            </form>
            <?php
            // Checked whether the Add Food Button is clicked
            if(isset($_POST['Submit']))
            {
                // Add the food in the database
                // echo "Button is Clicked";
                // Get the data from the form
                $Title=$_POST['Title'];
                $Description=$_POST['Description'];
                $Price=$_POST['Price'];
                $Category=$_POST['Category'];
                // Check whether the radio button for featured and active is checked or not
                if(isset($_POST['featured']))
                {
                    $Featured=$_POST['featured'];
                }
                else
                {
                    $Featured="No";
                    // Set the default value
                }
                if(isset($_POST['active']))
                {
                    $Active=$_POST['active'];
                }
                else
                {
                    $Active="No";
                    // Set the default value    
                }
                // Update the image if selected
                // Check whether the select image is clicked or not and upload the image only if image is selected.
                if(isset($_FILES['image']['name']))
                {
                    // Get the details of the selected image
                    $ImageName=$_FILES['image']['name'];
                    // Check whether the image is selected or not and upload image only if selected
                    if($ImageName!="")
                    {
                        // Image is selected 
                        // Rename the image
                        // Get the exetension of selected image (jpg, png, gif, etc) 
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
                        // Check whether the image is uploaded or not
                        if($Upload==false)
                        {
                            // Failed to upload the image
                            // Redirect AddFood page
                            $_SESSION['Upload']="<div class='failure'>Failed to Upload Image!</div>";
                            ?>
                            <script>
                                window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/FoodPage/FoodPage.php'
                            </script>
                            <?php
                            // Stop the process
                            die();
                        }
                    }
                }
                else
                {
                    // Setting the default value as blank
                    $ImageName="";
                }
                // Insert into Database
                // Create sql query to save and Add food
                // For numerical we do not need to pass value inside quotes '' but for string value it is complusory to pass value inside quotes ''
                $sql2="INSERT INTO table_food SET 
                Title='$Title',
                Description='$Description',
                Price='$Price',
                ImageName='$ImageName',
                CategoryId='$Category',
                Featured='$Featured',
                Active='$Active'
                ";
                // Execute the query
                $Result2=mysqli_query($conn,$sql2);
                // Check whether the data is inserted or not
                // Redirect with message to Food Page
                if($Result2==true)
                {
                    // Data inserted successfully
                    $_SESSION['Insert']="<div class='success'>Data is Inserted Successfully!</div>";
                    ?>
                    <script>
                        window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/FoodPage/FoodPage.php'
                    </script>
                    <?php
                }
                else
                {
                    // Failed to Insert the data
                    $_SESSION['Insert']="<div class='failure'>Data is Not Inserted!</div>";
                    ?>
                    <script>
                        window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/FoodPage/FoodPage.php'
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