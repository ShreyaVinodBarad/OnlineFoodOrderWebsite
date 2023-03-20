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
                <Strong>Add Admin</Strong>
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

            <form action="" method="post">
            <table class="AddAdminTable">
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="FullName" placeholder="Enter Name">
                    </td>
                </tr>

                <tr>
                    <td>User Name</td>
                    <td>
                        <input type="text" name="UserName" placeholder="Enter User Name">
                    </td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="Password" placeholder="Enter Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="Submit" value="Add Admin" class="AddAdminTableButton">
                    </td>
                </tr>

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

<!-- Working on Database with the help of Form -->
<?php
    if(isset($_POST['Submit'])){
        $FullName=$_POST['FullName'];
        $UserName=$_POST['UserName'];
        $Password=md5($_POST['Password']);
        // Here I have used md5 to Encrypt the Password!

        // SQL Query to Save the data to save the data in the Database!
        $sql="INSERT INTO `table_admin` SET FullName='$FullName', UserName='$UserName',Password='$Password'";
        
        //Saving the above executed query in the Database!
        $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
        $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
        // Creating Session
        session_start();
        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        define('SITEURL','http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/');

        if($result==true)
        {
            //echo "Data Inserted!";
            $_SESSION['AddMessage']="<div class='success'>Admin Added Successfully!</div>";
            header("location:".SITEURL."BackEnd/AdminPage/AdminPage.php");
        }
        else
        {
            //echo "Data Not Inserted!";
            $_SESSION['AddMessage']="<div class='failure'>Admin Not Added Successfully!</div>";
            header("location:".SITEURL."BackEnd/AdminPage/AddAdminPage.php");
        }

    }
?>