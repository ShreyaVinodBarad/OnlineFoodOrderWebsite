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

    
    <?php
    define('SITEURL','http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/');
    $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
    $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));    
    // Get the id of selected admin
    $id=$_GET['id'];
    // Create the sql query to get the details
    $sql="SELECT * FROM table_admin WHERE id=$id";
    // Execute the query
    $result=mysqli_query($conn,$sql);
    // Check whether the query is executed or not
    if($result==true){
        // Check whether the data is available or not
        $count=mysqli_num_rows($result);
        // Check whether we have admin data or not
        if($count==1){
            // Get the Details
            // echo "Admin Available!";
            $row=mysqli_fetch_assoc($result);
            $FullName=$row['FullName'];
            $UserName=$row['UserName'];
        }
        else{
            // Redirect to Admin Page
            header('location:'.SITEURL.'BackEnd/AdminPage/AdminPage.php');
        }
    }
    else{


    }
    ?>


    <!-- Main Content Section Starts Here -->
    <div class="MainContent">
        <div class="Wrapper">
            <h1>
                <Strong>Update Admin</Strong>
            </h1>
            <br>

            <form action="" method="POST">
                <table class="UpdateAdminTable">
                    <tr>
                        <td>Full Name</td>
                        <td>
                            <input type="text" name="FullName" value="<?php echo $FullName;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>User Name</td>
                        <td>
                            <input type="text" name="UserName" value="<?php echo $UserName;?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" value="Update Admin" class="UpdateAdminTableButton">
                        </td>
                    </tr>

                </table>



            </form>
            
            
        </div>
    </div>
    <!-- Main Content Section Ends Here -->
    <?php
    // Check whether the submit button is click or not
    if(isset($_POST['submit'])){
        // echo "Button Clicked!";
        // GET all values from the form
        $id=$_POST['id'];
        $FullName=$_POST['FullName'];
        $UserName=$_POST['UserName'];
        // Create SQL Query to update Admin
        $sql="UPDATE table_admin SET
        FullName='$FullName',
        UserName='$UserName'
        WHERE id='$id'
        ";
        // Execute the query
        $result=mysqli_query($conn,$sql);
        // Check Whether the query is executed successfully or not.
        // Starting Session
        session_start();
        if($result==true){
            // Query Executed successfully
            // echo "Admin Updated Successfully!"; 
            $_SESSION['UpdateAdmin']="<div class='success'>Admin Updated Successfully!</div>";
            header('location:'.SITEURL.'BackEnd/AdminPage/AdminPage.php');
        }
        else{
            // Query Failed to Execute
            // echo "Admin Failed to Update";
            $_SESSION['UpdateAdmin']="<div class='failure'>Admin Failed to Update!</div>";
            header('location:'.SITEURL.'BackEnd/AdminPage/AdminPage.php');
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
