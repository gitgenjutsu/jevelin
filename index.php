<?php
include_once("includes/header.php");
include_once("config.php");
?>
<!-- ********************************************banner start******************************************************** -->

<section class="banner" id="gotop">
    <div class="container-fluid">
        <div class="row">
            <div class="jumbotron d-flex justify-content-between">
                <div class="text ">
                    <h1 class="display-2 text-uppercase mt-5">New, Amazing Stuff is here</h1>
                    <p class="lead my-5 desktop">Shop today and get <strong>20% discount</strong></p>
                    <a href="" class="btn  btn1">Shop now</a>
                </div>

                <div class="slider">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/frame-model.png" alt="model-1" class="img-fluid">
                            </div>
                            <div class="carousel-item">
                                <img src="img/frame-model2.png" alt="model-2" class="img-fluid">
                            </div>
                            <div class="carousel-item ">
                                <img src="img/frame-model3.png" alt="model-3" class="img-fluid ">
                            </div>
                            <div class="carousel-item">
                                <img src="img/frame-model2.png" alt="model-2" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ********************************************banner end******************************************************** -->

<!-- ********************************************three boxes start******************************************************** -->
<section class="three-box">
    <div class="container">
        <div class="row">
            <div class="box col-xl-4 col-lg-4 col-md-4 col-12 wow animate__fadeInLeftBig" data-wow-duration="1s" data-wow-delay=".9s">
                <h6>NEXT DAY SHIPPING<span class="ml-3"><i class="fas fa-truck"></i></span></h6>
                <p> Lorem ipsum dolor sit amet, consectetur elit. Nulla sem libero, dignissim sit amet consequa </p>
            </div>
            <div class="box col-xl-4 col-lg-4 col-md-4 col-12">
                <h6>FREE 20 DAY RETURNS<span class="ml-3"><i class="fas fa-undo-alt"></i></span></h6>
                <p> Lorem ipsum dolor sit amet, consectetur elit. Nulla sem libero, dignissim sit amet consequa </p>
            </div>
            <div class="box col-xl-4 col-lg-4 col-md-4 col-12 wow animate__fadeInRightBig" data-wow-duration="1s" data-wow-delay=".9s">
                <h6>SECURE CHECKOUT<span class="ml-3"><i class="fas fa-lock"></i></span></h6>
                <p> Lorem ipsum dolor sit amet, consectetur elit. Nulla sem libero, dignissim sit amet consequa </p>
            </div>
        </div>
    </div>
</section>
<!-- ********************************************three boxes end******************************************************** -->

<!-- ********************************************shop women start******************************************************** -->
<section class="women mt-5">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center text-center">
            <div class="box1 col-xl-6 col-lg-6 col-md-6 col-8">
                <h1 class="col-xl-12 col-lg-6 col-md-12 col-12">This Season</h1>
                <p class="my-4" style="color: #f84258;">BE READY TO CHANGE </p>
                <a href="" class="btn btn1 mt-4 ">Shop Women</a>
            </div>
            <div class="box2 col-xl-6 col-lg-6 col-md-6 col-10">
                <img src="img/1.jpg" alt="" class="img-fluid">
                <img src="img/2.jpg" alt="" class="img-fluid">
                <div class="move-btn">
                    <span class="fas fa-arrow-left"></span>
                    <span class="fas fa-arrow-right"></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ********************************************shop women  end******************************************************** -->

<!-- ********************************************new arrivals start******************************************************** -->


<section class="arrivals">
    <div class="container text-center col-12">
        <h1 class="">New arrivals </h1>
        <p class="text-uppercase" style="color: #f84258;">Latest Trends</p>
    </div>

    <div class="container">
        <div class="row text-left">
            <?php

            //Pagination
            $perPage = 3;
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $start = $perPage * ($page - 1);
            $sql = "SELECT * FROM products  WHERE `fashion` LIKE 'girl' LIMIT $start, $perPage";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $allimg = explode(',', $row['img_name']);
                    $numofimg = count($allimg);
            ?>
                    <div class="col-lg-4 col-md-4 col-xl-4 col-10 offset-1 offset-lg-0 offset-xl-0 offset-md-0 wow animate__fadeInLeftBig" data-wow-duration="1.5s" data-wow-delay=".9s">
                        <div class="card">
                            <div class="card-header" id="womenProduct">
                                <a href="<?php echo 'viewProducts.php?id=' . $row['id']; ?>">
                                    <?php
                                    for ($i = 0; $i < $numofimg; $i++) {
                                    ?>
                                        <img src="admin/assets/images/products/<?php echo $allimg[$i]; ?>" class="img-fluid imgLoading" alt="Img nf" />
                                    <?php } ?>
                                </a>

                            </div>
                            <div class="card-body">
                                <h2 style="color: #f84258;"><?php echo $row["prod_name"]; ?></h2>
                                <h2><?php echo $row["prod_category"]; ?> </h2>
                                <h2><?php echo $row["size"]; ?> </h2>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div><del><span style="color: #ccc;">₹<?php echo $row["cost"]; ?></span></del> <span class="font-weight-bold mx-2"> ₹<?php echo $row["price"]; ?></span></div>

                                <div class="d-flex justify-content-between w-25">
                                    <div><a class="cart" href="javascript:void(0);"><i class="fas fa-heart" data-toggle="tooltip" data-placement="top" title="Add to Wishlist" onclick="addToWish(<?php echo $row['id']; ?>)"></i></a></div>

                                    <div><a class="cart" href="javascript:void(0);"><i class="fas fa-shopping-cart" data-toggle="tooltip" data-placement="top" title="Add to Cart" onclick="addToCart(<?php echo $row['id']; ?>)"></i></a></div>
                                </div>

                            </div>
                        </div>

                    </div>
            <?php
                }
            }
            ?>


        </div>
    </div>
