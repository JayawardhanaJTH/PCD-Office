<?php
$page = "approvals";

include "support/header.php";

if ($_SESSION['TYPE'] != '1' && $_SESSION['TYPE'] != '2') {
    header("location: support/error.php");
}

?>
<?php

$sql1  = "SELECT * FROM application";

$result_application = mysqli_query($conn, $sql1);

$application = mysqli_fetch_all($result_application, MYSQLI_ASSOC);

?>
<link href="layout/styles/dashboard.css" rel="stylesheet" type="text/css" media="all">
<div class="text-center">

    <h1>Application Requests</h1>
    <?php
    if ($application == null) {
        echo "No data to show";
    } else {
    ?>
        <div class="p_box row m-1 justify-content-center align-items-center">

            <?php
            foreach ($application as $obj) {
                $submiter_id = $obj['nic'];

                $query = "SELECT * FROM people WHERE nic='$submiter_id'";

                $result = mysqli_query($conn, $query);
                $user = mysqli_fetch_assoc($result);
            ?>
                <div class="col-md-6">
                    <div class="card m-2 overflow-hidden">
                        <div class="card-body ">
                            <div class="p-2">
                                <p>
                                    Request By : <?php echo $user['firstname'];
                                                    echo $user['lastname']; ?>
                                    <br>
                                    Submitted Date : <?php echo $obj['date']; ?>
                                    <br>
                                    Status :<?php if ($obj['approval'] == 1) {
                                                echo 'Approved';
                                            } else if ($obj['approval'] == 3) {
                                                echo 'Rejected';
                                            } else {
                                                echo 'Not Approved';
                                            } ?>
                                    <br>
                                </p>
                            </div>
                            <a href="view_application.php?id=<?php echo $obj['applicationId'] ?>">
                                <div class="p_button text-center">
                                    Show <i class="fa fa-search"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>
</div>
<?php
include "support/footer.php";
?>