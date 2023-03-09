<!DOCTYPE html>
<html>
<head>
    <title>Online Food Delivery Website-Admin Panel</title>
    <link rel="stylesheet" href="AdminPage.css">
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
                <Strong>Admin</Strong>
            </h1>
            <br>

            <?php
            session_start();
            if(isset($_SESSION['AddMessage'])){
                echo ($_SESSION['AddMessage']);
                // Displaying Session Message

                unset($_SESSION['AddMessage']);
                // Removing Session Message
            }
            ?>


            <a href="AddAdminPage.php" class="AddAdminButton">
                Add Admin
            </a>
            <br>
            <br>

            <table class="FullWidthTable">
                <tr>
                    <th>Sr.No</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Actions</th>
                </tr>

                <?php
                // Query to get all admin
                $sql = "SELECT * FROM table_admin";
                // Execute the Query
                $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
                $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
                
                $result = mysqli_query($conn,$sql);
                // Checking whether the query is executed or not!
                if($result==true){
                    //Count rows to check we have data in database or not
                    $count=mysqli_num_rows($result);
                    // Function to get all the rows in the database

                    // Created a variable and assigned it a value 1
                    $start=1;

                    // Check the number of rows
                    if($count>0){
                        // We have the data in the database
                        while($rows=mysqli_fetch_assoc($result)){
                            // Using while loop to get all the data from the database
                            // While loopo will run as long as we have data in the database

                            // Get individual data
                            $Id=$rows['Id'];
                            $FullName=$rows['FullName'];
                            $UserName=$rows['UserName'];
                            ?>

                            <tr>
                            <td> <?php echo $start++;?> </td>
                            <td><?php echo $FullName;?></td>
                            <td><?php echo $UserName;?></td>
                            <td>
                                <a href="#" class="UpdateAdminButton">Update Admin</a>
                                <a href="#" class="DeleteAdminButton">Delete Admin</a>
                            </td>
                            </tr>
                            
                            <?php
                            //Display value in the table


                        }
                    } 
                    else{
                        // we do not have data in the database 
                    }


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