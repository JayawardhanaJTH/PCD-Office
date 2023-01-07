<?php
session_start();
require_once("../connection/connection.php");

$searchText = $_POST['searchText'];
$query = "SELECT * FROM application WHERE nic like '%$searchText%' || applicationNo like '%$searchText%' ORDER by applicationId";

$rs = $conn->query($query);

$output = " <div class='row justify-content-between pl-4 pr-4'>
<div>
  <h5>Search Text : " . $searchText . "</h5>
</div>
<div>
  <h5>Found : " . mysqli_num_rows($rs) . " </h5>
</div>
</div>";

$output .= "
        <table id=\"example1\" class=\"table hover table-bordered \">
            <thead class='text-center'>
            <tr>    
                <th hidden>Id</th>          
                <th>Application No</th>
                <th>Submitted Date</th>
                <th>Status</th>              
                <th>Reason</th>
                 
            </tr>
            </thead>
            <tbody class='text-center'>
    ";



while ($row = $rs->fetch_assoc()) {
  $id = $row['applicationId'];
  $applicationNo = $row['applicationNo'];
  $date = $row['date'];
  $approval = $row['approval'];
  $reason = $row['reason'];

  $status = "Not Approved";

  if ($approval == 1) {
    $status = "Approved";
  } else if ($approval == 0) {
    $status = "Not Approved";
  } else {
    $status = "Rejected";
  }

  $sql2 = "SELECT categoryName FROM application_category WHERE categoryCode = '$reason'";
  $result2 = mysqli_query($conn, $sql2);
  $cat = mysqli_fetch_assoc($result2);
  $category = $cat['categoryName'];

  $output .= "
            <tr>
                <td hidden>$id</td>
                <td><a href='view_application.php?id=" . $id . "'> $applicationNo</a></td>
                <td>$date</td>            
                <td>$status</td>
                <td>$category</td>
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
