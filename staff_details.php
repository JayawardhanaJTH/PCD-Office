<?php
$page = "staff-details";
include "support/header.php";
?>
<link href="layout/styles/dashboard.css" rel="stylesheet" type="text/css" media="all">
<div class="d-flex">
    <div class="p_box row m-1 justify-content-center align-items-center">

        <div class="col-12 card-deck  text-center">

            <div class="card m-2 overflow-hidden">
                <img src="images/people.png" alt="Background image" class="card-img">
                <div class="card-img-overlay">
                    <div class="card-body ">
                        <h4>Add Staff</h4>
                        <div class="p-2">
                            <p>
                                Here will add staff to the system who are work in office.

                            </p>
                            <div>
                                <?php
                                $sql = "select count(*) as total from staff";
                                $rs = mysqli_query($conn, $sql);

                                if ($row = mysqli_fetch_array($rs)) {
                                    $total = $row["total"];
                                    echo "<h5>Total registered : $total</h5>";
                                }
                                ?>

                            </div>
                        </div>
                        <a href="staff-add.php">
                            <div class="p_button">
                                Add <i class="fa fa-plus"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card m-2 overflow-hidden">
                <img src="images/people.png" alt="Background image" class="card-img">
                <div class="card-img-overlay">
                    <div class="card-body ">
                        <h4>Edit staff details</h4>
                        <div>
                            <p>
                                Here will correct details about the staff
                                or
                                they can delete staff data if they are not longer work in the office.
                            </p>
                        </div>
                        <a href="staff-list.php">
                            <div class="p_button">
                                Edit <i class="fa fa-edit"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="card m-2 overflow-hidden">
                <img src="images/people.png" alt="Background image" class="card-img">
                <div class="card-img-overlay">
                    <div class="card-body ">
                        <h4>View details</h4>
                        <div>
                            <p>
                                Here can see staff details in category wise. User can search and find about the staff.
                            </p>
                        </div>
                        <a href="staff-list.php">
                            <div class="p_button">
                                View <i class="fa fa-list"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card m-2 overflow-hidden">
                
            </div>

        </div>
    </div>
</div>
<?php
include "support/footer.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="layout/scripts/alertBox.js"></script>