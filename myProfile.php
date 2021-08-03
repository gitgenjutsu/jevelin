<?php
include('includes/myOrders_auth.php');
include_once("includes/config.php");
include_once("includes/checkout_header.php");
?>

<!-- ********************************************cart item start******************************************************** -->

<?php

$sno = 0;
// $sql = " SELECT * FROM `users_data` FULL JOIN `users` WHERE users.id='$userID'";
$sql = " SELECT * FROM `users_data`  WHERE userId='$userID'";

$sqlEmail = " SELECT email FROM `users_data` FULL JOIN `users` WHERE users.id='$userID'";


$resultEmail = $conn->query($sqlEmail);
$rowEmail = $resultEmail->fetch_assoc();

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sno++;
?>

        <!-- Content Wrapper START -->
        <div class="main-content pt-5">
            <div class="container  m-t-10">
                <div class="card pt-5">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="d-md-flex align-items-center">
                                    <div class="text-center text-sm-left m-v-15 p-l-30">
                                        <h2 class="m-b-5"><?php echo $row['name']; ?></h2>
                                        <p class="text-opacity font-size-13">@<?php echo $row['username']; ?></p>
                                        <button class="btn btn-secondary">Edit Profile</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="d-md-block d-none border-left col-1"></div>
                                    <div class="col">
                                        <ul class="list-unstyled m-t-10">
                                            <li class="row">
                                                <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                                    <span>Email: </span>
                                                </p>
                                                <p class="col font-weight-semibold"> <?php echo $rowEmail['email']; ?></p>
                                            </li>
                                            <li class="row">
                                                <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                                    <span>Phone: </span>
                                                </p>
                                                <p class="col font-weight-semibold"> <?php echo $row['phone']; ?></p>
                                            </li>
                                            <li class="row">
                                                <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                    <span>Location: </span>
                                                </p>
                                                <p class="col font-weight-semibold"> <?php echo $row['state']; ?></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5>Address</h5>
                                <p><?php echo $row['address']; ?></p>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- Content Wrapper END -->
<?php


    }
}

?>



<?php include("includes/viewOrderFooter.php"); ?>