<?php
$page = "approvals";

include "support/header.php";

if ($_SESSION['TYPE'] != '1' && $_SESSION['TYPE'] != '2') {
    header("location: support/error.php");
}

$sql1  = "SELECT * FROM application";

$result_application = mysqli_query($conn, $sql1);

$application = mysqli_fetch_all($result_application, MYSQLI_ASSOC);

?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />

<div class="text-center">

    <h1>Application Requests</h1>
    <?php
    if ($application == null) {
        echo "No data to show";
    } else {
    ?>
        <div class="table p-5">
            <table id="applicationTable" class="table table-bordered table-striped ">
                <thead class='text-center'>
                    <tr>
                        <th>Application No</th>
                        <th>Request By</th>
                        <th>Submitted Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($application as $obj) {
                        $submiter_id = $obj['nic'];

                        $query = "SELECT * FROM people WHERE nic='$submiter_id'";

                        $result = mysqli_query($conn, $query);
                        $user = mysqli_fetch_assoc($result);
                    ?>
                        <tr>
                            <td><a href='view_application.php?id= <?php echo $obj['applicationId'] ?>'> <?php echo $obj['applicationNo'] ?></a></td>
                            <td><?php echo $user['firstname'];
                                echo $user['lastname']; ?></td>
                            <td><?php echo $obj['date']; ?></td>
                            <td><?php if ($obj['approval'] == 1) {
                                    echo 'Approved';
                                } else if ($obj['approval'] == 3) {
                                    echo 'Rejected';
                                } else {
                                    echo 'Not Approved';
                                } ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    <?php
    }
    ?>
</div>


<?php
include "support/footer.php";

if (isset($_SESSION["ERROR"])) {
    if ($_SESSION["ERROR"] == false) {
        unset($_SESSION["ERROR"]);

?>
        <script type="text/javascript">
            success_popup('<?php echo $_SESSION["MESSAGE"] ?>');
        </script>
    <?php
    } else {

        unset($_SESSION["ERROR"]);
    ?>
        <script type="text/javascript">
            error_popup('<?php echo $_SESSION["MESSAGE"] ?>');
        </script>
<?php
    }
}

?>
<script>
    $(function() {
        $("#applicationTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo("#table_wrapper .col-md-6:eq(0)");
    });
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>