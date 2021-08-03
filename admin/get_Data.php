 <?php
    include_once("includes/config.php");
    //get page num
    // $page = $_POST['page'];
    // $pageNum = $_POST['num'];

    $sql = "SELECT * FROM products ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $allimg = explode(',', $row['img_name']);
            $numofimg = count($allimg);
    ?>
         <tr>
             <td>
                 <div class="media align-items-center">
                     <span><?php echo $row["prod_name"]; ?></span>
                 </div>
             </td>
             <?php
                for ($i = 0; $i < $numofimg; $i++) {
                ?>
                 <td>
                     <div class="avatar avatar-image mx-2 rounded">
                         <img src="assets/images/products/<?php echo $allimg[$i]; ?>" alt="">
                     </div>
                 </td>
             <?php } ?>

             <td><?php echo $row["size"]; ?></td>
             <td><?php echo $row["prod_category"]; ?></td>
             <td><?php echo $row["price"]; ?></td>
             <td><?php echo $row["cost"]; ?></td>
             <td><?php echo $row["fashion"]; ?></td>
             <td>
                 <div class="d-flex align-items-center">
                     <div class="d-flex align-items-center">
                         <?php echo date("j M y g:i A", strtotime($row["upload_time"])); ?>
                     </div>
                 </div>
             </td>
             <td>
                 <div class="d-flex align-items-center justify-content-around">
                     <div class="m-l-15">
                         <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Edit Product" onclick="editProduct(<?php echo $row['id']; ?>)">
                             <span class="icon-holder text-secondary">
                                 <i class="anticon anticon-edit"></i>
                             </span>
                         </a>
                     </div>
                     <div class="m-l-10">
                         <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete Product" onclick="deleteProduct(<?php echo $row['id']; ?>)">
                             <span class="icon-holder text-danger">
                                 <i class="anticon anticon-delete"></i>
                             </span>
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