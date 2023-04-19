<?php
define('SITEURL','http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Online Food Delivery Website-Admin Panel</title>
    <link rel="stylesheet" href="../HomePage/index.css">
    <link rel="stylesheet" href="OrderPage.css">
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
                <Strong>Update Order</Strong>
            </h1>
            <br>

            <!-- PHP Code Goes Here -->
            <?php
            // Check whether the Id is set or not
            if(isset($_GET['id']))
            {
                // Get the Order Details based on Id
                $Id=$_GET['id'];
                // SQL Query to get the order details
                $sql="SELECT * FROM table_order WHERE Id='$Id'";
                // Execute the query
                $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
                $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
                $Result=mysqli_query($conn,$sql);
                // Count Rows
                $Count=mysqli_num_rows($Result);
                if($Count==1)
                {
                    // Details Available
                    $row=mysqli_fetch_assoc($Result);
                    $Food=$row['Food'];
                    $Price=$row['Price'];
                    $Quantity=$row['Quantity'];
                    $Total=$row['Total'];
                    $Status=$row['Status'];
                    $CustomerName=$row['CustomerName'];
                    $CustomerContact=$row['CustomerContact'];
                    $CustomereEmail=$row['CustomerEmail'];
                    $CustomerAddress=$row['CustomerAddress'];

                }
                else
                {
                    // Details not Available
                    // Redirect to Order Page
                    ?>
                    <script>
                        window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/OrderPage/OrderPage.php';
                    </script>
                    <?php
                }
            }
            else
            {
                // Redirect to Manage Order Page
                ?>
                <script>
                    window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/OrderPage/OrderPage.php';
                </script>
                <?php
            }
            ?>



            <!-- PHP Code Ends Here -->
            <form action="" method="POST">
                <table class="FullWidthTable">
                    <tr>
                        <td>Food</td>
                        <td><b><?php echo $Food; ?></b></td>
                    </tr>

                    <tr>
                        <td>Price</td>
                        <td><b><?php echo $Price; ?></b></td>
                    </tr>

                    <tr>
                        <td>
                            Quantity
                        </td>
                        <td>
                            <input type="number" name="Quantity" value="<?php echo $Quantity; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Total
                        </td>
                        <td>
                            <input type="number" name="Total" value="<?php echo $Total; ?>">
                        </td>
                    </tr>



                    <tr>
                        <td>
                            Status
                            
                        </td>
                        <td>
                            <select name="Status">
                                <option <?php if($Status=="Ordered") echo "selected";?> value="Ordered">Ordered</option>
                                <option <?php if($Status=="On Delivery") echo "selected";?> value="On Delivery">On Delivery</option>
                                <option <?php if($Status=="Delivered") echo "selected";?> value="Delivered">Delivered</option>
                                <option <?php if($Status=="Cancelled") echo "selected";?> value="Cancelled">Cancelled</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Customer Name
                        </td>
                        <td>
                            <input type="text" name="CustomerName" value="<?php echo $CustomerName; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Customer Contact
                        </td>
                        <td>
                            <input type="text" name="CustomerContact" value="<?php echo $CustomerContact;  ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Customer Email
                        </td>
                        <td>
                            <input type="text" name="CustomerEmail" value="<?php echo $CustomereEmail; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Customer Address
                        </td>
                        <td>
                            <textarea name="CustomerAddress" cols="80" rows="10"><?php echo $CustomerAddress; ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="Id" value="<?php echo $Id; ?>">
                            <input type="hidden" name="Price" value="<?php echo $Price; ?>">
                            <input type="submit" value="Update Order" name="Submit" class="UpdateAdminButton">
                        </td>
                    </tr>
                </table>
            </form>

            <!-- PHP Code -->
            <?php
            // Check whether the update button is clicked or not
            if(isset($_POST['Submit']))
            {
                // Get all the values from the Form
                $Id=$_POST['Id'];
                $Price=$_POST['Price'];
                $Quantity=$_POST['Quantity'];
                $Total=$Price * $Quantity;
                $Status=$_POST['Status'];
                $CustomerName=$_POST['CustomerName'];
                $CustomerContact=$_POST['CustomerContact'];
                $CustomerEmail=$_POST['CustomerEmail'];
                $CustomerAddress=$_POST['CustomerAddress'];
                // Update the Values
                $sql2="UPDATE table_order SET 
                Quantity=$Quantity,
                Total=$Total,
                Status='$Status',
                CustomerName='$CustomerName',
                CustomerContact='$CustomerContact',
                CustomerEmail='$CustomerEmail',
                CustomerAddress='$CustomerAddress'
                WHERE Id=$Id
                ";
                // Execute the Query

                $Result2=mysqli_query($conn,$sql2);
                // Check whether the data is updated or not
                // Redirect to OrderPage with a message
                if($Result2==true)
                {
                    // Updated
                    $_SESSION['OrderUpdate']="<div class='success'>Order Updated!</div>";
                    ?>
                    <script>
                        window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/OrderPage/OrderPage.php';
                    </script>
                    <?php
                }
                else
                {
                    // Failed to Update
                    $_SESSION['OrderUpdate']="<div class='failure'>Order Failed to Update!</div>";
                    ?>
                    <script>
                        window.location.href='http://localhost:8080/SkillVertexInternship/ASSIGNMENT03SKILLVERTEX/BackEnd/OrderPage/OrderPage.php';
                    </script>
                    <?php
                }

            }
            
            
            
            ?>
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