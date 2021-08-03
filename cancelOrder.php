<?php
include('includes/myOrders_auth.php');
include_once("includes/config.php");
include_once("includes/checkout_header.php");

//storing the product  of orders by id
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
}

?>

<body>
    <header class="header cart-header  col-12">

        <div class="container text-uppercase col-12">

            <nav class="navbar navbar-expand-md navbar-light col-12">
                <div class="d-flex justify-content-between align-items-center search-box col-lg-12 offset-lg-0 col-8 offset-0">
                    <div class="d-flex justify-content-center text-center">
                        <div class="logo ">
                            <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" class="img-fluid"></a>
                        </div>
                    </div>


                    <div class="cart-profile">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown px-3">
                                <?php
                                if (isset($_SESSION['username'])) {
                                ?>
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo $_SESSION['username']; ?>
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <a class="nav-link " href="user_login.php">
                                        Login
                                    </a>
                                <?php
                                }
                                ?>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item fas fa-user" href="myProfile.php"> <span class="ml-1">My Profile</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item fas fa-truck" href="myOrders.php"><span class="ml-1">My Orders</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item fas fa-power-off" href="user_logout.php"> <span class="ml-1">Logout</span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>


            </nav>
        </div>
    </header>
    <!-- ********************************************header end******************************************************** -->

    <?php
    if (isset($_POST['cancelOrder'])) {
        $reason = $_POST['cancelReason'];
        if (!empty($reason)) {
            $order_id = $_POST['order_id'];
            $order_status = 'Order Cancelled';

            //Insert query
            $sql = "INSERT INTO `orders_tracking`( `order_id`, `orderStatus`, `reason`) VALUES ('$order_id','$order_status','$reason')";

            if (mysqli_query($conn, $sql)) {
                $sqlUpdate = "UPDATE `orders` SET `orderStatus`='$order_status' WHERE id='$order_id'";
                if (mysqli_query($conn, $sqlUpdate)) {
    ?>
                    <script>
                        window.location.href = "myOrders.php";
                    </script>
    <?php
                }
            }
        }
    }

    ?>


    <div class="container mt-5 mb-5 h-100 pt-5">
        <div class="mt-5 h-100">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-danger">Order Cancellation</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label class="font-weight-semibold" for="cancelOrderReason">Enter
                                    Reason:</label>
                                <input type="text" class="form-control" name="cancelReason" id="cancelOrderReason" placeholder="Reason to cancel order..">
                                <input type="hidden" name="order_id" value="<?php echo $_GET['id']; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" name="cancelOrder" class="btn btn-danger m-t-30">Yes! Cancel my order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include("includes/viewOrderFooter.php"); ?>