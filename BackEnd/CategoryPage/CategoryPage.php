<!DOCTYPE html>
<html>
<head>
    <title>Online Food Delivery Website-Admin Panel</title>
    <link rel="stylesheet" href="../HomePage/index.css">
    <link rel="stylesheet" href="../CategoryPage/CategoryPage.css">
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
                <Strong>Category</Strong>
            </h1>
            <br>

            <?php
            if(isset($_SESSION['addCategory'])){
                echo ($_SESSION['addCategory']);
                // Displaying Session Message

                unset($_SESSION['addCategory']);
                // Removing Session Message
            }

            // Category
            if(isset($_SESSION['Remove'])){
                echo ($_SESSION['Remove']);
                // Displaying Session Message

                unset($_SESSION['Remove']);
                // Removing Session Message
            }
            if(isset($_SESSION['Delete'])){
                echo ($_SESSION['Delete']);
                // Displaying Session Message

                unset($_SESSION['Delete']);
                // Removing Session Message
            }
            // Update Cateogry
            if(isset($_SESSION['NoCategoryFound'])){
                echo ($_SESSION['NoCategoryFound']);
                // Displaying Session Message

                unset($_SESSION['NoCategoryFound']);
                // Removing Session Message
            }
            if(isset($_SESSION['Update'])){
                echo ($_SESSION['Update']);
                // Displaying Session Message

                unset($_SESSION['Update']);
                // Removing Session Message
            }
            if(isset($_SESSION['Upload'])){
                echo ($_SESSION['Upload']);
                // Displaying Session Message

                unset($_SESSION['Upload']);
                // Removing Session Message
            }

            if(isset($_SESSION['FailedToRemoveImage'])){
                echo ($_SESSION['FailedToRemoveImage']);
                // Displaying Session Message

                unset($_SESSION['FailedToRemoveImage']);
                // Removing Session Message
            }


            ?>

            <a href="AddCategory.php" class="AddAdminButton">
                Add Category
            </a>
            <br>
            <br>

            <table class="FullWidthTable">
                <tr>
                    <th>Sr.No.</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php
                // Query to get all cateogries from database
                $sql="SELECT * FROM table_category";
                define('SITEURL','http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/');
                // Execute Query 
                $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
                $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));

                $result=mysqli_query($conn,$sql);
                // Count Rows
                $count=mysqli_num_rows($result);
                // CHeck whether the data is there in the database

                // Create Sr.No. Variable and value as 1
                $srNo=1; 
                if($count>0){
                    // We have data in database
                    // Get the data and Display
                    while($row=mysqli_fetch_assoc($result)){
                        $Id=$row['Id'];
                        $Title=$row['Title'];
                        $ImageName=$row['ImageName'];
                        $Featured=$row['Featured'];
                        $Active=$row['Active'];
                        ?>
                        <tr>
                        <td><?php echo $srNo++?></td>
                        <td><?php echo $Title?></td>

                        <td>
                            <?php
        

                            // Check whether image name is available or not
                            if($ImageName!=""){

                                // Display Image
                                ?>
                                
                                <img src="<?php echo SITEURL; ?>BackEnd/CategoryPage/Images/.<?php echo $ImageName;?>" width="100px">
                                <?php
                            }
                            else{
                                // Display the message
                                echo "<div class='failure'>No Category Added</div>";
                            }
                            ?>
                        </td>
                        <td><?php echo $Featured?></td>
                        <td><?php echo $Active?></td>
                    
                        <td>
                            <a href="<?php echo SITEURL;?>BackEnd/CategoryPage/UpdateCategory.php?id=<?php echo $Id;?>" class="UpdateAdminButton" >Update Category</a>
                            <a href="<?php echo SITEURL;?>BackEnd/CategoryPage/DeleteCategory.php?id=<?php echo $Id?>&ImageName=<?php echo $ImageName?>" class="DeleteAdminButton" >Delete Category</a>
                        </td>
                        </tr>

                        <?php


                    }

                }
                else{
                    // We do not have data in database
                    // We will display the message in the table
                    ?>
                    <tr>
                        <td colspan="6"><div class="failure">No Category Added</div></td>
                    </tr>
                    <?php
                }
                
                
                
                
                
                
                ?>



            </table>
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