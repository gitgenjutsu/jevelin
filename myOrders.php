<?php
include('includes/myOrders_auth.php');
include_once("includes/config.php");
include_once("includes/checkout_header.php");
?>

<!-- ********************************************cart item start******************************************************** -->

<div class="container mt-5 mb-5 h-100 pt-5">
    <!-- <div class="row"> -->
    <div class="mt-5 h-100">
        <div class="table-responsive bg-white">
            <caption>Orders Details</caption>
            <table id="" class="table-hover table">
                <thead>
                    <tr>
                        <th>S.No </th>
                        <th style="width: 135px">Product Name</th>
                        <th>Image</th>
                        <th>Amount</th>
                        <th>Quantity</th>
                        <th>Paid</th>
                        <th>Status</th>
                        <th style="width: 135px">Payment Mode</th>
                        <th style="width: 120px">Order Date</th>
                        <th style="max-width: 80px">Action</th>
                    </tr>
                </thead>
                <tbody id="prod_data">
                    <?php
                    $sno = 0;
                    $sql = "SELECT * FROM `orders_items` FULL JOIN `orders` WHERE order_id=orders.id AND userId='$userID'";
                    //SELECT * FROM `users_data` WHERE userId='$userID' 

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {

                        //select reveiws of products based on user id
                        $sqlReview = "SELECT * FROM `reviews` WHERE `reviews`.`user_id` ='$userID'";
                        $resultReview = $conn->query($sqlReview);
                        $rowReview = $resultReview->fetch_assoc();

                        while ($row = $result->fetch_assoc()) {
                            $allimg = explode(',', $row['product_img']);
                            $sno++;
                    ?>
                            <tr>
                                <td><?php echo $sno; ?></td>
                                <td>
                                    <a href="viewProducts.php?id=<?php echo $row['product_id']; ?>" data-toggle="tooltip" data-placement="top" title="View Product">
                                        <?php echo $row['product_name']; ?>
                                    </a>
                                </td>
                                <td>
                                    <div class="avatar avatar-image mx-2 rounded">
                                        <img src="admin/assets/images/products/<?php echo $allimg[0]; ?>" alt="">

                                    </div>
                                </td>
                                <td><?php echo $row['product_price']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo $row['product_price'] * $row['quantity']; ?></td>
                                <?php
                                if ($row['orderStatus'] == "Order Placed") {
                                ?>
                                    <td><span class="badge badge-primary"><?php echo $row['orderStatus']; ?></span></td>
                                <?php
                                } elseif ($row['orderStatus'] == "In Progress" || $row['orderStatus'] == "Out For Delivery" || $row['orderStatus'] == "Dispatched") {
                                ?>
                                    <td><span class="badge badge-secondary"><?php echo $row['orderStatus']; ?></span></td>
                                <?php
                                } elseif ($row['orderStatus'] == "Order Delivered") {
                                ?>
                                    <td><span class="badge badge-success"><?php echo $row['orderStatus']; ?></span></td>
                                <?php
                                } else {
                                ?>
                                    <td><span class="badge badge-danger"><?php echo $row['orderStatus']; ?></span></td>
                                <?php
                                }
                                ?>
                                <td><?php echo $row['paymentMode']; ?></td>
                                <td><?php echo date("j M y g:i A", strtotime($row['orderTime'])); ?></td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-around">


                                        <?php
                                        if ($row['orderStatus'] == "Order Cancelled" || $row['orderStatus'] == "Dispatched") {
                                        ?>
                                            <div class="m-l-15">
                                                <a href="viewOrders.php?id=<?php echo $row['product_id']; ?>" data-toggle="tooltip" data-placement="top" title="View Delivery Details">
                                                    <span class="badge badge-primary">
                                                        <span class="icon-holder text-white">
                                                            <i class="anticon anticon-eye"></i>
                                                        </span>
                                                        View Delivery
                                                    </span>
                                                </a>
                                            </div>

                                        <?php
                                        } elseif (!empty($rowReview['review']) && $row['orderStatus'] == "Order Delivered" && ($row['product_id'] == $rowReview['prod_id'])) {
                                        ?>
                                            <div class="m-l-15">
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Already Added" style="cursor: default;">
                                                    <span class="badge badge-success">
                                                        <span class="icon-holder text-white">
                                                            <i class="anticon anticon-check-circle"></i>
                                                        </span>
                                                        Review Added
                                                    </span>
                                                </a>
                                            </div>
                                        <?php
                                        } elseif ($row['orderStatus'] == "Order Delivered") {
                                        ?>
                                            <div class="m-l-15">
                                                <a href="addReview.php?id=<?php echo $row['product_id']; ?>" data-toggle="tooltip" data-placement="top" title="Add Review">
                                                    <span class="badge badge-secondary">
                                                        <span class="icon-holder text-white">
                                                            <i class="anticon anticon-plus-circle"></i>
                                                        </span>
                                                        Add Review
                                                    </span>
                                                </a>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="m-l-15">
                                                <a href="viewOrders.php?id=<?php echo $row['product_id']; ?>" data-toggle="tooltip" data-placement="top" title="View Delivery Details">
                                                    <span class="badge badge-primary">
                                                        <span class="icon-holder text-white">
                                                            <i class="anticon anticon-eye"></i>
                                                        </span>
                                                        View Delivery
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="m-l-15">
                                                <a href="cancelOrder.php?id=<?php echo $row['product_id']; ?>" data-toggle="tooltip" data-placement="top" title="Cancel Order">
                                                    <span class="badge badge-danger">
                                                        <span class="icon-holder text-white">
                                                            <i class="anticon anticon-stop"></i>
                                                        </span>
                                                        Cancel Order
                                                    </span>
                                                </a>
                                            </div>
                                        <?php
                                        }
                                        ?>


                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <!-- </div> -->
</div>
<!-- ********************************************cart item end******************************************************** -->



<?php include("includes/viewOrderFooter.php"); ?>