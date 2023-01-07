<?php

$page = "summary";
include "support/header.php";
?>

<link href="layout/styles/dashboard.css" rel="stylesheet" type="text/css" media="all" />

<div class="mt-5 text-center">
  <h1 class="h1 font-weight-bolder">Summary</h1>
</div>
<div class="m-2 p-5">
  <div class="row justify-content-center">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
      <div class="form-inline">
        <label>Date From: </label>
        <input type="date" name="fromDate" class="form-control ml-2 mr-2" required />
        <label> To: </label>
        <input type="date" name="toDate" class="form-control ml-2 mr-5" required />
        <input type="submit" class="btn btn-infor btn-sm" value="Search" name="searchSummary" />
      </div>
    </form>
  </div>
  <?php
  if (isset($_GET['searchSummary'])) {
    $fromDate = $_GET['fromDate'];
    $toDate = $_GET['toDate'];

    $data = array();

    mysqli_multi_query($conn, "CALL application_summary ('$fromDate','$toDate')");

    while (mysqli_more_results($conn)) {

      if ($result = mysqli_store_result($conn)) {

        while ($row = mysqli_fetch_assoc($result)) {
          $data[] = $row;
        }
        mysqli_free_result($result);
      }
      mysqli_next_result($conn);
    }

    unset($_GET['searchSummary']);
  ?>

    <div class="row justify-content-around border mt-5">
      <div class="p-1"> From: <?php echo $fromDate ?></div>
      <div class="p-1"> To: <?php echo $toDate ?></div>
    </div>

    <div class="p-5">
      <div class="card-deck">
        <div class="card">
          <a href="approvals.php" class="text-decoration-none">
            <div class="card-body text-center">
              <h1 class="h3">Total submitted applications</h1>
              <h2 class="h2 mt-5"><?php echo $data[0]['Total']; ?></h2>
            </div>
          </a>
        </div>
        <div class="card">
          <a href="approvals.php?showType=0" class="text-decoration-none">
            <div class="card-body text-center">
              <h1 class="h3">Total pending applications</h1>
              <h2 class="h2 mt-5"><?php echo $data[1]['Pending']; ?></h2>
            </div>
          </a>
        </div>
        <div class="card">
          <a href="approvals.php?showType=1" class="text-decoration-none">
            <div class="card-body text-center">
              <h1 class="h3">Total accepted applications</h1>
              <h2 class="h2 mt-5"><?php echo $data[2]['Approved']; ?></h2>
            </div>
          </a>
        </div>
        <div class="card">
          <a href="approvals.php?showType=3" class="text-decoration-none">
            <div class="card-body text-center">
              <h1 class="h3">Total rejected applications</h1>
              <h2 class="h2 mt-5"><?php echo $data[3]['Rejected']; ?></h2>
            </div>
          </a>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
</div>

<?php
include "support/footer.php";
?>