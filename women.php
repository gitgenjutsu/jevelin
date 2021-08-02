<?php
include_once("includes/header.php");
include_once("includes/config.php");
?>
<!-- ********************************************Pagination start******************************************************** -->
<section class="pagination-head">
    <div class="container">
        <div class="row">
            <div>
                <h2>Shop</h2>
            </div>
            <div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="index.html">Home</a></li>
                        <li class="page-item">
                            <i class="fas fa-chevron-right page-link"></i>
                        </li>
                        <li class="page-item"><a class="page-link">Women</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- ********************************************Pagination end******************************************************** -->

<!-- ********************************************Sidebar start******************************************************** -->
<section class="sidebar-head col-12 mb-5">
    <div class="conatiner">
        <div class="row head-row">
            <?php
            $page = 'women';
            include('includes/clothes_sideNav.php');
            ?>

            <div class="sidebar-right col-12">

                <div class="d-flex justify-content-between">

                   
                    <?php
                    $sql = "SELECT * FROM products  WHERE `fashion` LIKE 'girl'";
                    $result = $conn->query($sql);
                    $count = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $count++;
                        }
                    }
                    ?>
                    <div>
                        <p>Showing all <span class="font-weight-bold" style="color: #f84258;"><?php echo $count; ?></span> results</p>
                    </div>
                </div>
                <!-- col-lg-3 col-md-6 col-xl-4 col-10 offset-1 offset-lg-0 offset-xl-0 offset-md-0 -->
                <div class="container">
                    <div class="row text-left">
                        <?php
                        $sql = "SELECT * FROM products  WHERE `fashion` LIKE 'girl'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $allimg = explode(',', $row['img_name']);
                                $numofimg = count($allimg);
                        ?>

                                <div class="col-lg-4 col-md-6 col-xl-4 col-10 offset-1 offset-lg-0 offset-xl-0 offset-md-0" data-wow-duration="1.5s" data-wow-delay=".9s">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="<?php echo 'viewProducts.php?id=' . $row['id']; ?>">
                                                <?php
                                                for ($i = 0; $i < $numofimg; $i++) {
                                                ?>
                                                    <img src="admin/assets/images/products/<?php echo $allimg[$i]; ?>" class="img-fluid" alt="Front Img">
                                                <?php } ?>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h2 style="color: #f84258;"><?php echo $row["prod_name"]; ?></h2>
                                            <h2><?php echo $row["prod_category"]; ?> </h2>
                                            <h2><?php echo $row["size"]; ?> </h2>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between">
                                            <div><del><span style="color: #ccc;">₹<?php echo $row["cost"]; ?></span></del> <span class="font-weight-bold mx-2"> ₹<?php echo $row["price"]; ?></span></div>

                                            <div class="d-flex justify-content-between w-25">
                                                <div><a class="cart" href="javascript:void(0);"><i class="fas fa-heart" data-toggle="tooltip" data-placement="top" title="Add to Wishlist" onclick="addToWish(<?php echo $row['id']; ?>)"></i></a></div>

                                                <div><a class="cart" href="javascript:void(0);"><i class="fas fa-shopping-cart" data-toggle="tooltip" data-placement="top" title="Add to Cart" onclick="addToCart(<?php echo $row['id']; ?>)"></i></a></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ********************************************Sidebar end******************************************************** --
    <?php include("includes/footer.php"); ?>