<?php
include_once("includes/config.php");
$id = $_POST['edit'];
$query = "SELECT * FROM products where id = '$id'";
$run = mysqli_query($conn, $query);

if ($run) {
    $rows = mysqli_fetch_array($run);
    $allimg = explode(',', $rows['img_name']);
    $numofimg = count($allimg);
?>
    <!--Product Form-->
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="prod_name">Product Name</label>
            <input type="text" class="form-control prodNameEdit" id="prod_name" name="prod_name" placeholder="Product Name" value="<?php echo $rows['prod_name']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="size">Product Size</label>
            <input type="text" class="form-control" id="size" name="size" placeholder="Size" value="<?php echo $rows['size']; ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="category">Product Category</label>
            <input type="text" class="form-control" id="category" name="category" placeholder="Category" value="<?php echo $rows['prod_category']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="<?php echo $rows['price']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="price">Cost</label>
            <input type="text" class="form-control" id="cost" name="cost" placeholder="Cost" value="<?php echo $rows['cost']; ?>">
        </div>

        <?php
        if (isset($rows['fashion'])) {
            $gender = $rows['fashion'];
        ?>
            <div class="form-group col-md-6">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" class="form-control">
                    <?php
                    if ($gender == "boy") {
                    ?>
                        <option selected value="<?php echo $gender; ?>">Men</option>
                        <option value="girl">Women</option>
                    <?php
                    } else {
                    ?>
                        <option selected value="<?php echo $gender; ?>">Women</option>
                        <option value="boy">Men</option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        <?php
        } else {
        ?>
            <div class="form-group col-md-6">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" class="form-control">
                    <option selected disabled>Select Gender</option>
                    <option value="boy">Men</option>
                    <option value="girl">Women</option>
                </select>
            </div>
        <?php
        }
        ?>



        <?php
        if ((isset($allimg[0]) && !empty($allimg[0])) && (isset($allimg[1]) && !empty($allimg[1]))) {
        ?>
            <div class="form-group col-md-6">
                <img src="assets/images/products/<?php echo $allimg[0]; ?>" alt="Old img1" title="Demo img" height="130" width="150" />
                <img src="assets/images/products/<?php echo $allimg[1]; ?>" alt="Old img" title="Demo img" height="130" width="150" />
            </div>
            <input type="file" name="image[<?php echo $allimg[0]; ?>]" style="display: none;" value="<?php echo $allimg[0]; ?>">
        <?php
        } else {
        ?>

            <div class="form-group col-md-6">
                <label for="imgUpload">Upload Front Image</label>
                <input type="file" class="form-control upload_file1" name="image[]" id="image1" onchange="preview_image1();" accept="image/*" style="position: relative;" required>
                <div class="avatar avatar-image mx-2 rounded" id="image_preview1" style="position: absolute; top: 42%; right: 0;">
                </div>
            </div>
        <?php
        }
        ?>

        <?php
        if (isset($allimg[1]) && !empty($allimg[1])) {
        ?>
            <div class="form-group col-md-6">
                <a href="javascript:viod(0);" onclick="deleteProductImg(<?php echo $rows['id']; ?>)">Remove these images</a>
            </div>
            <input type="file" name="image[<?php echo $allimg[1]; ?>]" style="display: none;" value="<?php echo $allimg[1]; ?>">
        <?php
        } else {
        ?>
            <div class="form-group col-md-6">
                <label for="imgUpload">Upload Back Image</label>
                <input type="file" class="form-control upload_file2" onchange="preview_image2();" name="image[]" id="image2" accept="image/*" style="position: absolute; top: 42%; right: 0;" required>
                <div class="avatar avatar-image mx-2 rounded" id="image_preview2" style="position: absolute; top: 47%; right: -1%;">
                </div>
            </div>
        <?php
        }
        ?>

        <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-sm btn-default" data-dismiss="modal" onclick="closeEdit();">Close</button>
        <button type="submit" name="updateData" id="updateFormData" class="btn btn-sm btn-secondary">Update changes</button>
    </div>

<?php
} else {
    echo "Failed in fetching";
}
?>