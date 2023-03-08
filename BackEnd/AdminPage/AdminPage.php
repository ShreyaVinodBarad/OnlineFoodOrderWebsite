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
                <Strong>Admin</Strong>
            </h1>
            <br>

            <?php
            if(isset($_SESSION['AddMessage'])){
                echo ($_SESSION['AddMessage']);
            }
            ?>
            <a href="AddAdminPage.php" class="AddAdminButton">
                Add Admin
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
                <tr>
                    <td>1</td>
                    <td>Shreya Barad</td>
                    <td>ShreyaBarad</td>
                    <td>
                        <a href="#" class="UpdateAdminButton">Update Admin</a>
                        <a href="#" class="DeleteAdminButton">Delete Admin</a>
                    </td>
                </tr>
            </table>
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