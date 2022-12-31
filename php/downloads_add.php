<?php
    session_start();
    require('../connection/connection.php');
?>

<?php
    if(isset($_POST['save_file'])){

        try{

            $file = $_FILES['file']['name'];
            $temp = $_FILES['file']['tmp_name'];
            
            $path = "../uploadFiles/applications/".$file;
            
            $fileName = $_POST['fileName'];
            $fileDescription = $_POST['fileDescription'];
            
            $extension = pathinfo($file, PATHINFO_EXTENSION);
        }
        catch(Exception $ex){
            header('location: ../downloads.php');
            exit();
        }

        if(!in_array($extension,['pdf', 'docx'])){
            $_SESSION['extension_error'] = "The file extension is not pdf or docx format";
            session_write_close();

            header('location: ../downloads.php');
            exit();
        }
        else if(in_array($extension,['pdf', 'docx'])){
            if(move_uploaded_file($temp, $path)){
                $sql = "INSERT INTO applications (name, description, upload_Name, downloads) 
                    VALUES ('$fileName', '$fileDescription', '$file', 0)";

                if(mysqli_query($conn, $sql)){
                    $_SESSION['file_upload'] = true;
                    session_write_close();
                    // echo "Uploaded";
                    header('location: ../downloads.php');
                    exit();
                }
                else{
                    $_SESSION['file_upload'] = false;
                    session_write_close();
                    // echo $sql;
                    header('location: ../downloads.php');
                    exit();
                }
            }
        }
        else{
            header('location: ../downloads.php');
            exit();
        }
    }

    if(isset($_POST['edit_file'])){
        $id = $_POST['f_id'];
        try{

            $file = $_FILES['file']['name'];
            $temp = $_FILES['file']['tmp_name'];
            
            $path = "../uploadFiles/applications/".$file;
            
            $fileName = $_POST['fileName'];
            $fileDescription = $_POST['fileDescription'];
            
            $extension = pathinfo($file, PATHINFO_EXTENSION);
        }
        catch(Exception $ex){
            header('location: ../downloads.php');
            exit();
        }

        if(!in_array($extension,['pdf', 'docx'])){
            $_SESSION['extension_error'] = "The file extension is not pdf or docx format";
            session_write_close();

            header('location: ../downloads.php');
            exit();
        }
        else if(in_array($extension,['pdf', 'docx'])){
            if(move_uploaded_file($temp, $path)){
                $sql = "UPDATE applications SET name='$fileName', description='$fileDescription', upload_Name='$file' 
                    WHERE id='$id'";

                if(mysqli_query($conn, $sql)){
                    $_SESSION['file_upload'] = true;
                    session_write_close();
                    // echo "Uploaded";
                    header('location: ../downloads.php');
                    exit();
                }
                else{
                    $_SESSION['file_upload'] = false;
                    session_write_close();
                    // echo $sql;
                    header('location: ../downloads.php');
                    exit();
                }
            }
        }
        else{
            header('location: ../downloads.php');
            exit();
        }
    }

    if(isset($_GET['file_download'])){
        $id = $_GET['file_download'];

        $sql = "SELECT * FROM applications WHERE id='$id'";

        $result = mysqli_query($conn, $sql);
        $file = mysqli_fetch_assoc($result);

        $path = "../uploadFiles/applications/".$file['upload_Name'];

        if(file_exists($path)){

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($path));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize('../uploadFiles/applications/' . $file['upload_Name']));

            readfile($path);
// echo 'DB - '.$file['downloads'];
            $downloads = $file['downloads'] + 1;
// echo ' Add - '.$downloads;
            $update_sql = "UPDATE applications SET downloads='$downloads' WHERE id='$id'";

            mysqli_query($conn, $update_sql);

            $_SESSION['file_download'] = true;
            session_write_close();

            // echo $downloads;
            header('location: ../downloads.php');
            exit();
        }
        else{
            $_SESSION['file_download'] = false;
            session_write_close();
            
            header('location: ../downloads.php');
            exit();
        }
    }

    if (isset($_GET['file_delete'])){
        $id = $_GET['file_delete'];

        $sql = "SELECT * FROM applications WHERE id='$id'";

        $result = mysqli_query($conn, $sql);
        $file = mysqli_fetch_assoc($result);

        $path = "../uploadFiles/applications/".$file['upload_Name'];

        $sql = "DELETE FROM applications WHERE id='$id'";

        if(mysqli_query($conn, $sql)){
            $_SESSION['file_delete'] = true;
            session_write_close();
            
            unlink($path);
            
            header('location: ../downloads.php');
            exit();
        }
        else{
            $_SESSION['file_delete'] = false;
            session_write_close();
            
            header('location: ../downloads.php');
            exit();
        }
    }

    if(isset($_GET['file_edit'])){

    }
?>