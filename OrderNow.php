<?php
 define('SITEURL','http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Food Delivery Website</title>
    <!-- Linking CSS File -->
    <link rel="stylesheet" href="OrderNow.css">

    <!-- Bootstrap Icons Links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    
</head>
<body>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- The NavBar Section Starts Here! -->
    <section class="NavBar">
        <div class="container">
            <div class="logo">
                <img src="./Images/Logo/Logo Image(Nav Bar).avif" alt="Logo" class="ImgResponsive">
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a href="index.php">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="Categories.php">
                            Categories
                        </a>
                    </li>
                    <li>
                        <a href="Foods.php">
                            Foods
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clearfix">
            </div>
        </div>
    </section>
    <!-- The NavBar Section Ends Here! -->
    <?php
    // Check whether Food Id is set or not
    if(isset($_GET['FoodId']))
    {
        // Get the food id and details of the selected foood
        $FoodId=$_GET['FoodId'];
        // Query to Get the Details of the Selected Food
        $sql="SELECT * FROM table_food WHERE Id=$FoodId";
        // Execute the Query
        $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
        $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
        $Result=mysqli_query($conn,$sql);
        // Count Number of Rows
        $Count=mysqli_num_rows($Result);
        // Check whether the data is available or not
        if($Count==1)
        {
            // We have data 
            // Get the Data from the database
            $row=mysqli_fetch_assoc($Result);
            $Title=$row['Title'];
            $Price=$row['Price'];
            $ImageName=$row['ImageName'];

        }
    }
    else
    {
        // Redirect to HomePage
        header("location:".SITEURL);
    }
    
    
    ?>

    <!-- The Food Order Form Starts Here -->
    <section class="FoodOrderForm">
        <div class="container">
            <h2 class="alignCenter" style="margin: 3% 10%;">
                Fill this Form to Confirm your Order
            </h2>
            <form action="" method="POST" class="OrderNow">
                <fieldset style="padding: 3% auto;">
                    <!-- The <fieldset> tag is used to group related elements in a form.
                    The <fieldset> tag draws a box around the related elements. -->
                    <legend style="font-size: 20px; font-weight: bold; margin: 2% auto; ">
                        <!-- The <legend> tag defines a caption for the <fieldset> element. -->
                        Selected Food
                    </legend>
                    <div class="foodMenuBoxImg">
                        <?php
                        // Check whether the Image is available or not
                        if($ImageName=="")
                        {
                            // image Not Available
                            echo "<div class='failure'>Image Not Available!</div>";
                        }
                        else
                        {
                            // image is available
                            ?>
                            <img src="<?php echo SITEURL; ?>BackEnd/FoodPage/Images/.<?php echo $ImageName; ?>" alt="foodMenuPizza" class="FoodImgResponsive imgCurve">
                            <?php
                        }
                        
                        ?>
                    </div>
                    <div class="foodMenuBoxDescription">
                        <h4>
                            <?php echo $Title; ?>
                            <input type="hidden" name="Food" value="<?php echo $Title; ?>">
                        </h4>
                        <p class="foodPrice">
                            <?php echo $Price; ?>
                            <input type="hidden" name="Price" value="<?php echo $Price; ?>">
                        </p>
                        <div class="Quantity">
                            Quantity
                        </div>
                        <input type="number" name="Quantity" class="inputResponsive" value="1" required>
                    </div>
                </fieldset>
                <fieldset>
                    <legend style="font-size: 20px; font-weight: bold; margin: 2% auto;">
                        Delivery Details
                    </legend>
                    <!-- Full Name -->
                    <div class="FormLabel">
                        Full Name
                    </div>
                    <input type="text" name="FullName" class="inputResponsiveDD" placeholder="Eg:Shreya" required>
                    <!-- Phone Number -->
                    <div class="FormLabel">
                        Phone Number
                    </div>
                    <input type="number" name="PhoneNumber" class="inputResponsiveDD" placeholder="Eg:9529222495" required>
                    <!-- Email -->
                    <div class="FormLabel">
                        Email
                    </div>
                    <input type="email" name="Email" class="inputResponsiveDD" placeholder="Eg:shreyavbarad72@gmail.com" required>
                    <!-- Address -->
                    <div class="FormLabel">
                        Address
                    </div>
                    <input type="text" name="Address" class="inputResponsiveDD" placeholder="Eg:Surana Nagar, Aurangabad, Maharashtra " required>
                    <!-- Submit -->
                    <input type="submit" name="Submit" value="Confirm Order" class="orderButton orderButtonColor">
                </fieldset>
            </form>
            <?php
            
            // Check Whether the Submit Button is Clicked or not
            if(isset($_POST['Submit']))
            {
                // Get all the Details
                $Food=$_POST['Food'];
                $Price=$_POST['Price'];
                $Quantity=$_POST['Quantity'];
                $Total=$Price * $Quantity; 
                // Total = Price * Quantity
                date_default_timezone_set('Asia/Kolkata');
                $OrderDate=date("d-m-y h:i:s");
                // Y==>Year
                // m==>Month
                // d==>Date
                // h==>Hour
                // i==>Minute
                // s==>Second
                // a==>Am/Pm
                $Status="Ordered";
                $CustomerName=$_POST['FullName'];
                $CustomerContact=$_POST['PhoneNumber'];
                $CustomerEmail=$_POST['Email'];
                $CustomerAddress=$_POST['Address'];

                // Save the order in the Database
                $sql2="INSERT INTO table_order SET
                Food='$Food',
                Price=$Price,
                Quantity=$Quantity,
                Total=$Total,
                OrderDate='$OrderDate',
                Status='$Status',
                CustomerName='$CustomerName',
                CustomerContact='$CustomerContact',
                CustomerEmail='$CustomerEmail',
                CustomerAddress='$CustomerAddress'
                ";

                // Execute the Query
                $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
                $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
        
                $Result2=mysqli_query($conn,$sql2);
                // Check Whether the query is executed successfully or not
                if($Result2==True)
                {
                    
                    // Query Executed Successfully
                    ?>
                    <script>
                        window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/';
                    </script>
                    <?php
                }
                else
                {
                    // Query not executed successfully
                    $_SESSION['Order']="<div class='failure'>Food Ordered Failed!</div>";
                    ?>
                    <script>
                        window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/';
                    </script>
                    <?php
                }
            }
            ?>
        </div>
    </section>
    <!-- The Food Order Form Ends Here -->


    <!-- The SocialMedia Section Starts Here! -->
    <section class="SocialMedia">
        <div class="container alignCenter">
            <ul>
                <li>
                    <a href="#">
                        <i class="bi bi-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-twitter"></i>
                    </a>
                </li>
            </ul>
        </div> 
    </section>
    <!-- The SocialMedia Section Ends Here! -->

    <!-- The Footer Section Starts Here! -->
    <section class="Footer">
        <div class="container alignCenter">
            <p>All Rights Reserved. Designed by <a href="#">Shreya Barad</a>.</p>
        </div>
    </section>
    <!-- The Footer Section Ends Here! -->  
    
    
</body>
</html>
