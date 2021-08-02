<?php
include('includes/myOrders_auth.php');
include_once("includes/config.php");
include_once("includes/checkout_header.php");
?>

<!-- ********************************************cart item start******************************************************** -->

<div class="container mt-5 mb-5 h-100 pt-5">
    <!-- <div class="row"> -->
    <div class="notification-toast top-right" id="notification-toast" style="position: absolute; right:0; z-index: 100;"></div>
    <div class="mt-5 h-100">
        <div class="table-responsive bg-white">
            <caption>My Wishlist</caption>
            <table id="" class="table-hover table">
                <thead>
                    <tr>
                        <th>S.No </th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Wished on</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="wishlist_data">


                </tbody>
            </table>
        </div>
    </div>
    <!-- </div> -->
</div>
<!-- ********************************************cart item end******************************************************** -->



<?php include("includes/viewOrderFooter.php"); ?>