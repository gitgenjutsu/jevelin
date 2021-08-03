 <?php
    include_once("includes/config.php");
    //get page num
    $page = $_POST['page'];
    $pageNum = $_POST['num'];
    $sql = "SELECT orders.id,orders.amount,orders.paymentMode,orders.orderStatus,orders.orderTime,users_data.name FROM `orders` JOIN users_data ON orders.userId=users_data.userId order by orders.id desc limit $page,$pageNum";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $numofData = $result->num_rows;
        while ($row = $result->fetch_assoc()) {
    ?>
         <tr>
             <td>
                 <div class="media align-items-center">
                     <span><?php echo $row["name"]; ?></span>
                 </div>
             </td>
             <td><?php echo $row["amount"]; ?></td>
             <?php
                if ($row['orderStatus'] == "Order Delivered") {
                ?>
                 <td><span class="badge badge-success"><?php echo $row['orderStatus']; ?></span></td>
             <?php
                } elseif ($row['orderStatus'] == "Order Placed") {
                ?>
                 <td><span class="badge badge-secondary"><?php echo $row['orderStatus']; ?></span></td>
             <?php
                } elseif ($row['orderStatus'] == "In Progress" || $row['orderStatus'] == "Dispatched" || $row['orderStatus'] == "Out For Delivery") {
                ?>
                 <td><span class="badge badge-primary"><?php echo $row['orderStatus']; ?></span></td>
             <?php
                } else {
                ?>
                 <td><span class="badge badge-danger"><?php echo $row['orderStatus']; ?></span></td>
             <?php
                }
                ?>
             <td><?php echo $row["paymentMode"]; ?></td>
             <td><?php echo date("j M y g:i A", strtotime($row["orderTime"])); ?></td>
             <td>
                 <div class="d-flex align-items-center justify-content-around">
                     <div class="m-l-15">
                         <a href="javascript:void(0);" onclick="editOrderStatus(<?php echo $row['id']; ?>)" data-toggle="modal" data-target="#side-modal-left" data-toggle="tooltip" data-placement="top" title="Update Status">

                             <span class="badge badge-primary">
                                 <span class="icon-holder text-white">
                                     <i class="anticon anticon-setting"></i>
                                 </span> Change Status</span>
                         </a>
                     </div>
                 </div>
             </td>
         </tr>

 <?php
        }
    }

    // echo json_encode(array("result" => $result));
    ?>