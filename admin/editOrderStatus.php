<?php
include_once("includes/config.php");
$id = $_POST['edit'];
$query = "SELECT * FROM orders where id = '$id'";
$run = mysqli_query($conn, $query);

if ($run) {
    $rows = mysqli_fetch_array($run);
    $queryProduct = "SELECT * FROM orders_items where product_id = '$id'";
    $runProd = mysqli_query($conn, $queryProduct);
    if ($runProd) {
        $rowsProd = mysqli_fetch_array($runProd);
    }
?>
    <div class="form-group row align-items-center">
        <div class="col-sm-6">
            <label for="">Status</label>
            <select class="select2 form-control" name="status">
                <?php
                if ($rows['orderStatus'] == "Order Cancelled") {
                ?>
                    <option value="<?php echo $rows['orderStatus']; ?>"><?php echo $rows['orderStatus']; ?></option>
                <?php
                } elseif ($rows['orderStatus'] == "Order Delivered") {
                ?>
                    <option value="<?php echo $rows['orderStatus']; ?>"><?php echo $rows['orderStatus']; ?></option>
                <?php
                } else {
                ?>
                    <option value="In Progress">In Progress</option>
                    <option value="Out For Delivery">Out For Delivery</option>
                    <option value="Order Delivered">Order Delivered</option>
                    <option value="Dispatched">Dispatched</option>
                <?php
                }
                ?>

            </select>
        </div>
        <div class="col-sm-6">
            <label for="">Reason</label>
            <select class="select2 form-control" name="reason">
                <?php
                if ($rows['orderStatus'] == "Order Cancelled") {
                ?>
                    <option value="<?php echo $rows['orderStatus']; ?>"><?php echo $rows['orderStatus']; ?></option>
                <?php
                } elseif ($rows['orderStatus'] == "Order Delivered") {
                ?>
                    <option value="<?php echo $rows['orderStatus']; ?>"><?php echo $rows['orderStatus']; ?></option>
                <?php
                } else {
                ?>
                    <option value="In Progress">In Progress</option>
                    <option value="Out For Delivery">Out For Delivery</option>
                    <option value="Order Delivered">Order Delivered</option>
                    <option value="Dispatched">Dispatched</option>
                <?php
                }
                ?>

            </select>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
    </div>

    <div class="form-row d-flex justify-content-end">
        <div class="text-right">
            <button type="submit" class="btn btn-secondary" name="updateStatus">Update Status</button>
        </div>
    </div>
<?php
}

?>