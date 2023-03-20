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
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
    
    
    
    ?>




    <!-- Main Content Section Starts Here -->
    <div class="MainContent">
        <div class="Wrapper">
            <h1>
                <Strong>Update Password</Strong>
            </h1>
            <br>

            <form action="" method="POST">
                <table class="UpdatePassword">
                    <tr>
                        <td>Current Password</td>
                        <td>
                            <input type="password" name="OldPassword" placeholder="Current Password">
                        </td>
                    </tr>
                    <tr>
                        <td>New Password</td>
                        <td>
                            <input type="password" name="NewPassword" placeholder="New Password">
                        </td>
                    </tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td>
                            <input type="password" name="ConfirmPassword" placeholder="Confirm Password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" value="Change Password" class="UpdatePasswordButton">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <!-- Main Content Section Ends Here -->

    <!-- Check whether the submit button is clicked or not -->
    <?php
    if(isset($_POST['submit'])){
        // echo "Clicked";
        define('SITEURL','http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/');
        $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
        $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn)); 
        //1. Get the data from form
        $id=$_POST['id'];
        $CurrentPassword=md5($_POST['OldPassword']);
        $NewPassword=md5($_POST['NewPassword']);
        $ConfirmPassword=md5($_POST['ConfirmPassword']);
        
        // 2. Check if the user with current ID and Password exists or not!
        $sql="SELECT * FROM table_admin WHERE id=$id AND password='$CurrentPassword'";
        // Execute the query
        session_start();
        $result=mysqli_query($conn,$sql);
        if($result==true){
            // Check whether the data is available or not
            $count=mysqli_num_rows($result);
            if($count==1){
                // The user exists password can be changed
                // echo "User Found!";
                // Check if the New Password and Confirm Password Matches or Not!
                if($NewPassword==$ConfirmPassword){
                    // Update Password
                    // echo "Password Updated Successfully!";
                    $sql2="UPDATE table_admin SET 
                    password='$NewPassword'
                    WHERE id=$id
                    ";
                    // Execute the query
                    $result2=mysqli_query($conn,$sql2);
                    // Check whether the query exeuted or not 
                    if($result2==true){
                        $_SESSION['PasswordChanged']="<div class='success'>Password Changed Successfully!</div>";
                        header('location:'.SITEURL.'BackEnd/AdminPage/AdminPage.php');
                    }
                    else{
                        $_SESSION['PasswordChanged']="<div class='failure'>Password Does Not Changed!</div>";
                        header('location:'.SITEURL.'BackEnd/AdminPage/AdminPage.php');
                    }

                }
                else{
                    // Redirect to Admin Page
                    $_SESSION['PasswordDoesNotMatch']="<div class='failure'>Password Does Not Match!</div>";
                    header('location:'.SITEURL.'BackEnd/AdminPage/AdminPage.php');

                }

            }
            else{
                // User does not exists so password cannot be changed then redirect
                $_SESSION['UserNotFound']="<div class='failure'>User Not Found</div>";
                header('location:'.SITEURL.'BackEnd/AdminPage/AdminPage.php');
            }
        }
        // 3. Check if the New Password and Confirm Password Matches or Not!


        // 4. Change Password if all the Above is true
    }
    
    
    
    
    
    
    
    ?>
    <!-- Footer Section Starts Here -->
    <?php
    include ('../Section/FooterSection.php');
    ?>
    <!-- Footer Section Ends Here -->
</body>
</html>