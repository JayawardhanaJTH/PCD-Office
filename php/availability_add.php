<?php
require "../connection/connection.php";

    if(isset($_POST)){
        $status = $_POST['availability'];
        $text = "0";

        if($status == 'available'){
            $text = "1";
        }

        $sql = "UPDATE availability SET status='$text' WHERE id ='1'";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("location: ../details.php");
        }
        else{
            echo $conn->connect_error;
        }
    }

?>