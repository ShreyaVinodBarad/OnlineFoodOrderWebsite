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
            <form action="<?php echo SITEURL;?>FoodSearch.php" method="POST">
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
            // Create sql query to display category from database
            $sql="SELECT * FROM table_category WHERE Active='Yes' LIMIT 3";
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

            <?php
            // SQL Query
            $sql2="SELECT * FROM table_food WHERE Active='Yes' AND Featured='Yes' LIMIT 6";
            // Execute Query
            $Result2=mysqli_query($conn,$sql2);
            // Count Rows
            $Count2=mysqli_num_rows($Result2);
            // Check Whether the food available or not
            if($Count2>0)
            {
                // Food Available
                while($row2=mysqli_fetch_assoc($Result2))
                {
                    // Get all the Values
                    $Id2=$row2['Id'];
                    $Title2=$row2['Title'];
                    $Price=$row2['Price'];
                    $Description=$row2['Description'];
                    $ImageName2=$row2['ImageName'];
                    ?>

                    <div class="foodMenuBox">
                    <div class="foodMenuBoxImg">
                        <?php
                        if($ImageName2=="")
                        {
                            // Image Not Avaialble
                            // Display the Message
                            echo "<div class='failure'> Image Not Available!</div>";
                        }
                        else
                        {
                            // Image is Available
                            ?>
                            <img src="<?php echo SITEURL; ?>BackEnd/FoodPage/Images/.<?php echo $ImageName2;?>" alt="foodMenuPizza" class="ImgResponsive imgCurve">
                            <?php
                        }
                        ?>
                    </div>
                    <div class="foodMenuBoxDescription">
                        <h4>
                            <?php
                            echo $Title2
                            ?>
                        </h4>
                        <p class="foodPrice">
                            <?php
                            echo $Price;
                            ?>
                        </p>
                        <p class="foodDescription">
                            <?php
                            echo $Description;
                            ?> 
                        </p>
                        <br>
                        <a href="OrderNow.php" class="orderButton orderButtonColor">
                            Order Now
                        </a>
                    </div>
                    <div class="clearfix">   
                    </div>
                    </div>



                    <?php
                }
            }
            else
            {
                // Food Not Available
                echo "<div class='failure'> Food Not Available!</div>";
            }
            
            
            ?>
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