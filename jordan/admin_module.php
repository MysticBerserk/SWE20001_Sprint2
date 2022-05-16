<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Online Catering System">
        <meta name="keywords" content="HTML">
        <meta name="author" content="Jordan Seow">
        <title>Admin Module</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <?php
            require_once ("navigation.php");
        ?>

        <header><h1>Admin Module</h1></header>

        <aside>
            <ul>
                <li><a class = sidebar_a href="admin_module.php">Admin Module</a></li>
                <li><a class = sidebar_a  href="#daily_sales">Daily Sales</a></li>
                <li><a class = sidebar_a  href="#customer_orders">Customer Orders</a></li>
            </ul>
        </aside>
        
        <form>
            <div class = "order">
                
                <div class = "order_box">
                    <img class = "order_image" src="images/total.jpg" alt="Total Orders">
                    <p class = "order_text"><a class = order_a  href="total_orders.php">Total Orders</a></p>
                </div>

                <div class = "order_box">
                    <img class = "order_image" src="images/pending.jpg" alt="Pending Orders">
                    <p class = "order_text"><a class = order_a  href="pending_orders.php"></a>Pending Orders</p>
                </div>

                <div class = "order_box">
                    <img class = "order_image" src="images/completed.jpg" alt="Completed Orders">
                    <p class = "order_text"><a class = order_a  href="completed_orders.php"></a>Completed Orders</p>
                </div>

                <div class = "order_box">
                    <img class = "order_image" src="images/cancelled.png" alt="Cancelled Orders">
                    <p class = "order_text"><a class = order_a  href="cancelled_orders.php"></a>Cancelled Orders</p>
                </div>

            </div>
        

            <div class = "sales_box">
                <h2 id="daily_sales">Daily Sales</h2>
                <img id="sales_image" src="images/daily_sales.png" alt="Total Sales">
            </div>

            <div class = "customer_box">
                <h2 id="customer_orders">Customer Orders</h2>
                <div class = "section_details">
                    <div class = "customer_details">
                        <p class = primary_details>Customer ID</p>
                        <p>101223358</p>
                    </div>
                    <div class = "customer_details">
                        <p class = primary_details>Name</p>
                        <p>Jordan Seow</p>
                    </div>
                    <div class = "customer_details">
                        <p class = primary_details>Address</p>
                        <p>Q5B, 93350 Kuching, Sarawak</p>
                    </div>
                    <div class = "customer_details">
                        <p class = primary_details>Payment Type</p>
                        <p>Debit Card</p>
                    </div>
                    <div class = "customer_details">
                        <p class = primary_details>Date</p>
                        <p>4/7/2022</p>
                    </div>
                    <div class = "customer_details">
                        <p class = primary_details>Total</p>
                        <p>RM100.78</p>
                    </div>
                </div>
            </div>
        </form>

    </body>

</html>