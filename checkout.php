<?php
include('includes/user_auth.php');
include_once("includes/config.php");
include_once("includes/checkout_header.php");

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

                </div>

            </nav>
        </div>
    </header>
    <?php
    $userID = $_SESSION['userID'];
    $sql = "SELECT * FROM users WHERE id='$userID'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);

    if (isset($_SESSION['cart'])) {
        //storing the session value of cart
        $cart = $_SESSION['cart'];
        $total = 0;
        foreach ($cart as $key => $value) {
            $sqlQuery = "SELECT * FROM products where id = '$key'";
            $result = mysqli_query($conn, $sqlQuery);
            $cart_row = mysqli_fetch_assoc($result);
            $total += ($cart_row['price'] * $value['quantity']);
            $value = $value['quantity'];
        }
    }

    ?>
    <section class="cart-body">
        <div class="container">
            <form id="form-validation" class="checkoutForm">
                <h5 class=" heading mb-5">
                    Fill Out Delivery Details
                    <hr>
                </h5>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="col-form-label control-label">User Name</label>
                        <input type="text" class="form-control" name="username" disabled value="<?php echo $data['username']; ?>">
                        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
                        <input type="hidden" name="username" value="<?php echo $data['username']; ?>">
                    </div>
                    <div class="col-sm-6">
                        <label class="col-form-label control-label">Email</label>
                        <input type="text" class="form-control" name="email" disabled value="<?php echo $data['email']; ?>">
                        <input type="hidden" name="email" value="<?php echo $data['email']; ?>">
                    </div>
                </div>
                <?php
                ?>

                <?php
                $sql1 = "SELECT * FROM users_data WHERE userId='$userID'";
                $result1 = mysqli_query($conn, $sql1);
                $data1 = mysqli_fetch_assoc($result1);
                ?>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="col-form-label control-label">Enter Full Name *</label>
                        <input type="text" class="form-control" name="inputName" placeholder="Name *" value="<?php echo $data1['name']; ?>">
                    </div>
                    <div class="col-sm-6">
                        <label class="col-form-label control-label">Contact No. *</label>
                        <input type="text" class="form-control" name="inputDigit" placeholder="Phone no. *" value="<?php echo $data1['phone']; ?>" maxlength="10">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="col-form-label control-label">Pin Code *</label>
                        <input type="text" class="form-control" name="inputPinCode" placeholder="Pincode *" value="<?php echo $data1['pincode']; ?>" maxlength="6">
                    </div>
                    <div class="col-sm-6">
                        <label class="col-form-label control-label">Locality *</label>
                        <input type="text" class="form-control" name="inputLocality" placeholder="Near by Landmark *" value="<?php echo $data1['locality']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class=" col-sm-6">
                        <label class="col-form-label control-label">State *</label>
                        <select class="select2 form-control" name="state">
                            <option value="<?php echo $data1['state']; ?>"><?php echo $data1['state']; ?></option>
                            <option value="newdelhi">New Delhi</option>
                            <option value="haryana">Haryana</option>
                            <option value="noida">Noida</option>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <label class="col-form-label control-label">Address Type *</label>
                        <div class="radio d-flex justify-content-between align-items-center">
                            <?php
                            if ($data1['address_type'] == "home") {
                            ?>

                                <div class="radio"><input id="radio1" name="radioDemo" value="home" type="radio" checked="true">
                                    <label for="radio1">Home (10am to 10pm)</label>
                                </div>
                                <div class="radio"><input id="radio2" name="radioDemo" value="office" type="radio">
                                    <label for="radio2">Office (11am to 5pm)</label>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="radio"><input id="radio1" name="radioDemo" value="home" type="radio">
                                    <label for="radio1">Home (10am to 10pm)</label>
                                </div>
                                <div class="radio"><input id="radio2" name="radioDemo" value="office" type="radio" checked="true">
                                    <label for="radio2">Office (11am to 5pm)</label>
                                </div>

                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label control-label">Address *</label>
                    <textarea name="inputAddress" id="" cols="10" class="col-sm-12 address form-control" rows="4" placeholder="Provide Your Full Address"><?php echo $data1['address']; ?></textarea>
                </div>
                <div class="form-group text-right">
                    <?php
                    if (isset($data1['address'])) {
                    ?>
                        <button type="button" class="btn btn-secondary  btn-tone" onclick="hideUserDataForm();">Skip to Payment</button>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    <?php
                    } else {
                    ?>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    <?php
                    }
                    ?>
                </div>

            </form>

            <div class="paymentDiv" style="display: none; padding-top: 50px;">
                <h5 class="heading m-5">
                    Select Payment Method
                    <hr>
                </h5>

                <?php
                if (isset($_POST['paymentCredit'])) {
                    $name = $_POST['creditCardHolderName'];
                    $creditCardNum = $_POST['creditCardNum'];
                    $creditCardValidDate = $_POST['creditCardValidDate'];
                    $creditCardBank = $_POST['creditCardBank'];
                    $creditCardCVV = $_POST['creditCardCVV'];

                    if (!empty($name) && !empty($creditCardNum) && !empty($creditCardValidDate) && !empty($creditCardBank) && !empty($creditCardCVV)) {

                        //insert order data in table
                        $sqlOrder = "INSERT INTO `orders`( `userId`, `amount`, `paymentMode`) VALUES ('$userID','$total','Credit Card')";

                        if (mysqli_query($conn, $sqlOrder)) {

                            //insert order_items data in table
                            $orderId = mysqli_insert_id($conn);

                            foreach ($cart as $key => $value) {
                                $sqlQuery = "SELECT * FROM products where id = '$key'";
                                $result = mysqli_query($conn, $sqlQuery);
                                $cart_row = mysqli_fetch_assoc($result);
                                $total = $cart_row['price'];
                                $prodName = $cart_row['prod_name'];
                                $prodImg = $cart_row['img_name'];
                                $value = $value['quantity'];

                                $sqlOrderItems = "INSERT INTO `orders_items`( `order_id`, `product_id`, `product_name`, `product_img`, `product_price`, `quantity`) VALUES ('$orderId','$key','$prodName','$prodImg' ,'$total','$value')";
                                if (mysqli_query($conn, $sqlOrderItems)) {
                                    // echo `<script>window.location.href="myOrders.php";</script>`;
                ?>
                                    <script>
                                        window.location.href = "myOrders.php";
                                    </script>
                                <?php
                                    unset($_SESSION['cart']);
                                }
                            }
                        }
                    }
                } elseif (isset($_POST['paymentDebit'])) {
                    $name = $_POST['debitCardHolderName'];
                    $creditCardNum = $_POST['debitCardNum'];
                    $creditCardValidDate = $_POST['debitCardValidDate'];
                    $creditCardBank = $_POST['debitCardBank'];
                    $creditCardCVV = $_POST['debitCardCVV'];

                    if (!empty($name) && !empty($creditCardNum) && !empty($creditCardValidDate) && !empty($creditCardBank) && !empty($creditCardCVV)) {
                        //insert order data in table
                        $sqlOrder = "INSERT INTO `orders`( `userId`, `amount`, `paymentMode`) VALUES ('$userID','$total','Debit Card')";

                        if (mysqli_query($conn, $sqlOrder)) {

                            //insert order_items data in table
                            $orderId = mysqli_insert_id($conn);

                            foreach ($cart as $key => $value) {
                                $sqlQuery = "SELECT * FROM products where id = '$key'";
                                $result = mysqli_query($conn, $sqlQuery);
                                $cart_row = mysqli_fetch_assoc($result);
                                $total = $cart_row['price'];
                                $prodName = $cart_row['prod_name'];
                                $prodImg = $cart_row['img_name'];
                                $value = $value['quantity'];

                                $sqlOrderItems = "INSERT INTO `orders_items`( `order_id`, `product_id`, `product_name`, `product_img`, `product_price`, `quantity`) VALUES ('$orderId','$key','$prodName','$prodImg' ,'$total','$value')";
                                if (mysqli_query($conn, $sqlOrderItems)) {
                                    // echo `<script>window.location.href="myOrders.php";</script>`;
                                ?>
                                    <script>
                                        window.location.href = "myOrders.php";
                                    </script>
                <?php

                                    unset($_SESSION['cart']);
                                }
                            }
                        }
                    }
                }
                ?>

                <div class="accordion borderless" id="accordion-default">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">
                                <a data-toggle="collapse" href="#collapseOneDefault">
                                    <span>Credit Card</span>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseOneDefault" class="collapse show " data-parent="#accordion-default">


                            <form action="" method="post" id="creditCardForm" class="creditForm ">
                                <div class="card-body d-flex cardForm">
                                    <div class="form-group row col-sm-6">
                                        <div class="col-sm-6">
                                            <label class="col-form-label control-label">Owner Name</label>
                                            <input type="text" class="form-control" name="creditCardHolderName" id="creditCardHolderName" placeholder="Card Holder Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="col-form-label control-label">Card No. *</label>
                                            <input type="tel" class="form-control" name="creditCardNum" id="creditCardNum" placeholder="Card no. *" maxlength="12">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="col-form-label control-label">Valid Thru</label>
                                            <input type="date" class="form-control" name="creditCardValidDate" id="creditCardValidDate">
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="col-form-label control-label">Select Your Bank</label>
                                            <select class="select2 form-control" id="creditCardBank" name="creditCardBank">
                                                <option value="newdelhi">New Delhi</option>
                                                <option value="haryana">Haryana</option>
                                                <option value="noida">Noida</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="col-form-label control-label">CVV No. *</label>
                                            <input type="password" class="form-control" name="creditCardCVV" id="creditCardCVV" placeholder="CVV no. *" maxlength="3">
                                        </div>

                                    </div>

                                    <!-- card preview -->
                                    <div class="col-sm-6 paymentCardDiv">
                                        <div class="paymentCardBg">
                                        </div>
                                        <div class="paymentCard mb-5">
                                            <div class="cardInfo d-flex justify-content-between text-right">
                                                <h2 class="creditCardOwner">Owner Name</h2>
                                                <h2 class="bankName">Bank Name</h2>
                                            </div>
                                            <img src="img/chip.png" alt="chip" class="img-fluid" width="40" />
                                            <div class="mt-2">
                                                <h2 class="cardNum">XXXX-XXXX-XXXX-XXXX</h2>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <h2 class="cardDate">XX / XX</h2>
                                                <h2 class="cardCVV">CVV</h2>
                                            </div>
                                        </div>
                                        <div class="form-group text-right">
                                            <button type="submit" name="paymentCredit" class="btn btn-secondary btn-tone">Pay &#8377;<?php echo $total; ?></button>
                                        </div>

                                    </div>

                                </div>
                            </form>


                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">
                                <a class="collapsed" data-toggle="collapse" href="#collapseTwoDefault">
                                    <span>Debit Card</span>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwoDefault" class="collapse" data-parent="#accordion-default">
                            <div class="card-body d-flex cardForm">
                                <form action="" method="post" id="debitCardForm" class="creditForm ">
                                    <div class="card-body d-flex cardForm">
                                        <div class="form-group row col-sm-6">
                                            <div class="col-sm-6">
                                                <label class="col-form-label control-label">Owner Name</label>
                                                <input type="text" class="form-control" name="debitCardHolderName" id="debitCardHolderName" placeholder="Card Holder Name">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label control-label">Card No. *</label>
                                                <input type="tel" class="form-control" name="debitCardNum" id="debitCardNum" placeholder="Card no. *" maxlength="12">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label control-label">Valid Thru</label>
                                                <input type="date" class="form-control" name="debitCardValidDate" id="debitCardValidDate">
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="col-form-label control-label">Select Your Bank</label>
                                                <select class="select2 form-control" id="debitCardBank" name="debitCardBank">
                                                    <option value="newdelhi">New Delhi</option>
                                                    <option value="haryana">Haryana</option>
                                                    <option value="noida">Noida</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label control-label">CVV No. *</label>
                                                <input type="password" class="form-control" name="debitCardCVV" id="debitCardCVV" placeholder="CVV no. *" maxlength="3">
                                            </div>

                                        </div>

                                        <!-- card preview -->
                                        <div class="col-sm-6 paymentCardDiv">
                                            <div class="paymentCardBg">
                                            </div>
                                            <div class="paymentCard mb-5">
                                                <div class="cardInfo d-flex justify-content-between text-right">
                                                    <h2 class="debitCardOwner">Owner Name</h2>
                                                    <h2 class="debitbankName">Bank Name</h2>
                                                </div>
                                                <img src="img/chip.png" alt="chip" class="img-fluid" width="40" />
                                                <div class="mt-2">
                                                    <h2 class="debitcardNum">XXXX-XXXX-XXXX-XXXX</h2>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <h2 class="debitcardDate">XX / XX</h2>
                                                    <h2 class="debitcardCVV">CVV</h2>
                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button type="submit" name="paymentDebit" class="btn btn-secondary btn-tone">Pay &#8377;<?php echo $total; ?></button>
                                            </div>

                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <?php include("includes/cart_footer.php"); ?>