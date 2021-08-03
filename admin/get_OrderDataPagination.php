 <?php
    include_once("includes/config.php");
    //get page num
    $page = $_POST['page'];
    $pageNum = 5;

    $sql = "SELECT orders.id,orders.amount,orders.paymentMode,orders.orderStatus,orders.orderTime,users_data.name FROM `orders` JOIN users_data ON orders.userId=users_data.userId order by orders.id desc";
    $run = $conn->query($sql);

    $result = mysqli_num_rows($run);

    $num = ceil($result / $pageNum);
    ?>
 <button class="btn btn-default" data-toggle="dropdown" onclick="get_OrderDataPagination(<?php echo 1; ?>)">
     <span>First Page</span>
 </button>
 <?php
    for ($i = 1; $i <= $num; $i++) {
    ?>
     <button class="btn <?php if ($page == $i) {
                            echo "btn-secondary";
                        }  ?> " data-toggle="dropdown" onclick="get_OrderDataPagination(<?php echo $i; ?>)">
         <span>Page <?php echo $i; ?></span>
     </button>
 <?php

    }
    ?>
 <button class="btn btn-default" data-toggle="dropdown" onclick="get_OrderDataPagination(<?php echo $i - 1; ?>)">
     <span>Last Page</span>
 </button>
 <?php
