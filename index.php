<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Food Delivery Website</title>

    <!-- Linking CSS File -->
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap Icons Links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
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
    
    <!-- The FoodSearch Section Starts Here! -->
    <section class="FoodSearch alignCenter">
        <div class="container">
            <form action="">
                <input type="search" name="search" placeholder="Search for the Food Here....">
                <input type="submit" name="submit" value="Search" class="searchBtn searchBtnColor">
            </form>
        </div>
    </section>
    <!-- The FoodSearch Section Ends Here! -->

    
    <!-- The FoodCategories Section Starts Here! -->
    <section class="FoodCategories">
        <div class="container ">
            <h2 class="alignCenter">
                Inspiration for your First Order
            </h2>
            <?php
            define('SITEURL','http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/');
            // Create sql query to display category from database
            $sql="SELECT * FROM table_category";
            // Execute the query
            $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
            $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
            $Result=mysqli_query($conn,$sql);
            // Count Rows to check whether the categoery is available or not
            $Count=mysqli_num_rows($Result);
            if($Count>0)
            {
                // Categories is available
                while($row=mysqli_fetch_assoc($Result))
                {
                    // Get the values like Id, Title, ImageName
                    $Id=$row['Id'];
                    $Title=$row['Title'];
                    $ImageName=$row['ImageName'];
                    ?>
                    <div class="box-3 floatContainer">
                    <a href="./Categories/Pizza/Pizza.html">
                    <?php
                    if($ImageName=="")
                    {
                        // Display the Message
                        echo "<div class='failure'> Image Not Available!</div>";
                    }
                    else{
                        // Image is Available
                        ?>
                        <img src="<?php echo SITEURL; ?>BackEnd/CategoryPage/Images/.<?php echo $ImageName;?>" alt="Pizza" class="ImgResponsiveFoodCategories imgCurve">
                        <?php                        
                    }
                    ?>
                    <h3 class="floatText floatTextWhite">
                        <?php echo $Title; ?>
                    </h3>
                    </a>
                    </div>

                    <?php
                }
            }
            else
            {
                // Category not available
                echo "<div class='failure'> Category Not Available!</div>";
            }
            ?>
            <div class="clearfix">
            </div>
        </div>
    </section>
    <!-- The FoodCategories Section Ends Here! -->

    
    <!-- The FoodMenu Section Starts Here! -->
    <section class="FoodMenu">
        <div class="container">
            <h2 class="alignCenter">
                Explore Foods
            </h2>
            
            <div class="foodMenuBox">
                <div class="foodMenuBoxImg">
                    <img src="./Images/Food Menu/Greek Pizza.jfif" alt="foodMenuPizza" class="ImgResponsive imgCurve">
                </div>
                <div class="foodMenuBoxDescription">
                    <h4>
                        Greek Pizza
                    </h4>
                    <p class="foodPrice">
                        Rs.450
                    </p>
                    <p class="foodDescription">
                        This is a kind of Pizza. Its originated from US. Its main ingredients are Pizza dough, cheese, tomato sauce. 
                    </p>
                    <br>
                    <a href="OrderNow.php" class="orderButton orderButtonColor">
                        Order Now
                    </a>
                </div>
                <div class="clearfix">   
                </div>
            </div>

            <div class="foodMenuBox">
                <div class="foodMenuBoxImg">
                    <img src="./Images/Food Menu/Chicago Pizza.webp" alt="foodMenuPizza" class="ImgResponsive imgCurve">
                </div>
                <div class="foodMenuBoxDescription">
                    <h4>
                        Chicago Pizza
                    </h4>
                    <p class="foodPrice">
                        Rs.550
                    </p>
                    <p class="foodDescription">
                        This is a kind of Pizza. Its originated from US. Its main ingredients are Pizza dough, cheese, tomato sauce.
                    </p>
                    <br>
                    <a href="OrderNow.php" class="orderButton orderButtonColor">
                        Order Now
                    </a>
                </div>
                <div class="clearfix">   
                </div>
            </div>
            
            <div class="foodMenuBox">
                <div class="foodMenuBoxImg">
                    <img src="./Images/Food Menu/Sicilian Pizza.jpg" alt="foodMenuPizza" class="ImgResponsive imgCurve">
                </div>
                <div class="foodMenuBoxDescription">
                    <h4>
                        Sicilian Pizza
                    </h4>
                    <p class="foodPrice">
                        Rs.500
                    </p>
                    <p class="foodDescription">
                        This is a kind of Pizza. Its originated from US. Its main ingredients are Pizza dough, cheese, tomato sauce. 
                    </p>
                    <br>
                    <a href="OrderNow.php" class="orderButton orderButtonColor">
                        Order Now
                    </a>
                </div>
                <div class="clearfix">   
                </div>
            </div>

            <div class="foodMenuBox">
                <div class="foodMenuBoxImg">
                    <img src="./Images/Food Menu/California Pizza.jpg" alt="foodMenuPizza" class="ImgResponsive imgCurve">
                </div>
                <div class="foodMenuBoxDescription">
                    <h4>
                        California Pizza
                    </h4>
                    <p class="foodPrice">
                        Rs.400
                    </p>
                    <p class="foodDescription">
                        This is a kind of Pizza. Its originated from US. Its main ingredients are Pizza dough, cheese, tomato sauce. 
                    </p>
                    <br>
                    <a href="OrderNow.php" class="orderButton orderButtonColor">
                        Order Now
                    </a>
                </div>
                <div class="clearfix">   
                </div>
            </div>

            <div class="foodMenuBox">
                <div class="foodMenuBoxImg">
                    <img src="./Images/Food Menu/Neapolitan Pizza.jpg" alt="foodMenuPizza" class="ImgResponsive imgCurve">
                </div>
                <div class="foodMenuBoxDescription">
                    <h4>
                        Neapolitan Pizza
                    </h4>
                    <p class="foodPrice">
                        Rs.550
                    </p>
                    <p class="foodDescription">
                        This is a kind of Pizza. Its originated from US. Its main ingredients are Pizza dough, cheese, tomato sauce. 
                    </p>
                    <br>
                    <a href="OrderNow.php" class="orderButton orderButtonColor">
                        Order Now
                    </a>
                </div>
                <div class="clearfix">   
                </div>
            </div>

            <div class="foodMenuBox">
                <div class="foodMenuBoxImg">
                    <img src="./Images/Food Menu/Detroit Pizza.jpg" alt="foodMenuPizza" class="ImgResponsive imgCurve">
                </div>
                <div class="foodMenuBoxDescription">
                    <h4>
                        Detroit Pizza
                    </h4>
                    <p class="foodPrice">
                        Rs.600
                    </p>
                    <p class="foodDescription">
                        This is a kind of Pizza. Its originated from US. Its main ingredients are Pizza dough, cheese, tomato sauce. 
                    </p>
                    <br>
                    <a href="OrderNow.php" class="orderButton orderButtonColor">
                        Order Now
                    </a>
                </div>
                <div class="clearfix">   
                </div>
            </div>

            <div class="clearfix">
            </div>
            </div>
            
        </div>
    </section>
    <!-- The FoodMenu Section Ends Here! -->

    
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