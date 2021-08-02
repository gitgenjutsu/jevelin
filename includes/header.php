<!-- https://jevelin.shufflehound.com/fashion-shop/ -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Website</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <link rel="stylesheet" href="css/animate.css">
    <!-- <link href="assets/css/app.min.css" rel="stylesheet"> -->
    <!-- <script type="text/javascript" src="js/wow.js"></script>
    <script>
        new WOW().init();
    </script> -->

    <style>
        .cart-body {
            margin-top: 0;
            height: auto;
        }

        .banner {
            margin-top: 0;
        }
    </style>
</head>
<?php
include("session.php");
include_once("config.php");
if (isset($_SESSION['cart'])) {
    //storing the session value of cart
    $cart = $_SESSION['cart'];

    $count = 0;
    foreach ($cart as $key => $value) {
        $sqlQuery = "SELECT * FROM products where id = '$key'";
        $result = $conn->query($sqlQuery);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $count++;
            }
        }
    }
}


?>

<body>

    <header class="header  bg-white" style="height: max-content;">

        <div class="container-lg text-uppercase">
            <div class="logo d-flex justify-content-center" style="margin: 0 auto;">
                <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" class="img-fluid col-12 offset-0"></a>
            </div>
            <nav class="navbar navbar-expand-md navbar-light">
                <button class="navbar-toggler menubtn " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="d-flex justify-content-center mx-auto">
                    <div class="collapse navbar-collapse text-center " id="navbarSupportedContent">


                        <ul class="navbar-nav nav-marker">
                            <div id="marker"></div>
                            <li class="nav-item px-3">
                                <a class="nav-link active font-weight-normal" href="index.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown px-3">
                                <a class="nav-link dropdown-toggle" href="women.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Women
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="women.php">All Items</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="women_jacket.php">Jacket</a>
                                    <a class="dropdown-item" href="women_sweater.php">Sweater</a>
                                    <a class="dropdown-item" href="women_frocks.php">Frocks</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown px-3">
                                <a class="nav-link dropdown-toggle" href="men.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Men
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="men.php">All Items</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="men_jacket.php">Jacket</a>
                                    <a class="dropdown-item" href="men_sweater.php">Sweater</a>
                                    <a class="dropdown-item" href="men_pants.php">Pants</a>
                                </div>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link" href="shoes.php">Shoes</a>
                            </li>
                            <!-- <li class="nav-item pl-3">
                                <a class="nav-link" href="magazine.php">Magazine</a>
                            </li> -->

                        </ul>

                    </div>
                </div>


                <div class="input-affix searchBox m-b-10">
                    <form action="searchResult.php" id="serachAllDataForm" method="post">
                        <i class="prefix-icon anticon anticon-search"></i>
                        <!-- <i class="fas fa-search prefix-icon" title="Search here"></i> -->
                        <input type="text" class="form-control" name="searchAllData" placeholder="Search here" required />
                    </form>
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
                                <a class="dropdown-item fas fa-heart" href="myWishlist.php"><span class="ml-1">My Wishlist</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item fas fa-power-off" href="user_logout.php"> <span class="ml-1">Logout</span></a>
                            </div>
                        </li>
                    </ul>
                </div>






                <button class="cart-btn" type="submit">
                    <a href="cart.php">
                        <i class="fas fa-shopping-cart nav-link"></i>
                        <sup class="sup wow bounce" id="cartItemsCount" data-wow-duration="2s"><?php echo $count; ?></sup>
                    </a>
                    <ul class="cartBox">
                        <li>
                            <ul class="cartInner">

                                <div class="cartList" id="cartItemsView">
                                    <?php
                                    if (isset($_SESSION['cart'])) {
                                        $subtotal = 0;
                                        foreach ($cart as $key => $value) {
                                            $sql = "SELECT * FROM products WHERE id = '$key' limit 2";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $allimg = explode(',', $row['img_name']);
                                    ?>
                                                    <li class="cartItem">
                                                        <img src="admin/assets/images/products/<?php echo $allimg[0]; ?>" alt="cart img" height="70" width="70" />
                                                        <div class="text-left productNameDiv">
                                                            <p class="productName"><?php echo $row['prod_name']; ?></p>
                                                            <p><span><?php echo $value['quantity']; ?></span> x <span><?php echo $row['price']; ?></span></p>
                                                        </div>
                                                    </li>
                                        <?php
                                                    $subtotal +=  $row['price'] * $value['quantity'];
                                                }
                                            }
                                        }
                                    } else {
                                        ?>
                                        <li class="subTotal text-uppercase">
                                            <h5>Cart is empty</h5>
                                        </li>
                                    <?php
                                    }

                                    ?>
                                </div>
                                <?php
                                if (isset($_SESSION['cart'])) {
                                ?>
                                    <li class="viewCart">
                                        <a href="cart.php"><i class="fas fa-eye"></i> View Cart</a>
                                        <a href="checkout.php"><i class="fas fa-check"></i> Checkout</a>
                                    </li>
                                <?php

                                }
                                ?>

                            </ul>
                        </li>
                    </ul>
                </button>


            </nav>

        </div>
    </header>
    <!-- ********************************************header end******************************************************** -->