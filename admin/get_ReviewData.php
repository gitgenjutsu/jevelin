 <?php
    include_once("includes/config.php");
    //get page num
    $page = $_POST['page'];
    $pageNum = $_POST['num'];
    // $sql = "SELECT orders.id,orders.amount,orders.paymentMode,orders.orderStatus,orders.orderTime,users_data.name FROM `orders` JOIN users_data ON orders.userId=users_data.userId order by orders.id desc limit $page,$pageNum";
    $sql = "SELECT * FROM `users_data` JOIN reviews WHERE users_data.userId=reviews.user_id ";
    $result = $conn->query($sql);
    $count = $rowProd = 0;
    if ($result->num_rows > 0) {
        $numofData = $result->num_rows;
        while ($row = $result->fetch_assoc()) {
            $prodId = $row['prod_id'];
            $sqlProd = "SELECT * FROM `products` WHERE id='$prodId'";
            $resultProd = $conn->query($sqlProd);
            $count++;
            if ($resultProd->num_rows > 0) {
                while ($rowProd = $resultProd->fetch_assoc()) {
                    $allimg = explode(',', $rowProd['img_name']);

    ?>
                 <tr>
                     <td>
                         <?php echo $count; ?>
                     </td>
                     <td>
                         <?php echo $row["name"]; ?>
                     </td>
                     <td>
                         <?php echo $rowProd["prod_name"]; ?>
                     </td>
                     <td>
                         <div class="avatar avatar-image mx-2 rounded">
                             <img src="assets/images/products/<?php echo $allimg[0]; ?>" alt="product img">
                         </div>
                     </td>
                     <td>
                         <span class="badge badge-secondary">
                             <span class="icon-holder text-white">
                             </span> <?php echo $row["review"]; ?>
                         </span>

                     </td>

                     <td><?php echo date("j M y g:i A", strtotime($row["time"])); ?></td>
                     <!-- <td>
                         <div class="d-flex align-items-center justify-content-around">
                             <div class="m-l-15">
                                 <a href="javascript:void(0);" onclick="" data-toggle="modal" data-target="#side-modal-left" data-toggle="tooltip" data-placement="top" title="Update Status">

                                     <span class="badge badge-danger">
                                         <span class="icon-holder text-white">
                                             <i class="anticon anticon-setting"></i>
                                         </span> Delete Review
                                     </span>
                                 </a>
                             </div>
                         </div>
                     </td> -->
                 </tr>

 <?php  }
            }
        }
    }

    // echo json_encode(array("result" => $result));
    ?>