<?php
    session_start();
    require_once('../connection/connection.php');

    if(isset($_POST['event_save'])){
        
        $errors = array();
        if(isset($_FILES["event_image"])){

            try{

                $event_name = $_POST['event_name'];
                $event_date = $_POST['event_date'];
                
                
                $event_image_name = $_FILES['event_image']['name'];
                $event_image_temp = $_FILES['event_image']['tmp_name'];
                $event_image_ext = pathinfo($event_image_name, PATHINFO_EXTENSION);
                $event_description = $_POST['event_description'];
                
                $extensions= array("jpeg","jpg","png");
            }
            catch(Exception $ex){
                $errors[]="File not selected";
                $_SESSION["event_error"] = $errors;
                session_write_close();

                header ("location: ../event.php" );
                exit();
            }
            
            if(in_array($event_image_ext,$extensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                $_SESSION["event_error"] = $errors;
                session_write_close();

                header ("location: ../event.php" );
                exit();
            }else{
            
                $sql = "INSERT INTO events(e_name, e_date, e_image, e_description) 
                    VALUES ('$event_name','$event_date','$event_image_name','$event_description')";
    
                if(mysqli_query($conn,$sql)){
                    move_uploaded_file($event_image_temp,"../uploadFiles/images/".$event_image_name);

                    $_SESSION["UPLOAD"] = "success";
                    session_write_close();

                    header ("location: ../event.php" );
                    exit();
                }
                else{
                    $_SESSION["UPLOAD"] = "unsuccess";
                    session_write_close();

                    header ("location: ../event.php" );
                    exit();
                }
            }
        }else{
            $errors[]="File not selected";
            $_SESSION["event_error"] = $errors;
            session_write_close();

            header ("location: ../event.php" );
            exit();
        }
    }

    if(isset($_POST['event_update'])){
        
        $errors = array();
        if(isset($_FILES["event_image"])){

            $event_name = $_POST['event_name'];
            $event_date = $_POST['event_date'];


            $event_image_name = $_FILES['event_image']['name'];
            $event_image_temp = $_FILES['event_image']['tmp_name'];
            $event_image_ext = pathinfo($event_image_name, PATHINFO_EXTENSION);
            $event_description = $_POST['event_description'];
            $event_id = $_POST['e_id'];

            $extensions= array("jpeg","jpg","png");
            
            if(in_array($event_image_ext,$extensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                echo 'extension not allowed, please choose a JPEG or PNG file.';
            }else{
            
                $sql = "UPDATE events 
                    SET e_name = '$event_name', e_date = '$event_date', e_image = '$event_image_name', e_description = '$event_description'
                    WHERE e_id = '$event_id'";
    
                if(mysqli_query($conn,$sql)){
                    move_uploaded_file($event_image_temp,"../uploadFiles/images/".$event_image_name);

                    $_SESSION["UPLOAD"] = "success";
                    session_write_close();

                    header ("location: ../event.php" );
                    exit();
                }
                else{
                    $_SESSION["UPLOAD"] = "unsuccess";
                    session_write_close();
                    die("Query failed: ".mysqli_error($conn));
                    echo 'file error';
                }
            }
        }else{
            echo 'file error';
        }
    }

    if(isset($_GET["view_id"])){
        $e_id = $_GET['view_id'];

        $_SESSION["EVENT_ID"] = $e_id;
        session_write_close();

        header('location: ../event.php');
        exit();
    }
    
    if(isset($_GET["event_delete"])){
        $e_id = $_GET['delete_id'];

        $event_image_name = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM event WHERE  e_id = '$e_id'"));

        $sql = "DELETE FROM events WHERE e_id ='$e_id'";
        
        if(mysqli_query($conn,$sql)){
            $_SESSION["DELETE_ED"] = "success";
            session_write_close();

            unlink("../uploadFiles/images/"+$event_image_name['e_image']);

            header('location: ../event.php');
            exit();
        }else{
            echo mysqli_error();
            
            $_SESSION["DELETE_ED"] = "unsuccess";
            session_write_close();

            header('location: ../event.php');
            exit();
        }
    }

    if(isset($_GET["event_edit"])){
        $e_id = $_GET['edit_id'];

        $_SESSION["EDIT"] = "success";
        $_SESSION["EDIT_ID"] = $e_id;
        
        session_write_close();

        header('location: ../event.php');
        exit();
        
    }
    
?>