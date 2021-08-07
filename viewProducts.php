<?php
// include('user_auth.php');
include_once("config.php");
include_once("includes/header.php");
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
                        <li class="page-item"><a class="page-link" href="index.php">Home</a></li>
                        <li class="page-item">
                            <i class="fas fa-chevron-right page-link"></i>
                        </li>
                        <li class="page-item"><a class="page-link" href="women.php">Women</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- ********************************************Pagination end******************************************************** -->

<!-- ********************************************Sidebar start******************************************************** -->
<section class="shoes col-12">
    <div class="conatiner">
        <div class="row head-row">
            <?php
            $page = "women_sweater";
            include('includes/clothes_sideNav.php');
            ?>

            <div class="sidebar-right col-12">



                <!-- View Product-->
                <div class="container viewProduct mb-5 pb-5">
                    <div class="row text-left" id="viewProductDataHere">
                        <!-- product details here -->

                        <?php
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM products where id = '$id'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $allimg = explode(',', $row['img_name']);
                        ?>
                                <!-- from view product data page -->
                                <div class="col-lg-5 col-md-5 col-xl-5 col-10 offset-1 offset-lg-0 offset-xl-0 offset-md-0 viewProductimg">
                                    <div class="card">
                                        <div class="card-header">
                                            <img src="admin/assets/images/products/<?php echo $allimg[0]; ?>" class="img-fluid" alt="Dynamic" onclick="openModal();currentSlide(1)">
                                        </div>
                                        <div class="card-footer d-flex justify-content-between">
                                            <img src="admin/assets/images/products/<?php echo $allimg[1]; ?>" class="img-fluid secondImg" height="100" width="100" alt="Dynamic">
                                        </div>
                                    </div>
                                </div>
                                <!-- view product details -->
                                <div class="col-lg-6 col-md-6 col-xl-6 col-10 offset-1 offset-lg-0 offset-xl-0 offset-md-0 viewProductInfo mb-5">

                                    <div class="card">
                                        <div class="card-header">
                                            <h5><?php echo $row['prod_name']; ?></h5>
                                        </div>
                                        <div class="card-footer">
                                            <h5>Category:<strong> <?php echo $row['prod_category']; ?></strong></h5>
                                            <h5>Price: <strong>&#8377; <?php echo $row['price']; ?></strong></h5>
                                        </div>
                                        <div class="card-footer">
                                            <form class="addTocart mb-5" id="addToCartForm" enctype="multipart/form-data">

                                                <div class="quantity sh-increase-numbers"><span class="down_quantity"><i class="fas fa-arrow-down"></i></span>
                                                    <label class="productNameLabel" for="productNameLabel" type="text"><?php echo $row['prod_name']; ?></label>

                                                    <input type="text" id="num_of_womenProducts" class="productQuantity" name="prod_quantity" value="1" style="width:50px;" maxlength="1">
                                                    <span class="up_quantity"><i class="fas fa-arrow-up"></i></span>
                                                    <input type="hidden" id="prodID" name="id" value="<?php echo $row["id"]; ?>">
                                                </div>
                                                <button type="submit" class="single_add_to_cart_button btn">Add to cart</button>
                                            </form>

                                            <?php

                                            $sql = "SELECT * FROM `users_data` JOIN reviews WHERE users_data.userId=reviews.user_id AND prod_id = '$id'";
                                            $count = 0;
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $count++;
                                                }
                                            }
                                            ?>


                                            <!-- Tab links -->
                                            <div class="tab">
                                                <button class="tablinks active" onclick="openCity(event, 'viewInfo')">View Product Info</button>
                                                <button class="tablinks" onclick="openCity(event, 'viewReview')">Reviews (<?php echo $count; ?>) </button>
                                            </div>

                                            <!-- Tab content -->
                                            <div id="viewInfo" class="tabcontent active">
                                                <h5 class="productDescription">
                                                    <p>Product Info</p>
                                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis, unde enim. Qui vero odit iste aliquam ratione excepturi. Nostrum voluptatibus consectetur dolorum veritatis debitis, consequatur doloribus rem molestias enim eos?</p>
                                                </h5>
                                            </div>


                                            <div id="viewReview" class="tabcontent">

                                                <?php

                                                $sql = "SELECT * FROM `users_data` JOIN reviews WHERE users_data.userId=reviews.user_id AND prod_id = '$id' order by reviews.id desc";
                                                $count = 0;
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $count++;
                                                ?>
                                                        <h3>
                                                            <p><?php echo $count; ?>. <?php echo $row['name']; ?> Says : <?php echo $row['review']; ?></p>
                                                        </h3>

                                                <?php
                                                    }
                                                }
                                                ?>

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


                <!-- View Related Product-->
                <div class="container relatedProduct mt-5 pt-5">
                    <h5>Related Products</h5>
                    <div class="row text-left">
                        <?php
                        $sql = "SELECT * FROM `products` WHERE id != '$id' order by rand() limit 3";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $allimg = explode(',', $row['img_name']);
                                $numofimg = count($allimg);
                        ?>

                                <div class="col-lg-4 col-md-4 col-xl-4 col-10 offset-1 offset-lg-0 offset-xl-0 offset-md-0">
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
                                            <!-- <div><a class="cart" href="#"><i class="fas fa-shopping-cart"></i></a></div> -->
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
<!-- ********************************************Sidebar end******************************************************** -->
<?php include("includes/footer.php"); ?>