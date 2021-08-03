<?php
include_once("includes/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_REQUEST['id'];
    $prod_name = $_REQUEST['prod_name'];
    $size = $_REQUEST['size'];
    $category = $_REQUEST['category'];
    $price = $_REQUEST['price'];
    $cost = $_REQUEST['cost'];
    $fashion = $_REQUEST['gender'];

    foreach ($_FILES['image']['name'] as $name => $value) {
        $fName = $_FILES['image']['name'];
        $imageName = implode(',', $fName);
    }

    if (($imageName == ',')) {
        print_r($imageName);

        $selectImg = "SELECT `img_name` FROM products WHERE `products`.`id` = '$id'";


        //execute query
        $runImg = $conn->query($selectImg);


        while ($row = $runImg->fetch_assoc()) {
            $allimg = $row['img_name'];
        }

        if ($runImg) {
            //if Img name already available
            $sqlUpdate =
                "UPDATE `products` SET `prod_name`= '$prod_name',`img_name`= '$allimg',`size`= '$size',`prod_category`= '$category',`price`= '$price',`cost`= '$cost' ,`fashion`='$fashion' WHERE `products`.`id` = '$id'";
            $runUpdate = $conn->query($sqlUpdate);
            
            if ($runUpdate) {
                echo "Query Update img Run";
            } else {
                echo "Query for img fail";
            }
        } else {
            echo "Query Failed in getting img name from db";
        }
    } else {
        if (is_array($_FILES) && !empty($_FILES)) {
            foreach ($_FILES['image']['name'] as $name => $value) {
                $targetPath = "assets/images/products/";
                $tmpName = $_FILES['image']['tmp_name'][$name];
                $target = $targetPath . $_FILES['image']['name'][$name];
                $image = $_FILES['image'];
                $imageName = implode(',', $image['name']);
                $times = count($_FILES['image']['name']);

                //allowed types of img
                $allowed = array('jpeg', 'jpg', 'png', 'gif');
                $filetype = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
                //size of image
                $imgFileSize = implode(',', $image['size']);


                // //checking if the file extension is present in array
                if (in_array($filetype, $allowed)) {
                    if ($imgFileSize < 1000000) {
                        if (move_uploaded_file($tmpName, $target)) {
                            echo "Image Update ";
                        } else {
                            echo "Failed in upload";
                        }
                    } else {
                        echo "File should be less than 2mb";
                    }
                } else {
                    echo "Invalid type of image";
                }
            }

            //Data Insertion after loop
            $sql = "UPDATE `products` SET `prod_name`= '$prod_name',`img_name`= '$imageName',`size`= '$size',`prod_category`= '$category',`price`= '$price',`cost`= '$cost' ,`fashion`='$fashion' WHERE `products`.`id` = '$id'";



            //execute query
            $run = $conn->query($sql);
            if ($run) {
                echo "Query Update Run";
            } else {
                echo "Query Update Failed!";
            }
        }
    }
}
