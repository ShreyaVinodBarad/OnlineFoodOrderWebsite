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
                <?php
                // SQL Query 
                $sql="SELECT * FROM table_category";
                // Execute the query
                $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
                $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
                $result=mysqli_query($conn, $sql);
                // Count Rows
                $count=mysqli_num_rows($result);
                ?>
                <h2>
                    <?php echo $count; ?>
                </h2>
                Categories
            </div>
            <div class="Column4 AlignCenter">
            <?php
                // SQL Query 
                $sql2="SELECT * FROM table_food";
                // Execute the query
                $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
                $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
                $result2=mysqli_query($conn, $sql2);
                // Count Rows
                $count2=mysqli_num_rows($result2);
                ?>
                <h2>
                    <?php echo $count2; ?>
                </h2>
                Foods
            </div>
            <div class="Column4 AlignCenter"><?php
                // SQL Query 
                $sql3="SELECT * FROM table_order";
                // Execute the query
                $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
                $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
                $result3=mysqli_query($conn, $sql3);
                // Count Rows
                $count3=mysqli_num_rows($result3);
                ?>
                <h2>
                    <?php echo $count3; ?>
                </h2>
                Total Orders
            </div>
            <div class="Column4 AlignCenter">
                <?php
                // Create SQL Query to get the total revenue genterated
                // Aggreate Function in SQL 
                $sql4="SELECT SUM(total) AS Total FROM table_order WHERE status='Delivered'";
                // Execute the Query 
                $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
                $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
                $result4=mysqli_query($conn, $sql4);
                // Get the Value
                $row4=mysqli_fetch_assoc($result4);
                // Get the Total Revenue
                $total_reveue=$row4['Total'];
                ?>
                <h2>
                    <?php echo $total_reveue; ?>
                </h2>
                Revenue Generated
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