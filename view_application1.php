<?php
$page = "application-view";
include 'support/header.php';
?>
<?php
$id = $_GET['id'];

$sql = "SELECT * FROM business_registration WHERE f_id='$id'";

$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>
<div class="container p-1">
    <div class="border p-2">
        <h1>Business Registration Form</h1>
        <form action="#" method="POST">
            <ol>
                <li>
                    <div class="form-group">
                        <label for="bName">Name of the business</label>
                        <label for="bName">(ව්‍යාපාපාරයේ නාමය)</label>
                        <input type="text" name="bName" id="bName" value="<?php echo $data['b_name']; ?>" class="form-control" disabled>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <label for="bForm">The general form of the business</label>
                        <label for="bForm">(ව්‍යාපාපාරයේ සාමාන්‍ය ස්වරූපය)</label>
                        <input type="text" name="bForm" id="bForm" value="<?php echo $data['b_form']; ?>" class="form-control" disabled>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <label for="bAddress">Address of the place of business</label>
                        <label for="bAddress">(ව්‍යාපාපාරික ස්ථානයේ ලිපිනය)</label>
                        <input type="address" name="bAddress" id="bAddress" value="<?php echo $data['b_address']; ?>" class="form-control" disabled>
                    </div>
                </li>
                <div class="row no-gutters">
                    <li class="col-md-6">
                        <div class="form-group">
                            <label for="bDate">Date of commencement of business</label>
                            <label for="bDate">(ව්‍යාපාපාරය ආරම්භ කළ දිනය)</label>
                            <input type="date" name="bDate" id="bDate" value="<?php echo $data['b_date']; ?>" class="form-control" disabled>
                        </div>
                    </li>
                    <li class="col-md-4 ml-md-5">
                        <div class="form-group">
                            <label for="bCount">Number of employees</label>
                            <label for="bCount">(සේවයේ නියුතු සංඛ්‍යාව)</label>
                            <input type="text" name="bCount" id="bCount" value="<?php echo $data['b_emp_count']; ?>" class="form-control" disabled>
                        </div>
                    </li>
                </div>
                <li>
                    <div class="form-group">
                        <label for="bSubName">If the owner/ owners are engaged in another business, the business name<label>
                                <label for="bSubName">(අයිතිකරු/ අයිතිකරුවන් වෙනත් ව්‍යාපාරයක යෙදී සිටියි නම් එහි නම)</label>
                                <input type="text" name="bSubName" id="bSubName" value="<?php echo $data['b_sub_name']; ?>" class="form-control" disabled>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <label for="bOwnerAddress">Address of the owner</label>
                        <label for="bOwnerAddress">(අයිතිකරුගේ ලිපිනය)</label>
                        <input type="text" name="bOwnerAddress" id="bOwnerAddress" value="<?php echo $data['b_owner_address']; ?>" class="form-control" disabled>
                    </div>
                </li>
                <div class="row no-gutters">
                    <li class="col-md-4 mr-md-5">
                        <div class="form-group">
                            <label for="bContact">Phone number where the owner can be contact</label>
                            <label for="bContact">(අයිතිකරු සම්බන්ධ කරගත හැකි දුරකතන අංකය)</label>
                            <input type="text" name="bContact" id="bContact" value="<?php echo $data['b_contact']; ?>" class="form-control" disabled>
                        </div>
                    </li>
                    <li class="col-md-6">
                        <div class="form-group">
                            <label for="bCitizenship">Citizenship of the owners</label>
                            <label for="bCitizenship">(අයිතිකරුවන්ගේ පුරවැසිභාවය)</label>
                            <input type="text" name="bCitizenship" id="bCitizenship" value="<?php echo $data['b_citizenship']; ?>" class="form-control" disabled>
                        </div>
                    </li>
                </div>

                <li>
                    <div class="form-group">
                        <label for="bEmail">Email of the owners</label>
                        <label for="bEmail">(අයිතිකරුවන්ගේ විද්‍යුත් ලිපිනය)</label>
                        <input type="email" name="bEmail" id="bEmail" value="<?php echo $data['b_email']; ?>" class="form-control" disabled>
                    </div>
                </li>
                <div class="row no-gutters">
                    <li class="col-md-6">
                        <div class="form-group">
                            <label for="bOwnership">Ownership of the place of business</label>
                            <label for="bOwnership">(ව්‍යාපාපාරික ස්ථානයේ අයිතිය)</label>
                            <input type="text" name="bOwnership" id="bOwnership" value="<?php echo $data['b_ownership']; ?>" class="form-control" disabled>
                        </div>
                    </li>
                    <li class="col-md-4 ml-md-5">
                        <div class="form-group">
                            <label for="bDivision">Grama Niladhari division</label>
                            <label for="bDivision">(ග්‍රාම නිලධාරී වසම)</label>
                            <input type="text" name="bOwnership" id="bOwnership" value="<?php echo $data['b_grama_division']; ?>" class="form-control" disabled>

                        </div>
                    </li>
                </div>
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
                    <p>Checked by:</p>
                </div>
                <div class="col-md-3">
                    <p>Approved Date:<?php if ($data['secretary_approval'] == '1') {
                                            echo date("Y-m-d", strtotime($data['approved_date']));
                                        }; ?></p>
                </div>

            </div>
            <div class="row justify-content-center">
                <div class="col-5 ml-md-5">
                    <p><b><?php if ($data['secretary_approval'] == '1') {
                                echo $data['secretary_sign'];
                            }; ?></b><br>
                        Divisional secretary<br>
                        ප්‍රාදේශීය ලේකම්</p>
                </div>
                <div class="col-5 ml-md-5 ">
                    <p><b><?php if ($data['grama_niladhari_approval'] == '1') {
                                echo $data['grama_niladhari_sign'];
                            }; ?></b><br>
                        Grama Niladhari <br>
                        ග්‍රාම නිලධාරී</p>
                </div>
            </div>
        </form>
    </div>
    <?php
    if ($_SESSION['TYPE'] == '1' || $_SESSION['TYPE'] == '2') {
    ?>
        <div class="m-3 text-center">
            <a href="php/submit_application.php?type=1&status=true&id=<?php echo $id ?>"><input type="submit" value="Approve" name="approve" id="approve" class="btn btn-success" style="background:green;"></a>
            <a href="php/submit_application.php?type=1&status=false&id=<?php echo $id ?>"><input type="submit" value="Reject" name="reject" id="reject" class="btn btn-danger"></a>
        </div>
    <?php
    }
    ?>
</div>
<?php
include 'support/footer.php';
?>