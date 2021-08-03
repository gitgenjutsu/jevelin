<?php
session_start();
include_once("includes/config.php");
$userID = $_SESSION['userID'];
$sno = 0;
$sql = "SELECT * FROM `wishlist` JOIN products WHERE prod_id=products.id AND user_id='$userID'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $allimg = explode(',', $row['img_name']);
        $sno++;
?>
        <tr>
            <td><?php echo $sno; ?></td>
            <td>
                <a href="viewProducts.php?id=<?php echo $row['prod_id']; ?>" data-toggle="tooltip" data-placement="top" title="View Product">
                    <?php echo $row['prod_name']; ?>
                </a>

            </td>
            <td>
                <div class="avatar avatar-image mx-2 rounded">
                    <img src="admin/assets/images/products/<?php echo $allimg[0]; ?>" alt="">

                </div>
            </td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo date("j M y g:i A", strtotime($row['time'])); ?></td>
            <td>
                <div class="d-flex justify-content-start align-items-center">
                    <div class="m-l-15">
                        <a href="javascript:void(0);" onclick="addToCart(<?php echo $row['prod_id']; ?>)" data-toggle="tooltip" data-placement="top" title="Buy Item">
                            <span class="badge badge-primary">
                                <span class="icon-holder text-white">
                                    <i class="anticon anticon-plus"></i>
                                </span>
                                Add to Cart
                            </span>
                        </a>
                    </div>
                    <div class="m-l-15">
                        <a href="javascript:void(0);" onclick="removeFromWish(<?php echo $row['prod_id']; ?>)" data-toggle="tooltip" data-placement="top" title="Remove Wish">
                            <span class="badge badge-danger">
                                <span class="icon-holder text-white">
                                    <i class="anticon anticon-delete"></i>
                                </span>
                                Remove
                            </span>
                        </a>
                    </div>
                </div>
            </td>
        </tr>
    <?php
    }
} else {
    ?>
    <tr>
        <td>
            You have nothing in your wishlist.
        </td>
    </tr>
<?php
}
?>