<?php
include_once("includes/config.php");
$page = $_POST['page'];
$here = $page;

if ($page == "" || $page == "1") {
    $page = 0;
} else {
    $page = ($page * 3) - 3;
}
$query = "select *  from women limit $page , 3";
$run1 = mysqli_query($conn, $query);
$result = mysqli_num_rows($run1);
$num = ceil($result / 3);
echo "<br><br><br><br>";

for ($i = 1; $i <= $num; $i++) {
    if ($here == $i) {
?>
        <!-- <span style="color:red;font-size:22px; cursor:pointer;" onclick="pagination(<?php echo $i; ?>)"><?php echo $i; ?></span> -->

        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" onclick="pagination(<?php echo $i; ?>)">
            <span>Page <?php echo $i; ?></span>
        </button>

    <?php
    } else {
    ?>
        <div class="dropdown-menu" onclick="pagination(<?php echo $i; ?>)">
            <?php echo $i; ?>
        </div>
        <!-- <span style="cursor:pointer;" onclick="pagination(<?php echo $i; ?>)"><?php echo $i; ?></span> -->
<?php
    }
}
