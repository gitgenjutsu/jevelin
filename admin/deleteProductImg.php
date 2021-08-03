<?php
include('includes/config.php');
$id = $_POST['del'];


if (isset($id)) {
    $sql = "SELECT img_name FROM products WHERE id='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $allimg = explode(',', $row['img_name']);
            $numofimg = count($allimg);

            for ($i = 0; $i < $numofimg; $i++) {
                if (!empty($row['img_name'])) {
                    $targetPath = "assets/images/products/$allimg[$i]";
                    if (unlink($targetPath)) {
                        $delQuery = "UPDATE products SET img_name='' WHERE id='$id'";
                        $run = $conn->query($delQuery);
                        if ($run) {
                            echo "Query run";
                            header("location:editProduct.php");
                        } else {
                            echo "Query Failed";
                        }
                    }
                } else {
                    echo "Img is empty";
                }
            }
        }
    } else {
        echo "img data not found";
    }
} else {
    echo "Id not found";
}

// $sql = "DELETE img_name FROM products WHERE id='$id'";
// $run = $conn->query($sql);

// if ($run) {
//     echo "Deleted";
// } else {
//     echo "Failed";
// }
