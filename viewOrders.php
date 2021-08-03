<?php
include('includes/myOrders_auth.php');
include_once("includes/config.php");
include_once("includes/checkout_header.php");

//storing the product  of orders by id
if (isset($_GET['id'])) {
    $orderID = $_GET['id'];
    //storing the session value of user by id
    $userID = $_SESSION['userID'];
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
                                    <a class="dropdown-item fas fa-user" href="#"> <span class="ml-1">My Profile</span></a>
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

    <!-- ********************************************cart item start******************************************************** -->

    <div class="container mt-5 mb-5 h-100 pt-5">
        <div class="mt-5 h-100">
            <div class="table-responsive bg-white">
                <caption class="caption">
                    <div class="m-l-15 d-flex">
                        <span class="pr-3">Delivery Details</span>
                        <a href="#" data-toggle="modal" data-target="#side-modal-right" data-toggle="tooltip" data-placement="top" title="Change Address">
                            <span class="icon-holder text-secondary">
                                <i class="anticon anticon-edit"></i>
                            </span>
                        </a>
                    </div>
                </caption>

                <?php
                if (isset($_POST['updateAddress'])) {

                    $fullName = $_POST['inputName'];
                    $phone = $_POST['inputDigit'];
                    $areaCode = $_POST['inputPinCode'];
                    $landmark = $_POST['inputLocality'];
                    $state = $_POST['state'];
                    $addressType = $_POST['radioDemo'];
                    $address = $_POST['inputAddress'];

                    if (
                        !empty($fullName)
                        && !empty($phone)
                        && !empty($areaCode)
                        && !empty($landmark)
                        && !empty($state)
                        && !empty($addressType)
                        && !empty($address)
                    ) {
                        $sql = "UPDATE `users_data` SET `name`='$fullName',`phone`='$phone',`pincode`='$areaCode',`state`='$state',`locality`='$landmark',`address`='$address',`address_type`='$addressType' WHERE userId='$userID' ";
                        $run = $conn->query($sql);
                    }
                }
                ?>



                <!-- Modal -->
                <div class="modal modal-right fade " id="side-modal-right">
                    <div class="modal-dialog" role="document" style="height:max-content; width: 500px;">
                        <div class="modal-content">
                            <div class="side-modal-wrapper">
                                <div class="vertical-align">
                                    <div class="table-cell">
                                        <div class="modal-body">
                                            <form id="form-validation" class="checkoutForm" method="POST">
                                                <h5 class=" heading mb-5">
                                                    Update Delivery Details
                                                    <hr>
                                                </h5>
                                                <?php
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
                                                                    <label for="radio1">Home</label>
                                                                </div>
                                                                <div class="radio"><input id="radio2" name="radioDemo" value="office" type="radio">
                                                                    <label for="radio2">Office</label>
                                                                </div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <div class="radio"><input id="radio1" name="radioDemo" value="home" type="radio">
                                                                    <label for="radio1">Home</label>
                                                                </div>
                                                                <div class="radio"><input id="radio2" name="radioDemo" value="office" type="radio" checked="true">
                                                                    <label for="radio2">Office</label>
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
                                                    <button type="submit" class="btn btn-secondary" name="updateAddress">Update</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table id="" class="table-hover table">
                    <thead>
                        <tr>
                            <th>S.No </th>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Pincode</th>
                            <th>State</th>
                            <th>Landmark</th>
                            <th>
                                Shipping Address
                            </th>
                            <th>Address Type</th>
                        </tr>
                    </thead>
                    <tbody id="prod_data">
                        <?php
                        $sno = 0;
                        $sql = "SELECT * FROM `users_data` WHERE userId='$userID'";

                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $sno++;
                        ?>
                                <tr class="text-capitalize">
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['pincode']; ?></td>
                                    <td><?php echo $row['state']; ?></td>
                                    <td><?php echo $row['locality']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['address_type']; ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- ********************************************cart item end******************************************************** -->


    <?php include("includes/viewOrderFooter.php"); ?>