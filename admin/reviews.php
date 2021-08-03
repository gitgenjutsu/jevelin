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
                        <h5>All Reviews by Customers</h5>
                        <!-- Search data -->
                        <div class="input-affix w-25">
                            <i class="prefix-icon anticon anticon-search"></i>
                            <input type="search" class="form-control" placeholder="Search Data by Name.." id="searchOrders">
                        </div>
                        <!-- Search End-->
                    </div>

                    <div class="m-t-30">
                        <div class="table-responsive">
                            <table id="" class="table-hover table">
                                <thead>
                                    <tr>
                                        <th>S No.</th>
                                        <th>Customer Name</th>
                                        <th>Product Name</th>
                                        <th>Img</th>
                                        <th>Review</th>
                                        <th>Time</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody id="review_data">

                                </tbody>

                            </table>
                            <div class="d-flex justify-content-end" id="reviewPages">Fetching data...</div>
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