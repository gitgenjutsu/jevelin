<?php
include('includes/admin_auth.php');
include('includes/dashboard_header.php');
include('includes/dashboard_sidenav.php');
?>
<!-- Page Container START -->
<div class="page-container">
    <!-- Content Wrapper START -->
    <div class="main-content">
        <!-- Overall Progress Data -->
        <?php include('overallData.php'); ?>

        <div class="col-md-12 col-lg-12">

            <div class="card" id="hideTable">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>All Oders by Customers</h5>
                        <!-- Search data -->
                        <div class="input-affix w-25">
                            <i class="prefix-icon anticon anticon-search"></i>
                            <input type="search" class="form-control" placeholder="Search Data by Name.." id="searchOrders">
                        </div>
                        <!-- Search End-->
                    </div>

                    <!-- Modal -->
                    <div class="modal modal-left fade " id="side-modal-left">
                        <div class="modal-dialog" role="document" style="height:100vh; width: 500px;">
                            <div class="modal-content">
                                <div class="side-modal-wrapper">
                                    <div class="vertical-align">
                                        <div class="table-cell">
                                            <div class="modal-body">
                                                <h5 class=" heading mb-5">
                                                    <label for="">Update Order Status</label>
                                                    <hr>
                                                </h5>
                                                <form id="form-validation" class="updateOrderStatusForm" method="POST">

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SELECT * FROM `orders`JOIN orders_items ON orders.id=orders_items.order_id -->
                    <!-- SELECT * FROM `orders` JOIN users ON orders.userId=users.id -->

                    <!-- SELECT * FROM `orders` JOIN users_data ON orders.userId=users_data.userId -->
                    <div class="m-t-30">
                        <div class="table-responsive">
                            <table id="" class="table-hover table">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Amount Paid</th>
                                        <th>Order Status</th>
                                        <th>Payment Mode</th>
                                        <th>Ordered On</th>
                                        <th style="max-width: 70px">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="order_data">

                                </tbody>

                            </table>
                            <div class="d-flex justify-content-end" id="orderPages">Fetching data...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Wrapper END -->
</div>
<!-- Page Container END -->

<?php include('includes/dashboard_search.php'); ?>

<?php
include('includes/dashboard_footer.php');
?>