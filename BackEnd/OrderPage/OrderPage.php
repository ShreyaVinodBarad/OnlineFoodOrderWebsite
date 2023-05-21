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
    <div class="MainContentOrderPage">
        <div class="Wrapper">
            <h1>
                <Strong>Order</Strong>
            </h1>

            <?php
            if(isset($_SESSION['OrderUpdate']))
            {
                echo ($_SESSION['OrderUpdate']);
                // Displaying Session Message
                unset($_SESSION['OrderUpdate']);
                // Removing Session Message
            }
            ?>
            <table class="FullWidthTable">  
                <tr>
                    <th>Sr.No.</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>OrderDate</th>
                    <th>Status</th>
                    <th>CustomerName</th>
                    <th>CustomerContact</th>
                    <th>CustomerEmail</th>
                    <th>CustomerAddress</th>
                    <th>Actions</th>
                </tr>
                <!-- PHP COde -->
                <?php
                // Get all the orders from the database
                $sql="SELECT * FROM table_order ORDER BY Id DESC";
                // Execute the query
                $conn=mysqli_connect("localhost:3307","root","") or die(mysqli_connect_error());
                $Database=mysqli_select_db($conn,"assignment-03and04") or die(mysqli_error($conn));
                $Result=mysqli_query($conn,$sql);
                // Count the rows
                $Count=mysqli_num_rows($Result);
                $SrNo=1;
                // Serial Number Starts from 1
                if($Count>0)
                {
                    // Order Available
                    while($row=mysqli_fetch_assoc($Result))
                    {
                        $Id=$row['Id'];
                        $Food=$row['Food'];
                        $Price=$row['Price'];
                        $Quantity=$row['Quantity'];
                        $Total=$row['Total'];
                        $OrderDate=$row['OrderDate'];
                        $Status=$row['Status'];
                        $CustomerName=$row['CustomerName'];
                        $CustomerContact=$row['CustomerContact'];
                        $CustomerEmail=$row['CustomerEmail'];
                        $CustomerAddress=$row['CustomerAddress'];
                        ?>
                        <tr>
                            <td><?php echo $SrNo++; ?></td>
                            <td><?php echo $Food; ?></td>
                            <td><?php echo $Price; ?></td>
                            <td><?php echo $Quantity; ?></td>
                            <td><?php echo $Total; ?></td>
                            <td><?php echo $OrderDate; ?></td>
                            <td>
                                <?php
                                if($Status=="Ordered")
                                {
                                    echo "<label>$Status</label>";
                                }
                                elseif($Status=="On Delivery")
                                {
                                    echo "<label style='color:darkorange;'>$Status</label>";
                                }
                                
                                elseif($Status=="Delivered")
                                {
                                    echo "<label style='color:green;'>$Status</label>";
                                }
                                
                                elseif($Status=="Cancelled")
                                {
                                    echo "<label style='color:red;'>$Status</label>";
                                }
                                
                                ?>
                            </td>
                            <td><?php echo $CustomerName; ?></td>
                            <td><?php echo $CustomerContact; ?></td>
                            <td><?php echo $CustomerEmail; ?></td>
                            <td><?php echo $CustomerAddress; ?></td>
                            <td>
                                <a href="<?php echo SITEURL;?>BackEnd/OrderPage/UpdateOrder.php?id=<?php echo $Id;?>" class="UpdateAdminButton">Update Order</a>
                            </td>
                        </tr>               

                        <?php
                    }
                }
                else
                {
                    // Order Not Available
                    echo "<tr><td colspan='12' class='failure'>Order Not Available!</td></tr>";
                }

                
                
                
                
                
                
                
                
                
                
                ?>
                       
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