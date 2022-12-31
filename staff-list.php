<?php
$page = "staff-list";
include "support/header.php";
?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />

<div class="container">
    <div class="text-center mb-5">
        <h1>Staff List</h1>
    </div>
    <div id="table">
    </div>
</div>

<div class="modal fade" id="staff_details_update">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #95103b">
                <h4 class="modal-title" style="color: white">Update Staff Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" class="needs-validation" novalidate>
                    <div class="form-group">
                        <div class="input-group">
                            <input hidden class="form-control" type="text" id="update_staffId" name="update_staffId" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="update_first_name">First Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input class="form-control" type="text" id="update_first_name" name="update_first_name" placeholder="First name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="update_last_name">Last Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input class="form-control" type="text" id="update_last_name" name="update_last_name" placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="update_username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input class="form-control" type="text" id="update_username" name="update_username" placeholder="username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="update_email">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-at"></i></div>
                            </div>
                            <input class="form-control" type="email" id="update_email" name="update_email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="update_gender">Gender</label>
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                            <div class="input-group">
                                <select id="update_gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="update_nic">NIC number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                            </div>
                            <input type="text" id="update_nic" name="update_nic" class="form-control" placeholder="123456789V">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="update_contact_number">Contact Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-phone"></i></div>
                            </div>
                            <input type="tel" id="update_contact_number" name="update_contact_number" minlength="10" maxlength="10" pattern="[0-9]{10}" class="form-control" placeholder="079123456" required>

                            <div class="invalid-feedback">
                                Please enter valid contact number between 0-9.
                            </div>
                        </div>
                        <small id="info" class="form-text text-muted">Enter your 10 digits mobile number.</small>
                    </div>
                    <div class="form-group">
                        <label for="update_address">Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="text" id="update_address" name="update_address" class="form-control" placeholder="Address">
                        </div>
                    </div>

                    <br>

                    <div class="modal-footer justify-content-end">
                        <div class="">
                            <input class="btn btn-" id="update_staff_details" type="submit" value="Update Staff Details">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script src="layout/scripts/alertBox.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php
include "support/footer.php";
?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="js/staff-add.js"></script>
<script src="js/staff-update.js"></script>
<script src="js/staff-delete.js"></script>
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>