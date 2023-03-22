<!DOCTYPE html>
<html>
<head>
    <title>Online Food Delivery Website-Admin Panel</title>
    <link rel="stylesheet" href="../HomePage/index.css">
    <link rel="stylesheet" href="../CategoryPage/CategoryPage.css">
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
                <Strong>Category</Strong>
            </h1>
            <br>

            <?php
            
            if(isset($_SESSION['addCategory'])){
                echo ($_SESSION['addCategory']);
                // Displaying Session Message

                unset($_SESSION['addCategory']);
                // Removing Session Message
            }
            ?>

            <a href="AddCategory.php" class="AddAdminButton">
                Add Category
            </a>
            <br>
            <br>

            <table class="FullWidthTable">
                <tr>
                    <th>Sr.No</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Actions</th>
                </tr>

            </table>
        </div>
    </div>
    <!-- Main Content Section Ends Here -->

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