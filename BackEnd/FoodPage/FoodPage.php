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
                <Strong>Food</Strong>
            </h1>
            <?php
            if(isset($_SESSION['Insert'])){
                echo ($_SESSION['Insert']);
                // Displaying Session Message

                unset($_SESSION['Insert']);
                // Removing Session Message
            }
            if(isset($_SESSION['Delete'])){
                echo ($_SESSION['Delete']);
                // Displaying Session Message

                unset($_SESSION['Delete']);
                // Removing Session Message
            }
            if(isset($_SESSION['Remove'])){
                echo ($_SESSION['Remove']);
                // Displaying Session Message
                unset($_SESSION['Remove']);
                // Removing Session Message
            }
            if(isset($_SESSION['FoodDeleted']))
            {
                echo ($_SESSION['FoodDeleted']);
                // Displaying Session Message
                unset($_SESSION['FoodDeleted']);
                // Removing Session Message
            }
            ?>
            <br>
            <a href="AddFood.php" class="AddAdminButton">
                Add Category
            </a>
            <br>
            <br>

            <table class="FullWidthTable">
                <tr>
                    <th>Sr.No.</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                <!-- PHP -->
                <?php 
                // Create sql query to get the data
                $sql="SELECT * FROM table_food";
                // Execute the query
                $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
                $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
                $Result=mysqli_query($conn,$sql);
                // Count rows to check whether we have food or not
                $Count=mysqli_num_rows($Result);
                // Create serial variable and set its value as 1
                define('SITEURL','http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/');
                $SrNo=1;
                if($Count>0)
                {
                    // We have food in database
                    // Get the food from database and display
                    while($row=mysqli_fetch_assoc($Result)){
                        // Get the values from individual columns
                        $Id=$row['Id'];
                        $Title=$row['Title'];
                        $Price=$row['Price'];
                        $ImageName=$row['ImageName'];
                        $Featured=$row['Featured'];
                        $Active=$row['Active'];
                        ?>
                        <tr>
                        <td>
                            <?php echo $SrNo++; ?>
                        </td>
                        <td>
                            <?php echo $Title; ?>
                        </td>
                        <td>
                            <?php echo $Price; ?>
                        </td>
                        <td>
                            <?php
                            // Check we have image or not
                            if($ImageName==""){
                                // We do not have image display the message
                                echo "<div class='failure'>We do Not have Image!</div>";
                            } 
                            else{
                                // We have image so display the image
                                ?>
                                <!-- Code to display the Image -->
                                <img src="<?php echo SITEURL;?>BackEnd/FoodPage/Images/.<?php echo $ImageName;?>" width="200px">
                                <?php
                            }
                            ?>

                        </td>
                        <td>
                            <?php echo $Featured; ?>
                        </td>
                        <td>
                            <?php echo $Active; ?>
                        </td>
                        <td>
                            <a href="" class="UpdateAdminButton">Update Food</a>
                            <a href="<?php echo SITEURL;?>BackEnd/FoodPage/DeleteFood.php?id=<?php echo $Id;?>&ImageName=<?php echo $ImageName;?>" class="DeleteAdminButton">Delete Food</a>
                        </td>
                    </tr>


                        <?php
                    }
                }
                else
                {
                    // We donot have data so we will display the data inside the table
                    ?>
                    <tr>
                        <td colspan="6">
                            <div class="failure">
                                No Category Found
                            </div>
                        </td>
                    </tr>
                    <?php
                }

                ?>
            </table>
        </div>
    </div>
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