<!DOCTYPE html>
<html>
<head>
    <title>Online Food Delivery Website-Admin Panel</title>
    <link rel="stylesheet" href="../AdminPage/AdminPage.css">
    <link rel="stylesheet" href="index.css">

</head>
<body>
    <!-- Menu Section Starts Here -->
    <?php
     include('../Section/MenuSection.php');   
    ?> 
    <!-- Menu Section Ends Here -->

    <!-- Main Content Section Starts Here -->
    <div class="MainContent">
        <div class="Wrapper">
            <h1>
                <Strong>DashBoard</Strong>
            </h1>
            <?php
            if(isset($_SESSION['UserLogin'])){
                echo ($_SESSION['UserLogin']);
                // Displaying Session Message

                unset($_SESSION['UserLogin']);
                // Removing Session Message
            }
            ?>
            <div class="Column4 AlignCenter">
                <h2>
                    5
                </h2>
                Categories
            </div>
            <div class="Column4 AlignCenter">
                <h2>
                    5
                </h2>
                Categories
            </div>
            <div class="Column4 AlignCenter">
                <h2>
                    5
                </h2>
                Categories
            </div>
            <div class="Column4 AlignCenter">
                <h2>
                    5
                </h2>
                Categories
            </div>
            <div class="ClearFix">
            </div>
        </div>
    </div>
    <!-- Main Content Section Ends Here -->

    <!-- Footer Section Starts Here -->
    <?php
     include '../Section/FooterSection.php';
    ?>
    <!-- Footer Section Ends Here -->

</body>
</html>