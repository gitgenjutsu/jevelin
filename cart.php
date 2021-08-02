<?php
// include('includes/user_auth.php');
include('includes/session.php');
include_once("includes/config.php");
include_once("includes/cart_header.php");

//storing the session value of cart
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    $count = 0;
    foreach ($cart as $key => $value) {
        $sql = "SELECT * FROM products where id = '$key'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $count++;
            }
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
                        <!-- <div class="input-cart col-lg-10 offset-lg-4 col-8 offset-0">
                            <input type="text" title="Search for products, brands and more" autocomplete="off" placeholder="Search for products, brands and more">
                            <button class="srch-btn" type="submit" data-toggle="modal" data-target="#myModal">
                                <i class="fas fa-search nav-link"></i>
                                </button>
                        </div> -->

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
                </div>



                <!-- <button class="cart-btn" type="submit"><a href="cart.html"><i class="fas fa-shopping-cart nav-link"></i></a></button>
                <sup>0</sup> -->
            </nav>
        </div>
    </header>
    <!-- ********************************************header end******************************************************** -->

    <!-- ********************************************cart item start******************************************************** -->
    <section class="cart-body">
        <div class="container">
            <div class="notification-toast top-right" id="notification-toast" style="position: fixed; right:0; z-index: 100;"></div>
            <div class="row">
                <div class="for-dgrid">


                    <div class="items col-lg-12 col-md-4 col-xl-4 col-10 offset-1 offset-lg-0 offset-xl-0 offset-md-0">
                        <div class="cart-item">


                            <div class="cart-item-head">
                                <div class="_2EoEbp">
                                    <div class="_1lBhq8">My Cart (<?php echo $count; ?>)</div>
                                </div>

                                <!-- <div class="_2KHWIh _3yhhU7">
                                    <div class="_29cQtz">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span class="_1nBnpg">Deliver to</span>
                                    </div>
                                    <div class="_1mGkI4 _3yhhU7">
                                        <div class="_1nWa4x">
                                            <div class="_3v8QJy _34lEVC _3MXgMR">
                                                <div class="KQi2jt"><span class="sm2yW3"> <?php echo $_SESSION['username']; ?>,&nbsp;</span><span class="_1icAMV">A-208,Gali no.6,Saurabh Vihar, Jaitpur ,Badarpur, Punjabi Dhaba</span></div>
                                                <div class="_2nB-NL"><span class="OxFdwU">HOME</span></div>
                                            </div><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5IiBoZWlnaHQ9IjUiPjxwYXRoIGZpbGw9IiMyMTIxMjEiIGZpbGwtcnVsZT0iZXZlbm9kZCIgZD0iTS4yMjcuNzAzQy0uMTY4LjMxNS0uMDMyIDAgLjUxNCAwaDcuOTY1Yy41NTYgMCAuNjg1LjMxNy4yOTguNjk4TDcuNjQgMS44MThsLTIuNDI3IDIuMzlhMS4wMiAxLjAyIDAgMCAxLTEuNDI3LS4wMDNMLjIyNy43MDN6Ii8+PC9zdmc+" class="_zys7K">
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <hr>

                            <?php
                            if (isset($_SESSION['cart'])) {
                                $count = 0;
                                foreach ($cart as $key => $value) {
                                    $sql = "SELECT * FROM products where id = '$key'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $allimg = explode(',', $row['img_name']);
                                            $numofimg = count($allimg);
                                            $count += $value['quantity'];
                            ?>
                                            <!-- Cart item body-->
                                            <div class="cart-item-body">
                                                <div>


                                                    <a href="viewProducts.php?id=<?php echo $row['id']; ?>"><img src=" admin/assets/images/products/<?php echo $allimg[0]; ?>" alt="" class="img-fluid"></a>

                                                    <!-- <div class="item-counter">
                                                        <div class="items d-flex justify-content-between">
                                                            <button class="disabled-btn" disabled="disabled">-</button>
                                                            <div class="inputbox">
                                                                <input type="text" value="<?php echo $value['quantity']; ?>">
                                                            </div>
                                                            <button class="add-btn">+</button>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <div class="text">
                                                    <h3><?php echo  $row['prod_name']; ?></h3>
                                                    <p>Size: <?php echo  $row['size']; ?></p>
                                                    <p>Quantity: <?php echo  $value['quantity']; ?></p>
                                                    <p>Category: <?php echo  $row['prod_category']; ?></p>

                                                    <div><del><span style="color: #ccc;">₹<?php echo $row["cost"]; ?></span></del> <span class="font-weight-bold mx-2"> ₹<?php echo $row["price"]; ?></span></div>

                                                    <div class="d-flex justify-content-between mt-5">

                                                        <div class="ml-5">
                                                            <a href="delete.php?id=<?php echo $key; ?>" onclick="addToWish(<?php echo  $row['id']; ?>)">
                                                                <h3 class="text-uppercase text-info font-weight-bold">Save for later</h3>
                                                            </a>
                                                        </div>

                                                        <div class="ml-5">
                                                            <a href="delete.php?id=<?php echo $key; ?>">
                                                                <h3 class="text-uppercase text-danger font-weight-bold">Remove</h3>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="delivery">
                                                    <h3>Delivery by | <span class="text-success">Free</span></h3>
                                                </div>
                                            </div>
                            <?php

                                        }
                                    }
                                }
                            }
                            ?>




                            <!-- cart item footer-->
                            <div class="cart-item-foot">
                                <div class="_3gijNv col-12-12 _2GJ0F-">
                                    <div class="_31gTpz _1RLi8m">
                                        <?php
                                        if (isset($_SESSION['cart']) && $count != 0) {
                                        ?>
                                            <form method="post" action="checkout.php">
                                                <button class="_2AkmmA iwYpF9 _7UHT_c"><span>Place Order</span></button>
                                            </form>
                                        <?php
                                        } else {
                                        ?>
                                            <a class="_2AkmmA iwYpF9 _7UHT_c text-center" href="index.php"><span>Start Shopping</span></a>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="price">
                        <div class="col-lg-12 col-md-4 col-xl-4 col-10 offset-1 offset-lg-0 offset-xl-0 offset-md-0">
                            <div class="amount">
                                <div class="amount-head">
                                    <h3 class="text-uppercase">Bill Summary</h3>
                                </div>
                                <hr>
                                <div class="amount-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h3>Total Items (<?php echo $count; ?>)</h3>
                                        <h3>₹ Rupees</h3>
                                    </div>
                                    <hr>
                                    <?php
                                    if (isset($_SESSION['cart'])) {
                                        $total = $cost = $discount = 0;
                                        foreach ($cart as $key => $value) {
                                            $sql = "SELECT * FROM products where id = '$key'";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $allimg = explode(',', $row['img_name']);
                                                    $numofimg = count($allimg);
                                                    $total += $row['price'] * $value['quantity'];
                                                    $cost += $row['cost'] * $value['quantity'];
                                                    $discount += (($cost - $total) / $cost) * 100;
                                                    $discount = ceil($discount);
                                    ?>
                                                    <div class="d-flex justify-content-between mb-4">
                                                        <h3><?php echo $row['prod_name']; ?> x <?php echo $value['quantity']; ?></h3>

                                                        <h3 class="text-secondary"><?php echo $row['price'] * $value['quantity']; ?></h3>
                                                    </div>
                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                    <hr>
                                    <div class="d-flex justify-content-between mb-4">
                                        <h3>Delivery Fee</h3>
                                        <h3 class="text-success">Free</h3>
                                    </div>
                                    <div class="total d-flex justify-content-between">
                                        <h5>Discount</h3>
                                            <h5><?php if (isset($_SESSION['cart'])) {
                                                    echo $discount;
                                                }  ?>%</h5>
                                    </div>
                                    <div class="total d-flex justify-content-between">
                                        <h3>Total Amount</h3>
                                        <h3>₹<?php if (isset($_SESSION['cart'])) {
                                                    echo $total;
                                                } ?></h3>
                                    </div>
                                </div>
                                <div class="amount-foot">
                                    <h3 class="text-success">You will save ₹ <?php if (isset($_SESSION['cart'])) {
                                                                                    echo $cost - $total;
                                                                                } ?> on this order</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ********************************************cart item end******************************************************** -->



    <?php include("includes/cart_footer.php"); ?>