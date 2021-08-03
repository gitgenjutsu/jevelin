<?php
include_once("includes/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $prod_name = $_REQUEST['prod_name'];
    $size = $_REQUEST['size'];
    $category = $_REQUEST['category'];
    $price = $_REQUEST['price'];
    $cost = $_REQUEST['cost'];
    $gender = $_REQUEST['gender'];

    // $imgFileType = implode(',', $image['type']);


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
                        echo "Image Uploaded";
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
        $sql = "INSERT INTO products (prod_name,img_name,size,prod_category,price,cost,fashion) VALUES ('$prod_name','$imageName','$size','$category','$price','$cost','$gender');";
        //execute query
        $run = $conn->query($sql);
        if ($run) {
            echo "Query Run";
        } else {
            echo "Query Failed!";
        }
    }
}
