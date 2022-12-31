<?php

$page = "forms";
setcookie("pageName", $page, time() + (86400 * 30), "/");

include "support/header.php";

?>
<link href="layout/styles/dashboard.css" rel="stylesheet" type="text/css" media="all">

<div class="container">
    <div class="dash">
        <div class="topic">
            <h1>Online Applications</h1>
        </div>
        <div class="panel">
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-12 mb-3">
                    <a href="online_application.php">
                        <div class="card">
                            <div class="text-center">
                                <h1>Application Form</h1>
                            </div>
                            <div class="card-body text-center">
                                <div class="details">
                                    <p>Application for Inquiries</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- load data  -->
    <?php
    if ($_SESSION['TYPE'] == '0') {
        $id = $_SESSION['USER_ID'];

        $sql1  = "SELECT * FROM application WHERE peopleId= '$id'";

        $result_application = mysqli_query($conn, $sql1);

        $application = mysqli_fetch_all($result_application, MYSQLI_ASSOC);

    ?>
        <div class="dash">
            <div class="topic">
                <h1>Submitted Applications</h1>
            </div>
            <div class="panel">
                <div class="row justify-content-center">
                    <?php
                    if ($application == null) {
                    ?>
                        <div class="card">
                            <div class="text-center p-2">
                                <h1>No submitted applications</h1>
                            </div>
                        </div>
                        <?php
                    } else {
                        foreach ($application as $obj) {
                            $grama = $obj['grama_niladhari_approval'];
                            $sec = $obj['secretary_approval'];
                            $g_status = "Not Approved";
                            $s_status = "Not Approved";

                            if ($grama == '1') {
                                $g_status = "Approved";
                            } else if ($grama == '3') {
                                $g_status = "Rejected";
                            }

                            if ($sec == '1') {
                                $s_status = "Approved";
                            } else if ($sec == '3') {
                                $s_status = "Rejected";
                            }
                        ?>
                            <div class="col-md-6 col-sm-12 mb-3">
                                <a href="view_application1.php?id=<?php echo $obj['f_id'] ?>">
                                    <div class="card">
                                        <div class="text-center">
                                            <h1>Application Type : Business Registration</h1>
                                        </div>
                                        <div class="card-body">
                                            <div class="details">
                                                <p>Status : Grama Niladhari - <?php echo $g_status ?></p>
                                                <p>Status : Secretary - <?php echo $s_status ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php
include "support/footer.php";

if (isset($_SESSION["FORM_SUBMITTED"])) {
    if ($_SESSION["FORM_SUBMITTED"] == true) {
        unset($_SESSION["FORM_SUBMITTED"]);

?>
        <script type="text/javascript">
            success_popup('Form has been Submitted');
        </script>
    <?php
    } else {

        unset($_SESSION["FORM_SUBMITTED"]);
    ?>
        <script type="text/javascript">
            error_popup('Form has been not submitted');
        </script>
<?php
    }
}

?>