</section>
<!-- ********************************************new arrivals end******************************************************** -->


<!-- ********************************************banner 2 start******************************************************** -->
<section class="banner-two">
    <div class="container col-12">
        <div class="text">
            <h1>Khaki Lace Up Sandals </h1>
            <p>THIS MONTH ITEMS ON <strong style="color: #f84258;">MEGA SALE</strong></p>

            <div class="timer col-12 mt-5">
                <h2 id="demoTime"></h2>
                <p><span class="mr-3">weeks</span><span class="mr-3">days</span><span class="mr-3">hours</span><span class="mr-3">minutes</span><span class="mr-3">seconds</span> </p>
                <a href="" class="btn btn1 wow animate__bounceInUp" data-wow-duration="1.5s" data-wow-delay=".9s">Grab It Till You Can</a>
            </div>
        </div>

    </div>
</section>
<!-- ********************************************banner 2 end******************************************************** -->


<!-- ********************************************mens jacket start******************************************************** -->
<section class="mens">

    <div class="container text-center col-12">
        <h1 class="">New arrivals </h1>
        <p class="" style="color: #f84258;">MENS JACKETS </p>
    </div>
    <div class="container mt-5">
        <div class="row d-flex align-items-center justify-content-center text-center">

            <div class="box2 col-xl-6 col-lg-6 col-md-6 col-10" data-wow-duration="1.5s" data-wow-delay=".9s">

                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/slide1.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="carousel-item">
                            <img src="img/slide2.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="carousel-item">
                            <img src="img/slide3.jpg" alt="" class="img-fluid">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
            </div>

            <div class="box1 col-xl-6 col-lg-6 col-md-6 col-8">
                <h1>Experience</h1>
                <h1>World</h1>
                <p class="my-4" style="color: #f84258;">IN NEW LOOK </p>
                <a href="" class="btn  btn1 mt-2">Shop Men</a>
            </div>

        </div>
    </div>
</section>
<!-- ********************************************mens jacket end******************************************************** -->

<!-- ********************************************trending now start******************************************************** -->
<section class="trending">
    <div class="container text-left ">
        <div class="row">
            <div class="col-12 mb-2">
                <h1>TRENDING NOW </h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row text-left">
            <?php
            //Pagination
            $perPage = 4;
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $start = $perPage * ($page - 1);
            $sql = "SELECT * FROM products  WHERE `fashion` LIKE 'boy' LIMIT $start, $perPage";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $allimg = explode(',', $row['img_name']);
                    $numofimg = count($allimg);
            ?>
                    <div class="col-lg-3 col-md-3 col-xl-3 col-10 offset-1 offset-lg-0 wow animate__fadeInRightBig" data-wow-duration="1.5s" data-wow-delay=".9s">
                        <div class="card">
                            <div class="card-header">
                                <a href="<?php echo 'viewProducts.php?id=' . $row['id']; ?>">
                                    <?php
                                    for ($i = 0; $i < $numofimg; $i++) {
                                    ?>
                                        <img src="admin/assets/images/products/<?php echo $allimg[$i]; ?>" class="img-fluid" alt="Img nf">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="card-body">
                                <h2 style="color: #f84258;"><?php echo $row["prod_name"]; ?></h2>
                                <h2><?php echo $row["prod_category"]; ?> </h2>
                                <h2><?php echo $row["size"]; ?> </h2>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div><del><span style="color: #ccc;">₹<?php echo $row["cost"]; ?></span></del> <span class="font-weight-bold mx-2"> ₹<?php echo $row["price"]; ?></span></div>

                                <div class="d-flex justify-content-between w-25">
                                    <div><a class="cart" href="javascript:void(0);"><i class="fas fa-heart" data-toggle="tooltip" data-placement="top" title="Add to Wishlist" onclick="addToWish(<?php echo $row['id']; ?>)"></i></a></div>

                                    <div><a class="cart" href="javascript:void(0);"><i class="fas fa-shopping-cart" data-toggle="tooltip" data-placement="top" title="Add to Cart" onclick="addToCart(<?php echo $row['id']; ?>)"></i></a></div>
                                </div>

                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

            <?php
            //Pagination
            $perPage = 4;
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $start = $perPage * ($page - 1);
            $sql = "SELECT * FROM products  WHERE `fashion` LIKE 'girl' LIMIT $start, $perPage";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $allimg = explode(',', $row['img_name']);
                    $numofimg = count($allimg);
            ?>

                    <div class="col-lg-3 col-md-3 col-xl-3 col-10 offset-1 offset-lg-0 wow animate__fadeInRightBig" data-wow-duration="1.5s" data-wow-delay=".9s">
                        <div class="card">
                            <div class="card-header" id="womenProduct">
                                <a href="<?php echo 'viewProducts.php?id=' . $row['id']; ?>">
                                    <?php
                                    for ($i = 0; $i < $numofimg; $i++) {
                                    ?>
                                        <img src="admin/assets/images/products/<?php echo $allimg[$i]; ?>" class="img-fluid" alt="Front Img">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="card-body">
                                <h2 style="color: #f84258;"><?php echo $row["prod_name"]; ?></h2>
                                <h2><?php echo $row["prod_category"]; ?> </h2>
                                <h2><?php echo $row["size"]; ?> </h2>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div><del><span style="color: #ccc;">₹<?php echo $row["cost"]; ?></span></del> <span class="font-weight-bold mx-2"> ₹<?php echo $row["price"]; ?></span></div>

                                <div class="d-flex justify-content-between w-25">
                                    <div><a class="cart" href="javascript:void(0);"><i class="fas fa-heart" data-toggle="tooltip" data-placement="top" title="Add to Wishlist" onclick="addToWish(<?php echo $row['id']; ?>)"></i></a></div>

                                    <div><a class="cart" href="javascript:void(0);"><i class="fas fa-shopping-cart" data-toggle="tooltip" data-placement="top" title="Add to Cart" onclick="addToCart(<?php echo $row['id']; ?>)"></i></a></div>
                                </div>

                            </div>
                        </div>
                    </div>

            <?php
                }
            }
            ?>

        </div>
    </div>
