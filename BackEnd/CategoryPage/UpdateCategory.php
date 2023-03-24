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
            }
            else{
                // Redirect to category page
                header('location:'.SITEURL."BackEnd/CategoryPage/CategoryPage.php");
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
                            <input type="file" name="Image">
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
                        <input type="submit" name="Submit" value="Update Category" class="AddCategoryButton">
                    </td>




                </table>
            </form>
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