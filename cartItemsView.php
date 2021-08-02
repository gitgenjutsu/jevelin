 <?php
    include("includes/session.php");
    include_once("includes/config.php");
    $id = $_POST['id'];
    if (isset($_SESSION['cart'])) {
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            $subtotal = 0;
            foreach ($cart as $key => $value) {
                $sql = "SELECT * FROM products WHERE id = '$key' limit 2";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $allimg = explode(',', $row['img_name']);
    ?>
                     <li class="cartItem">
                         <img src="admin/assets/images/products/<?php echo $allimg[0]; ?>" alt="cart img" height="70" width="70" />
                         <div class="text-left productNameDiv">
                             <p class="productName"><?php echo $row['prod_name']; ?></p>
                             <p><span><?php echo $value['quantity']; ?></span> x <span><?php echo $row['price']; ?></span></p>
                         </div>
                     </li>
         <?php
                        $subtotal +=  $row['price'] * $value['quantity'];
                    }
                }
            }
        } else {
            ?>
         <li class="subTotal text-uppercase">
             <h5>Cart is empty</h5>
         </li>
 <?php
        }
    }

    ?>

 <?php
    if (isset($_SESSION['cart'])) {
    ?>
     <hr class="bg-white w-100">
     <li class="subTotal text-uppercase">
         <p>subTotal: <span>&#8377; <?php echo $subtotal; ?></span></p>
     </li>
 <?php

    }
    ?>