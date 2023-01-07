<?php

$page = "forms";
$type = "form";
setcookie("pageName", $page, time() + (86400 * 30), "/");

include 'support/header.php';

$id = $_SESSION['USER_ID'];
$sql = "SELECT nic,contact,address,electoralseat,firstName,lastName FROM people WHERE peopleId = '$id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

?>
<div class="container p-1">
    <div class="border p-2">
        <div class="text-center">
            <h4 class="h4">පාර්ලිමේන්තු මන්ත්‍රී</h4>
            <h2 class="h2">නීතීඥ ප්‍රේමනාත් සී. දොලවත්ත මැතිතුමාගේ කාර්යාලය</h2>
        </div>
        <form action="php/online_application_add.php" method="POST" class="needs-validation" novalidate>
            <ol>
                <li>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <label for="name">(නම)</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo  $user['firstName'] . " " . $user['lastName'] ?>" required>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <label for="address">(ලිපිනය)</label>
                        <input type="text" name="address" id="address" class="form-control" value="<?php echo  $user['address'] ?>" required>
                        <div class="invalid-feedback">
                            Please enter your address.
                        </div>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <label for="contact">Phone number</label>
                        <label for="contact">(දුරකතන අංකය)</label>
                        <input type="text" name="contact" minlength="10" maxlength="10" pattern="[0-9]{10}" id="contact" value="<?php echo  $user['contact'] ?>" class="form-control">
                        <small id="info" class="form-text text-muted">Enter your 10 digits mobile number.</small>
                        <div class="invalid-feedback">
                            Please enter valid phone number.
                        </div>
                    </div>
                </li>
                <div class="row">
                    <li class="col-md-6 ">
                        <div class="form-group">
                            <label for="birthday">Date of birth</label>
                            <label for="birthday">(උපන්දිනය)</label>
                            <input type="date" name="birthday" id="birthday" class="form-control" required>
                            <div class="invalid-feedback">
                                Please select your birthday.
                            </div>
                        </div>
                    </li>
                    <li class="col-md-6">
                        <div class="form-group">
                            <label for="nic">N.I.C Number</label>
                            <label for="nic">(ජා.හැ.අ.)</label>
                            <input type="text" name="nic" maxlength='10' minlength='10' pattern='[0-9]{9}[A-Z|a-z]{1}' id="nic" class="form-control" value="<?php echo  $user['nic'] ?>" placeholder="123456789V" required>
                            <div class="invalid-feedback">
                                Please enter valid NIC number.
                            </div>
                        </div>
                    </li>
                </div>

                <div class="row">
                    <li class="col-md-6">
                        <label for="status">Marital status</label>
                        <label for="status">(විවාහක අවිවාහක බව)</label>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status1" value="1" required>
                            <label class="form-check-label" for="status1">
                                Married (විවාහක)
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status2" value="0" required>
                            <label class="form-check-label" for="status2">
                                Unmarried (අවිවාහක)
                            </label>
                        </div>
                        <div class="invalid-feedback">
                            Please choose marital status.
                        </div>
                    </li>
                    <li class="col-md-6">
                        <label for="bCitizenship">Children</label>
                        <label for="bCitizenship">(දරුවන්)</label>
                        <div class="form-inline justify-content-around mb-1">
                            <label for="childBelow">Below 18 (18ට අඩු)</label>
                            <input type="number" name="childBelow" id="childBelow" class="form-control ml-sm-2">
                        </div>
                        <div class="form-inline justify-content-around">
                            <label for="childAbove">Above 18 (18ට වැඩි)</label>
                            <input type="number" name="childAbove" id="childAbove" class="form-control ml-sm-2">
                        </div>
                    </li>
                </div>

                <div class="row mt-1">
                    <li class="col-md-4">
                        <div class="form-group">
                            <label for="elecSeat">Electoral seat</label>
                            <label for="elecSeat">(මැතිවරණ ආසනය)</label>
                            <select name="elecSeat" id="elecSeat" class="form-control" required>
                                <option value="">Select Electoral seat</option>
                                <option value="AW" <?php if ($user['electoralseat'] == 'AW') echo 'selected' ?>>Avissawella</option>
                                <option value="BO" <?php if ($user['electoralseat'] == 'BO') echo 'selected' ?>>Borella</option>
                                <option value="CC" <?php if ($user['electoralseat'] == 'CC') echo 'selected' ?>>Colombo Central</option>
                                <option value="CE" <?php if ($user['electoralseat'] == 'CE') echo 'selected' ?>>Colombo East</option>
                                <option value="CN" <?php if ($user['electoralseat'] == 'CN') echo 'selected' ?>>Colombo North</option>
                                <option value="CW" <?php if ($user['electoralseat'] == 'CW') echo 'selected' ?>>Colombo West</option>
                                <option value="DE" <?php if ($user['electoralseat'] == 'DE') echo 'selected' ?>>Dehiwala</option>
                                <option value="HO" <?php if ($user['electoralseat'] == 'HO') echo 'selected' ?>>Homagama</option>
                                <option value="KA" <?php if ($user['electoralseat'] == 'KA') echo 'selected' ?>>Kaduwela</option>
                                <option value="KE" <?php if ($user['electoralseat'] == 'KE') echo 'selected' ?>>Kesbewa</option>
                                <option value="KL" <?php if ($user['electoralseat'] == 'KL') echo 'selected' ?>>Kolonnawa</option>
                                <option value="KO" <?php if ($user['electoralseat'] == 'KO') echo 'selected' ?>>Kotte</option>
                                <option value="MA" <?php if ($user['electoralseat'] == 'MA') echo 'selected' ?>>Maharagama</option>
                                <option value="MO" <?php if ($user['electoralseat'] == 'MO') echo 'selected' ?>>Moratuwa</option>
                                <option value="RA" <?php if ($user['electoralseat'] == 'RA') echo 'selected' ?>>Rathmalana</option>
                            </select>
                            <div class="invalid-feedback">
                                Please choose your electoral seat.
                            </div>
                        </div>
                    </li>
                    <li class="col-md-4">
                        <div class="form-group">
                            <label for="division">Regional Secretariat Division</label>
                            <label for="division">(ප්‍රාද්ශීය ලේකම් කොට්ඨාසය)</label>
                            <select name="division" id="division" class="form-control" required>
                                <option value="">Select Regional Secretariat Division</option>
                                <option value="Seethawaka">Seethawaka</option>
                                <option value="Padukka">Padukka</option>
                                <option value="Kaduwela">Kaduwela</option>
                                <option value="Maharagama">Maharagama</option>
                                <option value="Kesbewa">Kesbewa</option>
                                <option value="Dehiwala">Dehiwala</option>
                                <option value="Rathmalana">Rathmalana</option>
                                <option value="Kotte">Kotte</option>
                                <option value="Kolonnawa">Kolonnawa</option>
                                <option value="Moratuwa">Moratuwa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Thibirigasyaya">Thibirigasyaya</option>
                            </select>
                            <div class="invalid-feedback">
                                Please choose your regional secretariat division.
                            </div>
                        </div>
                    </li>
                    <li class="col-md-4">
                        <div class="form-group">
                            <label for="domain">Village Officer Domain</label>
                            <label for="domain">(ග්‍රාම නිලධාරී වසම)</label>
                            <input type="text" name="domain" id="domain" class="form-control" placeholder="Village Officer Domain" required />
                            <div class="invalid-feedback">
                                Please enter your village officer domain.
                            </div>
                        </div>
                    </li>
                </div>
                <div class="row mt-1">
                    <li class="col-md-8">
                        <div class="form-group">
                            <label for="referrer">Referred person</label>
                            <label for="referrer">(යොමු කල පුද්ගලයා)</label>
                            <input type="text" name="referrer" id="referrer" class="form-control" placeholder="Referred person">

                        </div>
                    </li>
                    <?php
                    $category_sql = "SELECT * FROM application_category";
                    $result = mysqli_query($conn, $category_sql);
                    $dataSet = mysqli_fetch_all($result);
                    ?>
                    <li class="col-md-4">
                        <div class="form-group">
                            <label for="reason">Reason</label>
                            <label for="reason">(කාරණය)</label>
                            <select name="reason" id="reason" class="form-control" required>
                                <option value="">Select Reason</option>
                                <?php
                                if (count($dataSet) > 0) {
                                    foreach ($dataSet as $category) {
                                ?>
                                        <option value="<?php echo $category[2] ?>"><?php echo $category[1] ?></option>
                                <?php
                                    }
                                }
                                ?>

                            </select>
                            <div class="invalid-feedback">
                                Please select a reason.
                            </div>
                        </div>
                    </li>
                </div>
                <li>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <label for="description">(විස්තරය)</label>
                        <textarea name="description" id="description" rows="10" class="form-control" placeholder="Write your description..."> </textarea>
                    </div>
                </li>
            </ol>

            <div class="row justify-content-center mb-5">

                <div class="col-md-3">
                    <p>Date: <?php echo date('D, d M Y') ?></p>
                </div>
                <div class="col-md-3">
                    <p>Time:<?php echo date('H:i:s') ?></p>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <input type="submit" value="Save" name="application_save" class="btn">
            </div>
        </form>
    </div>
</div>
<?php
include 'support/footer.php';
?>
<script src="js\online_application_add.js"></script>