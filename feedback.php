<?php
$page = "feedback";
include "support/header.php";

if ($_SESSION['TYPE'] != '1') {
    header("location: error.php");
}

$sql = "SELECT * FROM feedback";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />

<div class="text-center">


    <div class="table p-5">
        <h1>Feedbacks</h1>

        <table id="feedbackTable" class="table table-bordered table-striped ">
            <thead class='text-center'>
                <tr>
                    <th>Application ID</th>
                    <th>Feedback</th>
                    <th>Submitted by</th>
                    <th>Submitted People NIC</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $obj) {
                    $submiter_id = $obj['peopleNic'];

                    $query = "SELECT * FROM people WHERE nic='$submiter_id'";

                    $result = mysqli_query($conn, $query);
                    $user = mysqli_fetch_assoc($result);

                    $application_query = "SELECT applicationNo FROM application WHERE applicationId ='" . $obj['applicationId'] . "'";
                    $application_result = mysqli_query($conn, $application_query);
                    $application_data = mysqli_fetch_assoc($application_result);
                ?>
                    <tr>
                        <td><a href='view_application.php?id= <?php echo $obj['applicationId'] ?>'> <?php echo $application_data['applicationNo'] ?></a></td>
                        <td><?php echo $obj['feedback']; ?></td>
                        <td><?php echo $user['firstname'];
                            echo $user['lastname']; ?></td>
                        <td><?php echo $obj['peopleNic']; ?></td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include "support/footer.php";
?>
<script>
    $(function() {
        $("#feedbackTable").DataTable({
            dom: 'Bfrtip',
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["csv","print"]
        }).buttons().container().appendTo("#table_wrapper .col-md-6:eq(0)");
    });
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>