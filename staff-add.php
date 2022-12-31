<?php
$page = "staff-add";
include "support/header.php";
?>

<div class="container-fluid p-3">
    <div class="row justify-content-center">
        <div class="login-main p-2 col-10 col-md-6" style="border: 2px solid maroon; border-radius: 0px 30px 0px 30px;">
            <div class="text-center">
                <h1 class="font-x2" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Register</h1>
            </div>
            <div class="people-form p-2">

                <form style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input class="form-control" type="text" id="firstName" name="firstName" placeholder="First name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input class="form-control" type="text" id="lastName" name="lastName" placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input class="form-control" type="text" id="username" name="username" placeholder="username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-at"></i></div>
                            </div>
                            <input class="form-control" type="email" id="email" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                            <div class="input-group">
                                <select id="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nic">NIC number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                            </div>
                            <input type="text" id="nic" name="nic" class="form-control" placeholder="123456789V">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contactNumber">Contact Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-phone"></i></div>
                            </div>
                            <input type="tel" id="contactNumber" name="contactNumber" minlength="10" maxlength="10" pattern="[0-9]{10}" class="form-control" placeholder="079123456" required>

                            <div class="invalid-feedback">
                                Please enter valid contact number between 0-9.
                            </div>
                        </div>
                        <small id="info" class="form-text text-muted">Enter your 10 digits mobile number.</small>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" disabled>
                            <div class="col-3">
                                <input type="button" class="btn form-control" value="Generate" onClick="randomPassword(10);" tabindex="2">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div>
                        <input type="button" class="btn" id="add_staff" value="Add Staff">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "support/footer.php";
?>
<script src="layout/scripts/alertBox.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js\staff-add.js"></script>
<script src="js\staff-update.js"></script>
<script src="js\staff-delete.js"></script>
<script src="js\password-generator.js"></script>