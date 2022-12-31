<?php
$page = "income";

include 'support/header.php';

?>
<div class="container">
    <?php
    $sql = "select * from income";
    $result = mysqli_query($conn, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    ?>
    <h1>Income details</h1>
    <table class="table table-hover table-striped">
        <tr>
            <th>
                Application Type
            </th>
            <th>
                Amount
            </th>
            <th>
                Date
            </th>
        </tr>
        <?php
        foreach ($data as $obj) {
            $type =  $obj['application_type'];
            $app_type;

            if ($type == '1') {
                $app_type = 'Business Registration';
            } else {
                $app_type = 'Requirement Application';
            }
        ?>
            <tr>
                <td><?php echo $app_type; ?></td>
                <td><?php echo $obj['amount']; ?></td>
                <td><?php echo date('Y-m-d', strtotime($obj['date'])); ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php
    $sql = "select sum(amount) as total from income";
    $rs = mysqli_query($conn, $sql);

    $total = '0';

    if ($row = mysqli_fetch_array($rs)) {
        $total = $row["total"];
        echo "<h3 class='h5'>Total Income: Rs. $total</h1>";
    }
    ?>
</div>
<?php
include 'support/footer.php';
?>