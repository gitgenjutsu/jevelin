<?php
include('includes/myOrders_auth.php');
include_once("includes/config.php");
include_once("includes/checkout_header.php");


//review form submit
if (isset($_POST['reviewProduct'])) {
    $review = $_POST['productReview'];
    if (!empty($review)) {
        $prod_id = $_GET['id'];

        //Insert query
        $sql = "INSERT INTO `reviews`( `prod_id`,`user_id`, `review`) VALUES ('$prod_id','$userID','$review')";

        if (mysqli_query($conn, $sql)) {

?>
            <script>
                window.location.href = "myOrders.php";
            </script>
<?php
        }
    }
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

    $sqlUser = "SELECT * FROM `users` JOIN users_data ON users.id=users_data.userId AND users_data.userId='$userID'";

    $result = $conn->query($sqlUser);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    ?>


    <div class="container mt-5 mb-5 h-100 pt-5">
        <div class="mt-5 h-100">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-primary">Hey! <?php echo $row['name']; ?> </h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label class="font-weight-semibold" for="cancelOrderReason">Write
                                    Review:</label>
                                <input type="text" class="form-control" name="productReview" id="productReview" placeholder="How was the product?" autofocus>
                                <input type="hidden" name="cutomer_id" value="<?php echo $userID; ?>">
                                <input type="hidden" name="customer_name" value="<?php echo $row['name']; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" name="reviewProduct" class="btn btn-secondary m-t-30">Add Review</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include("includes/viewOrderFooter.php"); ?>