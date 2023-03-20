<!DOCTYPE html>
<head>
    <title>Online Food Delivery Website-Admin Panel</title>
    <link rel="stylesheet" href="AdminPage.css">
    <link rel="stylesheet" href="../HomePage/index.css">
</head>
<body>
    <div class="Login">
        <h3>Login</h3>
        <br>
        <!-- Session for Login Failure starts here-->
        <?php
        if(isset($_SESSION['UserLogin'])){
            echo ($_SESSION['UserLogin']);
            // Displaying Session Message

            unset($_SESSION['UserLogin']);
            // Removing Session Message
        }
        
        
        ?>
        <!-- Session for Login Failure Ends here-->
        <!-- Login Form Starts Here -->
        <form action="" method="POST" class="TextCenter">
            UserName <br>
            <input type="text" name="UserName" placeholder="Enter UserName"><br><br>
            Password <br>
            <input type="password" name="Password" placeholder="Enter Password"><br><br>
            <input type="submit" name="Submit" value="Login" class="LoginButton">
        </form>
        <!-- Login Form Ends Here -->
    </div>

</body>
</html>


<?php
// Check whether the submit button is clicked
if(isset($_POST['Submit'])){
    // Process the Login
    // 1)Get the Data from the Login Form
    $UserName=$_POST['UserName'];
    $Password=$_POST['Password'];
    // 2)Check whether the user with UserName and Password Exists!
    $sql="SELECT * FROM table_admin WHERE UserName='$UserName' AND Password='$Password'";
    // 3)Execute the query
    $result=mysqli_query($conn,$sql);
    $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
    $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn)); 
    // 4)Count rows to check whether the user exists or not
    $count=mysqli_num_rows($result);
    if($count==1){
        // User Available  
        $_SESSION['UserLogin']= "<div class='success'>Login Successfully!</div>";
        // Redirect to Home Page
        define('SITEURL','http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/');
        header("location:".SITEURL."BackEnd/AdminPage/AdminPage.php");
    } 
    else{
        // User not Available
        $_SESSION['UserLogin']= "<div class='failure'>Login Failed!</div>";
        // Redirect to Login Page
        define('SITEURL','http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/');
        header("location:".SITEURL."BackEnd/AdminPage/LoginPage.php");
    }
}
?>