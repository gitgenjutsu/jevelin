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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <link rel="stylesheet" href="css/animate.css">

    <!-- select css -->
    <link href="assets/vendors/select2/select2.css" rel="stylesheet">
    <link href="assets/css/app.min.css" rel="stylesheet">

    <!-- Quil stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">


    <style>
        /* customize select option */
        .select2-container .select2-choice {
            border: none !important;
            border-radius: none !important;
            background: none !important;
        }

        .select2-container .select2-choice .select2-arrow {
            background: none !important;
            border: none !important;
        }
    </style>

    <!-- <script type="text/javascript" src="js/wow.js"></script>
    <script>
        new WOW().init();
    </script> -->

    <style>
        .cart-body {
            margin-top: 0;
            height: auto;
        }

        .header {
            box-shadow: none;
        }
    </style>

</head>

<?php
//storing the session value of user by id
$userID = $_SESSION['userID'];
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
                                    <a class="dropdown-item fas fa-heart" href="myWishlist.php"><span class="ml-1">My Wishlist</span></a>
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