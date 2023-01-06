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
        <input type="date" name="fromDate" class="form-control ml-2 mr-2" />
        <label> To: </label>
        <input type="date" name="toDate" class="form-control ml-2 mr-5" />
        <input type="submit" class="btn btn-infor btn-sm" value="Search" name="searchSummary" />
      </div>
    </form>
  </div>
  <?php
  if (isset($_GET['searchSummary'])) {
    $fromDate = $_GET['fromDate'];
    $toDate = $_GET['toDate'];

    $sql = "SELECT * FROM application WHERE date BETWEEN '$fromDate' AND '$toDate'";

  }
  ?>
  <div class="p-5">
    <div class="card-deck">
      <div class="card">
        <div class="card-body text-center">
          <h1 class="h3">Total submitted applications</h1>
          <h2 class="h2 mt-5">50</h2>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center">
          <h1 class="h3">Total accepted applications</h1>
          <h2 class="h2 mt-5">50</h2>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center">
          <h1 class="h3">Total rejected applications</h1>
          <h2 class="h2 mt-5">50</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include "support/footer.php";
?>