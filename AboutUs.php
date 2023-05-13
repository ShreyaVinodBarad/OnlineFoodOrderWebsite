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
    <link rel="stylesheet" href="AboutUs.css">

    <!-- Bootstrap Icons Links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<style>
    h3{
        color:crimson;
        font-size: 1.5rem;
    }
</style>
<body>
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
                        <a href="AboutUs.php">
                            About Us
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clearfix">
            </div>
        </div>
    </section>
    <!-- The NavBar Section Ends Here! -->
    
     
    <!-- The FoodCategories Section Starts Here! -->
    <section class="FoodMenu">
        <div class="container ">
            <h1 class="alignCenter">
                About Us
            </h1>
            <h3 class="AboutUs alignCenter">
            "Here, at our Restaurant, we understand cravings. We know how important it is to get your food fast, and we have a 1-hour delivery 
            guarantee, or you get your money back.
            While we prepare our food fast, we develop the flavor slowly. Our dough rises over the night, and our meat is always marinated. 
            That's why every chicken tender, every beef skewer, and every bun taste like heaven.
            Don't let hunger take control of you. Beat it with Delicious Food at our Restaurant!"
            </h3>
            <h1 class="alignCenter ">
                Connect With Us
            </h1>
            <h3 class="AboutUs alignCenter">
                We would love to respond to your queries and help you succeed. Free feel to get in touch with us!
            </h3>
            <h3 class="AboutUs alignCenter">
                Our Contact Details
                <br>Email: shreyavbarad72@gmail.com
                <br>Phone: +91 9529222495
                <br>Address: Cannought Garden, Chhatrapati Sambhaji Nagar, Maharashtra, Pin Code-431001
            </h3>
            <div class="clearfix">
            </div>
        </div>
    </section>
    <!-- The FoodCategories Section Ends Here! -->
 
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