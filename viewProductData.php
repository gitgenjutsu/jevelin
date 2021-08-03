<?php
include_once("includes/config.php");
$id = $_POST['view'];
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
                    <img src="admin/assets/images/products/<?php echo $allimg[0]; ?>" class="img-fluid" alt="Dynamic">
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <img src="admin/assets/images/products/<?php echo $allimg[1]; ?>" class="img-fluid" alt="Dynamic">
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
                    <h5><strong><?php echo $row['price']; ?></strong></h5>
                </div>
                <div class="card-footer">
                    <h5 class="productDescription">
                        <p>Product Info</p>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis, unde enim. Qui vero odit iste aliquam ratione excepturi. Nostrum voluptatibus consectetur dolorum veritatis debitis, consequatur doloribus rem molestias enim eos?</p>
                    </h5>
                    <form class="addTocart" enctype="multipart/form-data">

                        <div class="quantity sh-increase-numbers"><span class="down_quantity"><i class="fas fa-arrow-down"></i></span>
                            <label class="productNameLabel" for="productNameLabel" type="text"><?php echo $row['prod_name']; ?></label>
                            <input type="text" id="num_of_womenProducts" class="productQuantity" step="1" min="1" max="5" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" maxlength="5">
                            <span class="up_quantity"><i class="fas fa-arrow-up"></i></span>
                        </div>

                        <button type="submit" name="add_to_cart" class="single_add_to_cart_button btn">Add to cart</button>

                    </form>
                </div>
            </div>
        </div>

<?php
    }
}
?>