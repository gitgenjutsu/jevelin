<!-- https://jevelin.shufflehound.com/fashion-shop/ -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Website</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <link rel="stylesheet" href="../css/animate.css">
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

<body>
    <header class="header  bg-white">

        <div class="container text-uppercase">
            <div class="logo d-flex justify-content-center">
                <a class="navbar-brand" href="../index.php"><img src="../img/logo.png" alt="" class="img-fluid col-12 offset-0"></a>
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
                            <li class="nav-item pl-3">
                                <a class="nav-link" href="magazine.php">Magazine</a>
                            </li>

                        </ul>

                    </div>
                </div>
                <i class="fas fa-search nav-link tablet" style="color: #7e7e7e;"></i>


                <div class="cart-profile desktop">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown px-3">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <?php echo $_SESSION['username']; ?> -->
                                Wasim
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item fas fa-user" href="#"> <span class="ml-1">My Profile</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item fas fa-truck" href="#"><span class="ml-1">My Orders</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item fas fa-power-off" href="user_logout.php"> <span class="ml-1">Logout</span></a>
                            </div>
                        </li>
                    </ul>
                </div>



                <button class="srch-btn desktop" type="submit" data-toggle="modal" data-target="#myModal">
                    <i class="fas fa-search nav-link" title="Search here"></i>
                </button>


                <button class="cart-btn" type="submit"><a href="cart.php"><i class="fas fa-shopping-cart nav-link"></i></button>
                <sup class="sup wow bounce" data-wow-duration="2s">1</sup></a>

                <div class="cart-profile mobile tablet">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a class="dropdown-item fas fa-user top-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item fas fa-user" href="#"> <span class="ml-1">My Profile</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item fas fa-truck" href="#"><span class="ml-1">My Orders</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item fas fa-power-off" href="index1.html"> <span class="ml-1">Logout</span></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="input-cart mobile col-12 offset-0" style="display:none;">
                <input type="text" class="mobile" title="Search for products, brands and more" placeholder="Search for products, brands and more">
                <button class="srch-btn mobile" type="submit" data-toggle="modal" data-target="#myModal">
                    <i class="fas fa-search nav-link mobile"></i>
                </button>
            </div>
        </div>
    </header>
    <!-- ********************************************header end******************************************************** -->