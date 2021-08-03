<?php
include('includes/admin_auth.php');
include('includes/dashboard_header.php');
include('includes/dashboard_sidenav.php');
?>

<!-- Preloader -->
<div class="preloader"></div>
<!-- Page Container START -->
<div class="page-container">
    <!-- Content Wrapper START -->
    <div class="main-content">
        <!-- Overall Progress Data -->
        <?php include('overallData.php'); ?>

        <div class="col-md-12 col-lg-12">
            <!-- Edit Form -->
            <!--Product Form-->
            <form class="form_container" method="post" id="editProductForm" enctype="multipart/form-data">
                <!-- Edit Form data -->
            </form>


            <div class="card" id="hideTable">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>All Products in Stocks</h5>
                        <!-- Search data -->
                        <div class="input-affix w-25">
                            <i class="prefix-icon anticon anticon-search"></i>
                            <input type="search" class="form-control" placeholder="Search Data" id="searchProducts">
                        </div>
                        <!-- Search End-->
                        <div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#exampleModalScrollable" id="openAddProductForm">
                                Add New Product
                            </button>
                        </div>
                    </div>

                    <!-- Add Product Modal -->
                    <div class="modal fade" id="exampleModalScrollable">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add New Product Details</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <i class="anticon anticon-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!--Product Form-->
                                    <form class="form_container" id="addProductForm" enctype="multipart/form-data" autocomplete="off">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="prod_name">Product Name</label>
                                                <input type="text" class="form-control prodName" id="prod_name" name="prod_name" placeholder="Product Name" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="size">Product Size</label>
                                                <input type="text" class="form-control prodSize" id="size" name="size" placeholder="Size" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="category">Product Category</label>
                                                <input type="text" class="form-control prodCategory" id="category" name="category" placeholder="Category" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="price">Price</label>
                                                <input type="text" class="form-control prodPrice" id="price" name="price" placeholder="Price" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="cost">Cost</label>
                                                <input type="text" class="form-control prodCost" id="cost" name="cost" placeholder="Cost" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="gender">Gender</label>
                                                <select id="gender" name="gender" class="form-control" required>
                                                    <option selected disabled>Select Gender</option>
                                                    <option value="boy">Men</option>
                                                    <option value="girl">Women</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="imgUpload">Upload Front Image</label>
                                                <input type="file" class="form-control upload_file1" name="image[]" id="image1" onchange="preview_image1();" accept="image/*" style="position: relative;" required>
                                                <div class="avatar avatar-image mx-2 rounded" id="image_preview1" style="position: absolute; top: 42%; right: 0;">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="imgUpload">Upload Back Image</label>
                                                <input type="file" class="form-control upload_file2" onchange="preview_image2();" name="image[]" id="image2" accept="image/*" style="position: absolute; top: 42%; right: 0;" required>
                                                <div class="avatar avatar-image mx-2 rounded" id="image_preview2" style="position: absolute; top: 47%; right: -2%;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" onclick="closeAdd();">Close</button>
                                            <button type="submit" name="addData" id="submitData" class="btn btn-sm btn-secondary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="m-t-30">
                        <div class="table-responsive">
                            <table id="" class="table-hover table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Front</th>
                                        <th>Back</th>
                                        <th>Size</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Cost</th>
                                        <th>For</th>
                                        <th style="max-width: 70px">Time</th>
                                        <th style="max-width: 70px">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="prod_data">

                                </tbody>
                            </table>
                            <!-- <div class="d-flex justify-content-end" id="productPages">Fetching data...</div> -->
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