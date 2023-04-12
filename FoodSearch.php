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
    <link rel="stylesheet" href="Foods.css">

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
   <!-- The FoodMenu Section Starts Here! -->
    <section class="FoodMenu">
        <div class="container">
            <?php
            global $Search;
            if(isset($_POST['search']))
            {
                $Search=$_POST['search'];
            }
            ?>
            <h2 class="alignCenter">
                The Results of Your Search <a href="#" class="Search">
                <?php
                echo $Search;
                ?>
                </a> are:
            </h2>
            <?php
            if(isset($_POST['search'])){
            // Get the Searched Keyword
            $Search=$_POST['search'];
            //  SQL Query to get foods based on search keyword
            $sql="SELECT * FROM table_food WHERE Title LIKE '%$Search%' OR Description LIKE '%$Search%' ";
            // Execute the Query
            $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
            $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
            $Result = mysqli_query($conn,$sql);
            // Count Rows
            $Count=mysqli_num_rows($Result);
            // Check Whether the Food is available or not
            if($Count>0)
            {
                // Food Available
                while($row=mysqli_fetch_assoc($Result))
                {
                    $Id=$row['Id'];
                    $Title=$row['Title'];
                    $Price=$row['Price'];
                    $Description=$row['Description'];
                    $ImageName=$row['ImageName'];
                    ?>
                    <div class="foodMenuBox">
                    <div class="foodMenuBoxImg">
                        <?php
                        if($ImageName=="")
                        {
                            // Image Not Available
                            echo "<div class='failure'> Image Not Available!</div>";
                        }
                        else
                        {
                            // Image Available
                            ?>
                            <img src="<?php echo SITEURL; ?>BackEnd/FoodPage/Images/.<?php echo $ImageName;?>" alt="foodMenuMomos" class="ImgResponsive imgCurve">
                            <?php
                        }
                        ?>
                        </div>
                        <div class="foodMenuBoxDescription">
                            <h4>
                                <?php
                                    echo $Title
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
                echo "<div class='failure'>Food Not Found!</div>";
            }

            ?>
            <?php
            }
            ?>
            <div class="clearfix">
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