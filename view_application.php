<?php
$page = "application-view";
include 'support/header.php';
?>
<?php
$id = $_GET['id'];

$sql = "SELECT * FROM application WHERE applicationId='$id'";

$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
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
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo  $data['applicantName'] ?>" disabled>

                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <label for="address">(ලිපිනය)</label>
                        <input type="text" name="address" id="address" class="form-control" value="<?php echo  $data['address'] ?>" disabled>

                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <label for="contact">Phone number</label>
                        <label for="contact">(දුරකතන අංකය)</label>
                        <input type="text" name="contact" id="contact" value="<?php echo  $data['contact'] ?>" class="form-control" disabled>
                    </div>
                </li>
                <div class="row">
                    <li class="col-md-6 ">
                        <div class="form-group">
                            <label for="birthday">Date of birth</label>
                            <label for="birthday">(උපන්දිනය)</label>
                            <input type="date" name="birthday" id="birthday" value="<?php echo  $data['birthday'] ?>" class="form-control" disabled>

                        </div>
                    </li>
                    <li class="col-md-6">
                        <div class="form-group">
                            <label for="nic">N.I.C Number</label>
                            <label for="nic">(ජා.හැ.අ.)</label>
                            <input type="text" name="nic" id="nic" class="form-control" value="<?php echo  $data['nic'] ?>" placeholder="123456789V" disabled>

                        </div>
                    </li>
                </div>

                <div class="row">
                    <li class="col-md-6">
                        <label for="status">Marital status</label>
                        <label for="status">(විවාහක අවිවාහක බව)</label>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" <?php if ($data['maritalStatus'] == 1) echo 'checked' ?> id="status1" value="1" disabled>
                            <label class="form-check-label" for="status1">
                                Married (විවාහක)
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" <?php if ($data['maritalStatus'] == 0) echo 'checked' ?> id="status2" value="0" disabled>
                            <label class="form-check-label" for="status2">
                                Unmarried (අවිවාහක)
                            </label>
                        </div>

                    </li>
                    <li class="col-md-6">
                        <label for="bCitizenship">Children</label>
                        <label for="bCitizenship">(දරුවන්)</label>
                        <div class="form-inline justify-content-around mb-1">
                            <label for="childBelow">Below 18 (18ට අඩු)</label>
                            <input type="number" name="childBelow" id="childBelow" value="<?php echo  $data['childBelow18'] ?>" class="form-control ml-sm-2" disabled>
                        </div>
                        <div class="form-inline justify-content-around">
                            <label for="childAbove">Above 18 (18ට වැඩි)</label>
                            <input type="number" name="childAbove" id="childAbove" value="<?php echo  $data['childAbove18'] ?>" class="form-control ml-sm-2" disabled>
                        </div>
                    </li>
                </div>

                <div class="row mt-1">
                    <li class="col-md-4">
                        <div class="form-group">
                            <label for="elecSeat">Electoral seat</label>
                            <label for="elecSeat">(මැතිවරණ ආසනය)</label>
                            <select name="elecSeat" id="elecSeat" class="form-control" disabled>
                                <option value="">Select Electoral seat</option>
                                <option value="AW" <?php if ($data['electoralSeat'] == 'AW') echo 'selected' ?>>Avissawella</option>
                                <option value="BO" <?php if ($data['electoralSeat'] == 'BO') echo 'selected' ?>>Borella</option>
                                <option value="CC" <?php if ($data['electoralSeat'] == 'CC') echo 'selected' ?>>Colombo Central</option>
                                <option value="CE" <?php if ($data['electoralSeat'] == 'CE') echo 'selected' ?>>Colombo East</option>
                                <option value="CN" <?php if ($data['electoralSeat'] == 'CN') echo 'selected' ?>>Colombo North</option>
                                <option value="CW" <?php if ($data['electoralSeat'] == 'CW') echo 'selected' ?>>Colombo West</option>
                                <option value="DE" <?php if ($data['electoralSeat'] == 'DE') echo 'selected' ?>>Dehiwala</option>
                                <option value="HO" <?php if ($data['electoralSeat'] == 'HO') echo 'selected' ?>>Homagama</option>
                                <option value="KA" <?php if ($data['electoralSeat'] == 'KA') echo 'selected' ?>>Kaduwela</option>
                                <option value="KE" <?php if ($data['electoralSeat'] == 'KE') echo 'selected' ?>>Kesbewa</option>
                                <option value="KL" <?php if ($data['electoralSeat'] == 'KL') echo 'selected' ?>>Kolonnawa</option>
                                <option value="KO" <?php if ($data['electoralSeat'] == 'KO') echo 'selected' ?>>Kotte</option>
                                <option value="MA" <?php if ($data['electoralSeat'] == 'MA') echo 'selected' ?>>Maharagama</option>
                                <option value="MO" <?php if ($data['electoralSeat'] == 'MO') echo 'selected' ?>>Moratuwa</option>
                                <option value="RA" <?php if ($data['electoralSeat'] == 'RA') echo 'selected' ?>>Rathmalana</option>
                            </select>

                        </div>
                    </li>
                    <li class="col-md-4">
                        <div class="form-group">
                            <label for="division">Regional Secretariat Division</label>
                            <label for="division">(ප්‍රාද්ශීය ලේකම් කොට්ඨාසය)</label>
                            <input name="division" id="division" value="<?php echo  $data['regionalDivision'] ?>" class="form-control" disabled>
                        </div>
                    </li>
                    <li class="col-md-4">
                        <div class="form-group">
                            <label for="domain">Village Officer Domain</label>
                            <label for="domain">(ග්‍රාම නිලධාරී වසම)</label>
                            <input type="text" name="domain" id="domain" class="form-control" value="<?php echo  $data['villageDomain'] ?>" placeholder="Village Officer Domain" disabled />

                        </div>
                    </li>
                </div>
                <div class="row mt-1">
                    <li class="col-md-8">
                        <div class="form-group">
                            <label for="referrer">Referred person</label>
                            <label for="referrer">(යොමු කල පුද්ගලයා)</label>
                            <input type="text" name="referrer" id="referrer" value="<?php echo  $data['referredPerson'] ?>" class="form-control" placeholder="Referred person" disabled>

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
                            <select name="reason" id="reason" class="form-control" disabled>
                                <option value="">Select Reason</option>
                                <?php
                                if (count($dataSet) > 0) {
                                    foreach ($dataSet as $category) {
                                ?>
                                        <option value="<?php echo $category[2] ?>" <?php if ($category[2] == $data['reason']) echo 'selected' ?>><?php echo $category[1] ?></option>
                                <?php
                                    }
                                }
                                ?>

                            </select>

                        </div>
                    </li>
                </div>
                <li>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <label for="description">(විස්තරය)</label>
                        <textarea name="description" id="description" rows="10" class="form-control" placeholder="Write your description..." disabled> <?php echo $data['description'] ?></textarea>
                    </div>
                </li>
            </ol>
            <div class="text-center mb-5">

                <p class="text-dark">I hereby confirm that I have inspected the above business and that the business is eligible for registration.</p>
            </div>
            <div class="row justify-content-between mb-5">

                <div class="col-md-3">
                    <p>Submitted Date:<?php echo date("Y-m-d", strtotime($data['date'])); ?></p>
                </div>

            </div>
            <div class="row justify-content-between mb-5">
                <div class="col-md-6">
                    <p>Checked by: <b><?php
                                        echo $data['approved_sign'];
                                        ?></b></p>
                </div>
                <div class="col-md-3">
                    <p>Approved Date:<?php if ($data['approval'] == '1') {
                                            echo date("Y-m-d", strtotime($data['approved_date']));
                                        }; ?></p>
                </div>

            </div>

        </form>
    </div>
    <?php
    if ($_SESSION['TYPE'] == '1' || $_SESSION['TYPE'] == '2' && ($data['approval'] == '0')) {
    ?>
        <div class="m-3 text-center">
            <a href="php/submit_application.php?status=true&id=<?php echo $id ?>"><input type="submit" value="Approve" name="approve" id="approve" class="btn btn-success" style="background:green;"></a>
            <a href="php/submit_application.php?status=false&id=<?php echo $id ?>"><input type="submit" value="Reject" name="reject" id="reject" class="btn btn-danger"></a>
        </div>
    <?php
    }
    ?>
</div>
<?php
include 'support/footer.php';
?>