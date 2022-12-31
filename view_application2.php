<?php
$page = "application-view";

include 'support/header.php';
?>
<?php
$id = $_GET['id'];

$sql = "SELECT * FROM requirement_application WHERE f_id='$id'";

$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>
<div class="container p-1">
    <div class="border p-2">
        <h1>Requirement Application</h1>
        <form action="#" method="POST">
            <ol>
                <li>
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <label for="fullName">(සම්පූර්ණ නම)</label>
                        <input type="text" name="fullName" id="fullName" value="<?php echo $data['full_name']; ?>" class="form-control" disabled>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <label for="address">(ලිපිනය)</label>
                        <input type="text" name="address" id="address" value="<?php echo $data['address']; ?>" class="form-control" disabled>
                    </div>
                </li>
                <div class="row no-gutters">
                    <li class="col-md-6">
                        <div class="form-group">
                            <label for="division">Grama Niladari Area</label>
                            <label for="division">(ග්‍රාම නිලධාරී වසම)</label>
                            <input type="text" name="address" id="address" value="<?php echo $data['division']; ?>" class="form-control" disabled>

                        </div>
                    </li>
                    <li class="col-md-4 ml-md-5">
                        <div class="form-group">
                            <label for="contact">Telephone number</label>
                            <label for="contact">(දුරකතන අංකය)</label>
                            <input type="text" name="contact" id="contact" value="<?php echo $data['contact']; ?>" class="form-control" disabled>
                        </div>
                    </li>
                </div>
                <li>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <label for="email">(විදයුත් ලිපිනය)</label>
                        <input type="text" name="email" id="email" value="<?php echo $data['email']; ?>" class="form-control" disabled>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <label for="requirement">Requirement<label>
                                <label for="requirement">(අවශ්‍යතාවය)</label>
                                <input type="text" name="requirement" id="requirement" value="<?php echo $data['requirement']; ?>" class="form-control" disabled>
                    </div>
                </li>
                <div class="row no-gutters">
                    <li class="col-md-6">
                        <div class="form-group">
                            <label for="nic">ID No</label>
                            <label for="nic">(ජාතික හැදුහැදුනුම්පත් අංකය)</label>
                            <input type="text" name="nic" id="nic" value="<?php echo $data['nic']; ?>" class="form-control" disabled>
                        </div>
                    </li>
                    <li class="col-md-4 ml-md-5">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <label for="gender">(ස්ත්‍රී/ පුරුෂ භාවය)</label>
                            <input type="text" name="nic" id="nic" value="<?php echo $data['gender']; ?>" class="form-control" disabled>

                        </div>
                    </li>
                </div>
            </ol>

            <div class="text-center mb-5">
                <p class="text-dark">I hereby confirm that I have inspected the above requirement of citizen who lives in Wattala division.</p>
            </div>
            <div class="row justify-content-between mb-5">

                <div class="col-md-3">
                    <p>Submitted Date:<?php echo date("Y-m-d", strtotime($data['date'])); ?></p>
                </div>

            </div>

            <div class="row justify-content-between mb-5">
                <div class="col-md-3">
                    <p>Approved Date:<?php if ($data['grama_approval'] == '1') {
                                            echo date("Y-m-d", strtotime($data['approved_date']));
                                        }; ?></p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-5 ml-md-5">
                    <p><b><?php if ($data['grama_approval'] == '1') {
                                echo $data['grama_niladhari_sign'];
                            }; ?></b><br>
                        Grama Niladhari <br>
                        ග්‍රාම නිලධාරී</p>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
if ($_SESSION['TYPE'] == '2') {
?>
    <div class="m-3 text-center">
        <a href="php/submit_application.php?type=2&status=true&id=<?php echo $id ?>"><input type="submit" value="Approve" name="approve" id="approve" class="btn btn-success" style="background:green;"></a>
        <a href="php/submit_application.php?type=2&status=false&id=<?php echo $id ?>"><input type="submit" value="Reject" name="reject" id="reject" class="btn btn-danger"></a>
    </div>
<?php
}
?>
<?php
include 'support/footer.php';
?>
<script src="js/online_application_add.js"></script>