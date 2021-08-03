<?php
include('includes/config.php');

//Fetching all the  customers data
$sqlCustomer = "SELECT * FROM `users`";

$result = mysqli_query($conn, $sqlCustomer);
$customer = 0;
while ($row = mysqli_fetch_array($result)) {
    $customer++;
}

//Fetching all the orders data
$sqlAllOrder = "SELECT * FROM `orders`";

$resultAllOrder = mysqli_query($conn, $sqlAllOrder);
$Allprofit = $growth = 0;
while ($row = mysqli_fetch_array($resultAllOrder)) {
    $Allprofit += $row['amount'];
}

//Fetching all the orders data Profit
$sqlAllprofit = "SELECT * FROM `orders` WHERE orderStatus!='Order Cancelled'";

$resultAllprofit = mysqli_query($conn, $sqlAllprofit);
$order = $profit  = 0;
while ($row = mysqli_fetch_array($resultAllprofit)) {
    $order++;
    $profit += $row['amount'];
}

//Fetching all the orders growth
$sqlOrder = "SELECT * FROM `orders` WHERE orderStatus='Order Cancelled'";

$resultOrder = mysqli_query($conn, $sqlOrder);
$cancel = 0;
while ($row = mysqli_fetch_array($resultOrder)) {

    $cancel += $row['amount'];
}
$growth = (($Allprofit - $cancel) / $Allprofit) * 100;
?>

<div class="row" id="profitInfo">
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                        <i class="fas fa-rupee-sign"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0"><?php echo number_format($profit, 2); ?></h2>
                        <p class="m-b-0 text-muted">Profit</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-cyan">
                        <i class="anticon anticon-line-chart"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0">+ <?php echo number_format($growth, 2); ?>%</h2>
                        <p class="m-b-0 text-muted">Growth</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-gold">
                        <i class="anticon anticon-profile"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0"><?php echo $order; ?></h2>
                        <p class="m-b-0 text-muted">Orders</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-purple">
                        <i class="anticon anticon-user"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0"><?php echo $customer; ?></h2>
                        <p class="m-b-0 text-muted">Customers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>