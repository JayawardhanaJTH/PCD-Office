<?php

$page = "downloads";
setcookie("pageName", $page, time() + (86400 * 30), "/");

include 'support/header.php';

?>
<div class="container">
    <!-- download items section -->
    <div class="row p-2">
        <?php
        //load data 
        $sql = "SELECT * FROM applications";
        $result = mysqli_query($conn, $sql);

        $fileSet = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if (count($fileSet) > 0) {
            $count = count($fileSet);
            $i = 0;
        ?>
            <div class="col-sm-12 col-md-6">
                <?php
                for (; $i < $count / 2;) {
                    $file = $fileSet[$i];
                    $i++;
                ?>
                    <div class="download_item card m-1">
                        <div class="row no-gutters card-body align-items-center">
                            <div class="col-8">
                                <h5 class="card-title"><?php echo $file['name'] ?></h5>
                                <p class="card-text"><?php echo $file['description'] ?></p>
                                <p class="card-text">Downloads: <?php echo $file['downloads'] ?></p>
                            </div>
                            <div class="col text-center">
                                <a href="php/downloads_add.php?file_download=<?php echo $file['id'] ?>" class="text-decoration-none text-dark" data-toggle="tooltip" data-placement="top" title="Download">
                                    <span class="download_icon text-primary"><i class="fa fa-download"></i></span>
                                </a>
                            </div>
                            <?php
                            if ($_SESSION['TYPE'] == '1') {
                            ?>
                                <div class="col text-center">
                                    <a href="downloads.php?file_edit=<?php echo $file['id'] ?>" class="text-decoration-none text-dark" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <span class="download_icon text-success"><i class="fa fa-edit"></i></span>
                                    </a>
                                </div>
                                <div class="col text-center">
                                    <a href="php/downloads_add.php?file_delete=<?php echo $file['id'] ?>" class="text-decoration-none text-dark" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <span class="download_icon text-danger"><i class="fa fa-trash-alt"></i></span>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="col-sm-12 col-md-6">
                <?php
                $count = round($count / 2);

                for (; $i <= $count; $i++) {
                    $file = $fileSet[$i];
                ?>
                    <div class="download_item card m-1">
                        <div class="row no-gutters card-body align-items-center">
                            <div class="col-8">
                                <h5 class="card-title"><?php echo $file['name'] ?></h5>
                                <p class="card-text"><?php echo $file['description'] ?></p>
                                <p class="card-text">Downloads: <?php echo $file['downloads'] ?></p>
                            </div>
                            <div class="col text-center">
                                <a href="php/downloads_add.php?file_download=<?php echo $file['id'] ?>" class="text-decoration-none text-dark" data-toggle="tooltip" data-placement="top" title="Download">
                                    <span class="download_icon text-primary"><i class="fa fa-download"></i></span>
                                </a>
                            </div>
                            <?php
                            if ($_SESSION['TYPE'] == '1') {
                            ?>
                                <div class="col text-center">
                                    <a href="downloads.php?file_edit=<?php echo $file['id'] ?>" class="text-decoration-none text-dark" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <span class="download_icon text-success"><i class="fa fa-edit"></i></span>
                                    </a>
                                </div>
                                <div class="col text-center">
                                    <a href="php/downloads_add.php?file_delete=<?php echo $file['id'] ?>" class="text-decoration-none text-dark" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <span class="download_icon text-danger"><i class="fa fa-trash-alt"></i></span>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
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
</div>
<?php
if ($_SESSION['TYPE'] == '1' || $_SESSION['TYPE'] == '2') {
    if (isset($_GET['file_edit'])) {
        $id = $_GET['file_edit'];

        $sqlEdit = "SELECT * FROM applications WHERE id='$id'";

        $result = mysqli_query($conn, $sqlEdit);
        $fileEdit = mysqli_fetch_assoc($result);

        $path = "../uploadFiles/applications/" . $file['upload_Name'];
    }
?>
    <!-- Admin Side  -->
    <div class="container border p-1 mb-2">
        <h5 class="text-center">Add File</h5>

        <form action="php/downloads_add.php" method="POST" enctype="multipart/form-data" class="m-1" onsubmit="return validateForm_down()">
            <div class="form-group">
                <label for="fileName">File Name</label>
                <input type="text" name="fileName" id="fileName" class="form-control" value="<?php if (isset($fileEdit)) {
                                                                                                    echo $fileEdit['name'];
                                                                                                } ?>">
            </div>
            <div class="form-group">
                <label for="fileDescription">File Description</label>
                <input type="text" name="fileDescription" id="fileDescription" class="form-control" value="<?php if (isset($fileEdit)) {
                                                                                                                echo $fileEdit['description'];
                                                                                                            } ?>">
            </div>
            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="file" id="file" class="form-control" value="<?php if (isset($fileEdit)) {
                                                                                            echo $fileEdit['upload_Name'];
                                                                                        } ?>">
            </div>

            <div>
                <?php
                if (isset($fileEdit)) {
                ?>
                    <input type="hidden" value="<?php echo $fileEdit['id'] ?>" name="f_id">
                <?php
                }
                ?>
                <input type="submit" value="<?php if (isset($fileEdit)) {
                                                echo 'Upload';
                                            } else {
                                                echo 'Save';
                                            } ?>" name="<?php if (isset($fileEdit)) {
                                                            echo 'edit_file';
                                                        } else {
                                                            echo 'save_file';
                                                        } ?>" class="btn">
            </div>
        </form>
    </div>

<?php
}
include "support/footer.php";
?>

<?php
if (isset($_SESSION["file_upload"])) {
    if ($_SESSION["file_upload"] == true) {
        unset($_SESSION["file_upload"]);
?>
        <script type="text/javascript">
            success_popup('File has been saved');
        </script>
    <?php
    } else if ($_SESSION["file_upload"] == false) {
        unset($_SESSION["file_upload"]);
    ?>
        <script type="text/javascript">
            error_popup('File has been not saved');
        </script>
<?php
    }
}
?>

<?php
if (isset($_SESSION["file_delete"])) {
    if ($_SESSION["file_delete"] == true) {
        unset($_SESSION["file_delete"]);
?>
        <script type="text/javascript">
            success_popup('File has been deleted');
        </script>
    <?php
    } else if ($_SESSION["file_delete"] == false) {
        unset($_SESSION["file_delete"]);
    ?>
        <script type="text/javascript">
            error_popup('File has been not deleted');
        </script>
<?php
    }
}
?>

<?php
if (isset($_SESSION["extension_error"])) {
?>
    <script type="text/javascript">
        success_popup($_SESSION["extension_error"]);
    </script>
<?php
    unset($_SESSION["extension_error"]);
}
?>