 <?php
    include_once("includes/config.php");

    $sql = "SELECT * FROM women ";
    $result = $conn->query($sql);

    $rows = array();
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    }

    ?>