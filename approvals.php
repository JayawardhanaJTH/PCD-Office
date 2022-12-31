<?php
$page = "approvals";

include "support/header.php";

if ($_SESSION['TYPE'] != '1' && $_SESSION['TYPE'] != '2') {
    header("location: support/error.php");
}

?>
<?php
if ($_SESSION['TYPE'] == '1') {
    $sql1  = "SELECT * FROM business_registration WHERE grama_niladhari_approval= '1' && secretary_approval='0'";
} else {
    $division = $_SESSION['ELEC_SEAT'];

    $sql1  = "SELECT * FROM business_registration WHERE grama_niladhari_approval= '0' && b_grama_division = '$division'";
    $sql2  = "SELECT * FROM requirement_application WHERE grama_approval= '0' && division = '$division'";

    $result_requirement = mysqli_query($conn, $sql2);
    $requirement = mysqli_fetch_all($result_requirement, MYSQLI_ASSOC);
}

$sql3  = "SELECT * FROM user WHERE approved= '0'";

$result_business = mysqli_query($conn, $sql1);
$result_user = mysqli_query($conn, $sql3);

$business = mysqli_fetch_all($result_business, MYSQLI_ASSOC);
$user_req = mysqli_fetch_all($result_user, MYSQLI_ASSOC);
?>
<link href="layout/styles/dashboard.css" rel="stylesheet" type="text/css" media="all">
<div class="text-center">

    <h1>Business Application Requests</h1>
    <?php
    if ($business == null) {
        echo "No data to show";
    } else {
    ?>
        <div class="p_box row m-1 justify-content-center align-items-center">

            <?php
            foreach ($business as $obj) {
                $submiter_id = $obj['submitted_by'];

                $query = "SELECT * FROM people WHERE pid='$submiter_id'";

                $result = mysqli_query($conn, $query);
                $user = mysqli_fetch_assoc($result);
            ?>
                <div class="col-md-6">
                    <div class="card m-2 overflow-hidden">
                        <div class="card-body ">
                            <div class="p-2">
                                <p>
                                    Request By : <?php echo $user['first_name'];
                                                    echo $user['last_name']; ?>
                                    <br>
                                    Submitted Date : <?php echo $obj['date']; ?>
                                    <br>
                                    Status : Grama Niladhari - <?php if ($obj['grama_niladhari_approval']) {
                                                                    echo 'Approved';
                                                                } else {
                                                                    echo 'Not Approved';
                                                                } ?>
                                    <br>
                                    Status : Secretary - Not Approved
                                </p>
                            </div>
                            <a href="view_application1.php?id=<?php echo $obj['f_id'] ?>">
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
    if ($_SESSION['TYPE'] == '2') {
    ?>
        <h1>Requirement Application Requests</h1>
        <div class="p_box row m-1 justify-content-center align-items-center">
            <?php
            foreach ($requirement as $obj) {
                $submiter_id = $obj['submitted_by'];

                $query = "SELECT * FROM people WHERE pid='$submiter_id'";

                $result = mysqli_query($conn, $query);
                $user = mysqli_fetch_assoc($result);
            ?>
                <div class="col-md-6 ">
                    <div class="card m-2 overflow-hidden">
                        <div class="card-body ">
                            <div class="p-2">
                                <p>
                                    Request By : <?php echo $user['first_name'];
                                                    echo $user['last_name']; ?>
                                    <br>
                                    Submitted Date : <?php echo $obj['date']; ?>
                                    <br>
                                    Status : Grama Niladhari - Not Approved
                                </p>
                            </div>
                            <a href="view_application2.php?id=<?php echo $obj['f_id'] ?>">
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
    if ($_SESSION['TYPE'] == '1') {
    ?>
        <h1>Grama Niladhari Registration Requests</h1>
        <div class="p_box row m-1 justify-content-center align-items-center">
            <?php
            foreach ($user_req as $obj) {
            ?>
                <div class="col-md-6 ">
                    <div class="card m-2 overflow-hidden">
                        <div class="card-body ">
                            <div class="p-2">
                                <p>
                                    Request By : <?php echo $obj['firstname'];
                                                    echo $obj['lastname']; ?>
                                    <br>
                                    Submitted Date : <?php echo $obj['date']; ?>
                                    <br>

                                    Status : Secretary - Not Approved
                                </p>
                            </div>
                            <a href="view_register.php?id=<?php echo $obj['id'] ?>">
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