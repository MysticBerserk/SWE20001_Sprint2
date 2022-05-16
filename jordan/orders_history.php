<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Online Catering System">
        <meta name="keywords" content="HTML">
        <meta name="author" content="Jordan Seow">
        <title>Orders History</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <?php
            include ("orders_history_process.php");
            require_once ("navigation.php");
            
            $sql = "SELECT * FROM history";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
  
        ?>
        
        <header><h1>Orders History</h1></header>

        <form action = "orders_history_process.php" method = "POST">
            <div class = "order1">
                
                <div class = "order_box">
                    <img class = "order_image" src="images/total.png" alt="Total Orders">
                    <p class = "order_text"><a class href="total_orders.php">Total Orders</a></p>
                </div>

                <div class = "order_box">
                    <img class = "order_image" src="images/pending.png" alt="Pending Orders">
                    <p class = "order_text"><a class href="pending_orders.php">Pending Orders</a></p>
                </div>

                <div class = "order_box">
                    <img class = "order_image" src="images/completed.png" alt="Completed Orders">
                    <p class = "order_text"><a class href="completed_orders.php">Completed Orders</a></p>
                </div>

                <div class = "order_box">
                    <img class = "order_image" src="images/cancelled.png" alt="Cancelled Orders">
                    <p class = "order_text"><a class href="cancelled_orders.php">Cancelled Orders</a></p>
                </div>

            </div>

            <div class = "order_amount">
                <h2 id = "order_amount">Order History: <?php echo $resultCheck?></h2>
                
                <div class = "order_list">
                    <div class = "order_list_header">
                        <p class = "order_header_attr">Order ID</p>
                        <p class = "order_header_attr">Food Menu Items</p>
                        <p class = "order_header_attr">Delivery Address</p>
                        <p class = "order_header_attr">Delivery Time</p>
                    </div>

                    <?php if($resultCheck > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <div class = "order_list_row">
                                <div class = "order_list_flex">
                                    <p class="order_list_attributes"> <?php echo $row['orderid']?> </p>
                                    <p class="order_list_attributes"> <?php echo $row['items']?> </p>
                                    <p class="order_list_attributes"> <?php echo $row['address']?> </p>
                                    <p class="order_list_attributes"> <?php echo $row['time']?> </p>
                                </div>
                                <div class = "order_list_flex2">

                                    <?php $dbselected = $row['delivery'];?>
                                    
                                    <label for="delivery" id="delivery">Delivery Status: </label>
                                    <select name="option" id="option">
                                        <option value="In Progress"<?php if($dbselected == "In Progress"){echo "selected";}?>>In Progress</option>
                                        <option value="Out For Delivery"<?php if($dbselected == "Out For Delivery"){echo "selected";}?>>Out For Delivery</option>
                                        <option value="Complete"<?php if($dbselected == "Complete"){echo "selected";}?>>Complete</option>
                                    </select>

                                    <input type = "hidden" name = "id" value =<?php echo $row['id']; ?>>
                                    <input type = "submit" id = "submit" name = "submit" value = "submit">
                                    
                                    <a class = "order_list_button" href="orders_history_process.php?delete=<?php echo $row['id']; ?>">Delete</a>
                                </div>
                            </div> 

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

            <button class = "admin_module_button"><a href="admin_module.php">Admin Module</a></button>           

        </form>

    </body>

</html>