</section>
<!-- ********************************************trending now end******************************************************** -->

<!-- ********************************************New Town slider start******************************************************** -->
<section class="newslider">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <img src="img/n1.png" alt="" class="img-fluid">
                <img src="img/n2.png" alt="" class="img-fluid">
                <img src="img/n1.png" alt="" class="img-fluid">
                <img src="img/n2.png" alt="" class="img-fluid">
                <img src="img/n1.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>

</section>
<!-- ********************************************New Town slider end******************************************************** -->



<!-- ********************************************Subscribe start******************************************************** -->
<section class="subscribe text-white">
    <div class="container col-12">
        <div class="text">
            <h1 class="wow tada " data-wow-duration="3s" data-wow-delay=".9s" style="color: #f84258;">
                Subscribe And Get
                <span style="color: #fff;">10%</span> Off
            </h1>
            <p>OUR NEW COLLECTION</p>

            <div class="timer col-12 mt-5">
                <form method="POST">
                    <input type="email" name="email" class="email" placeholder="Enter Your Email" required><br>
                    <button class="btn btn1" type="submit" name="submit">Subscribe</button>
                    <!-- <a href="" class="btn btn1">Subscribe</a> -->
                </form>
            </div>
        </div>

    </div>
</section>
<!-- ********************************************Subscribe end******************************************************** -->


<!-- ********************************************Our Magazine start******************************************************** -->
<section class="magazine text-center">
    <div class="container col-12">
        <div class="text">
            <h1 class="">Our Magazine</h1>
            <p style="color: #f84258;">READ OUR STORIES</p>
        </div>
    </div>

    <div class="container text-left">
        <div class="row">
            <div class="summer col-lg-12 col-md-10">
                <div class="img">
                    <img src="img/mg1.jpg" alt="" class="img-fluid col-lg-12 col-md-12 col-12 offset-md-1">
                </div>
                <div class="text col-lg-12 col-md-12 offset-md-1 bg-white p-5">
                    <p>by shufflehound August 23, 2018</p>
                    <h1>Summer Hits </h1>
                    <p style="color: #f84258;">Aliquam ornare mauris quis sapien interdum euismod. Nullam a elementum odio. Vivamus vestibulum bibendum orci, eget ultricies mi luctus et. Nulla fermentum, leo ac... </p>
                </div>
            </div>

            <div class="summer col-lg-12 col-md-10">
                <div class="text col-lg-12 col-md-12 col-12 offset-md-1  bg-white p-5">
                    <p>by shufflehound August 23, 2018</p>
                    <h1>Leather Trends </h1>
                    <p style="color: #f84258;">Aliquam ornare mauris quis sapien interdum euismod. Nullam a elementum odio. Vivamus vestibulum bibendum orci, eget ultricies mi luctus et. Nulla fermentum, leo ac... </p>
                </div>
                <div class="img col-lg-12 col-md-12 col-12 offset-md-1">
                    <img src="img/mg2.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ********************************************Our Magazine end******************************************************** -->

<?php include("includes/footer.php"); ?>