<?php
session_start();
require_once(__DIR__ . '/../connection/connection.php');

if ($_POST['id'] == "insert") {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $nic = $_POST['nic'];
    $gender = $_POST['gender'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    $encPassword = md5($password);

    $to = $email;
    $mailSubject =  "Secretary Divisions Account Created..";
    $emailBody = "Your <b>Username :</b> $email <br>";
    $emailBody .= "Your <b>Password :</b> $password <br>Thank You !";

    $header = "From: secraterywththala@gmail.com\r\nContent-Type: text/html;";

    $sen = mail($to, $mailSubject, $emailBody, $header);

    if ($sen) {
        echo "1";
    } else {
        echo "not send";
    }

    $sql = "INSERT INTO staff( firstName, lastName, email, username, gender, contactNumber, address, password, nic,type) 
    	VALUES ('$first_name','$last_name','$email', '$username', '$gender', '$contact_number', '$address', '$encPassword', '$nic',2)";


    if (mysqli_query($conn, $sql)) {
    } else {
    }
    mysqli_close($conn);
}

if ($_POST['id'] == "show") {

    $output = "";

    $output .= "
        <table id=\"example1\" class=\"table hover table-bordered \">
            <thead class='text-center'>
            <tr>    
                <th hidden>Id</th>          
                <th>First Name</th>
                <th>Last Name</th>              
                <th>Email</th>
                <th>Username</th>
                <th>Gender</th>
                <th>Contact Number</th>  
                <th>Control</th>        
            </tr>
            </thead>
            <tbody class='text-center'>
    ";

    $query = "SELECT * FROM staff WHERE type = '2' ORDER by staffId";

    $rs = $conn->query($query);

    while ($row = $rs->fetch_assoc()) {
        $staffId = $row['staffId'];
        $first_name = $row['firstName'];
        $last_name = $row['lastName'];
        $username = $row['username'];
        $email = $row['email'];
        $gender = $row['gender'];
        $contact_number = $row['contactNumber'];
        $address = $row['address'];
        $nic = $row['nic'];

        $output .= "
            <tr>
                <td hidden>$staffId</td>
                <td>$first_name</td>
                <td>$last_name</td>            
                <td>$email</td>
                <td>$$username</td>
                <td>$gender</td>
                <td>$contact_number</td>
                <td class='text-center btn-group'><button 
                onclick='getStaffDetails(\"$staffId\", \"$first_name\", \"$last_name\", \"$username\", \"$email\",
                \"$gender\", \"$contact_number\", \"$address\", \"$nic\")' title='Update Staff Details' class='btn '  type='button' data-toggle='modal' data-target='#staff_details_update'><span><i class=\"fa fa-edit\"></i></span></button>
                    <button onclick='delete_staff($staffId)' title='Delete Staff Details' class=\"btn \"><span><i class=\"fas fa-user-times\"></i></span></span></button>
                </td>
            </tr>
        ";
    }

    $output .= '
        </tbody>
    </table>

   <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");
    });
  </script>

    ';

    echo $output;
}

if ($_POST['id'] == "update") {

    $update_staffId = $_POST['update_staffId'];
    $update_first_name = $_POST['update_first_name'];
    $update_last_name = $_POST['update_last_name'];
    $update_username = $_POST['update_username'];
    $update_email = $_POST['update_email'];
    $update_nic = $_POST['update_nic'];
    $update_gender = $_POST['update_gender'];
    $update_contact_number = $_POST['update_contact_number'];
    $update_address = $_POST['update_address'];

    $sql = "update staff set firstName='$update_first_name', lastName='$update_last_name', email='$update_email', nic='$update_nic', 
                  gender='$update_gender', contactNumber='$update_contact_number', address='$update_address', username='$update_username' where staffId='$update_staffId'";


    if (mysqli_query($conn, $sql)) {
        //        echo json_encode(array("statusCode"=>200));
        echo 1;
    } else {
        //        echo json_encode(array("statusCode"=>201));
    }
    mysqli_close($conn);
}

if ($_POST['id'] == "delete") {

    $staffId = $_POST['staffId'];

    $sql = "delete from staff where staffId='$staffId'";
    if (mysqli_query($conn, $sql)) {
        echo 1;
    } else {
        echo 2;
    }
    mysqli_close($conn);
}
