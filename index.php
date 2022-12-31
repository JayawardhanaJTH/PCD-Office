<?php

$page = "home";
setcookie("pageName", $page, time() + (86400 * 30), "/");

include 'support/header.php';
?>
<!-- Carousel -->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleSlidesOnly" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleSlidesOnly" data-slide-to="1"></li>
		<li data-target="#carouselExampleSlidesOnly" data-slide-to="2"></li>
		<li data-target="#carouselExampleSlidesOnly" data-slide-to="3"></li>
		<li data-target="#carouselExampleSlidesOnly" data-slide-to="4"></li>

	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img class="d-block w-100" src="images/carosal1.jpg" alt="First slide">
		</div>
		<div class="carousel-item ">
			<img class="d-block w-100" src="images/carosal2.jpg" alt="Second slide">
		</div>
		<div class="carousel-item ">
			<img class="d-block w-100" src="images/carosal3.jpg" alt="Second slide">
		</div>
		<div class="carousel-item ">
			<img class="d-block w-100" src="images/carosal4.jpg" alt="Second slide">
		</div>
		<div class="carousel-item ">
			<img class="d-block w-100" src="images/carosal5.jpg" alt="Second slide">
		</div>
	</div>
</div>
<!-- End of carousel -->

<!-- Services -->
<div class="wrapper row3">
	<main class="hoc container clear">
		<!-- main body -->
		<div class="sectiontitle">
			<h1 class="text-gray-dark font-x3 font-weight-bold" style="border-bottom: 2px solid #911105; font-family: sans-serif;" data-center-center="opacity:1;left:0;" data-0-bottom="opacity:0;left:-500px;">Our Services</h1>
		</div>
		<div class="group center btmspace-80">
			<!-- First line -->
			<div class="row service1">
				<div class="col-md-6 justify-content-center">
					<article><a class="ringcon btmspace-50" href="our_works.php"><i class="fas fa-user-cog"></i></a>
						<h6 class="heading">Our works</h6>
						<p>Come and see our works</p>
					</article>
				</div>
				<div class="col-md-6">
					<article><a class="ringcon btmspace-50" href="welfare.php"><i class="fas fa-hands-helping"></i></a>
						<h6 class="heading">List of welfare</h6>
						<p>Our social interactions</p>
					</article>
				</div>
			</div>

			<br>
			<!-- Second line -->
			<div class="row service1 justify-content-center">
				<!-- <div class="col-md-6 justify-content-center">
					<article class="first"><a class="ringcon btmspace-50" href="downloads.php"><i class="fas fa-download"></i></a>
						<h6 class="heading">Download application</h6>
						<p>Here are all applications</p>
					</article>
				</div> -->
				<div class="col-md-6">
					<article><a class="ringcon btmspace-50" href="online_application_home.php"><i class="fas fa-file-invoice"></i></a>
						<h6 class="heading">Online application</h6>
						<p>Here can submit applications</p>
					</article>
				</div>
			</div>
		</div>
		<!-- / main body -->
		<div class="clear"></div>
	</main>
</div>
<!-- Latest news -->
<div class="wrapper row2 latest">
	<section class="hoc container clear">
		<div>
			<h1 id="latestNews" class="text-gray-dark font-weight-bold font-x3">Latest news</h1>
		</div>
		<!-- News line -->
		<div class="card-deck owl-carousel">
			<div class="card">
				<div class="post-image">
					<img class="card-img-top" src="images/water_cut.jpeg">
				</div>

				<div class="card-body p-3">
					<h5 class="card-title">Water cut</h5>
					<p class="card-text">6 hour water cut for Wattala & surrounding areas</p>

					<ul style="list-style: none;">
						<li><i class="fa fa-calendar"></i> March 22, 2021</li>
						<li><i class="fa fa-pencil-alt"></i> Admin</li>
					</ul>
				</div>
				<div class="card-footer">
					<a href="#">Read more <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>

			<div class="card">
				<div class="post-image">
					<img class="card-img-top" src="images/corona.jpeg">
				</div>
				<div class="card-body">
					<h5 class="card-title">Corona</h5>
					<p class="card-text">18 more COVID-19 patients have been identified in Wattala, Hendala,Bopitiya &
						Uswetakeiyyawa areas.</p>

					<ul style="list-style: none;">
						<li><i class="fa fa-calendar"></i> October 14, 2020</li>
						<li><i class="fa fa-pencil-alt"></i> Admin</li>
					</ul>
				</div>
				<div class="card-footer">
					<a href="#">Read more <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>

			<!-- <div class="card">
					<div class="post-image">
						<a href="#"><img class="card-img-top" src="images/carosal3.jpg"></a>
					</div>
					<div class="card-body">
						<h5 class="card-title">Title</h5>
						<p class="card-text">Body</p>

						<ul style="list-style: none;">
							<li><i class="fa fa-calendar"></i> June 6, 2020</li>
							<li><i class="fa fa-pencil-alt"></i> Admin</li>
						</ul>
					</div>
					<div class="card-footer">
						<a href="#">Read more <i class="fas fa-arrow-circle-right"></i></a> 
					</div>
				</div> -->

			<!-- <div class="card">
					<div class="post-image">
						<a href="#"><img class="card-img-top" src="images/carosal4.jpg"></a>
					</div>
					<div class="card-body">
						<h5 class="card-title">Title</h5>
						<p class="card-text">Body</p>

						<ul style="list-style: none;">
							<li><i class="fa fa-calendar"></i> June 6, 2020</li>
							<li><i class="fa fa-pencil-alt"></i> Admin</li>
						</ul>
					</div>
					<div class="card-footer">
						<a href="#">Read more <i class="fas fa-arrow-circle-right"></i></a> 
					</div>
				</div> -->
		</div>
		<br>
		<br>
		<div class="row">
			<button class="btn btn-success ml-5 font-weight-bold load-more">Load more <i class="fas fa-angle-right load-more-icon"></i></button>
		</div>
	</section>
</div>
<!-- End of latest news -->

<!-- Calender and upcoming events -->
<div class="row p-2">
	<div class="calender-cover col-md-6">
		<div id="calender">
			<div class="month">
				<i class="fas fa-arrow-left pre"></i>
				<div class="days">
					<h1></h1>
					<p></p>
				</div>
				<i class="fas fa-arrow-right next"></i>
			</div>
			<div class="weekdays">
				<div>Sun</div>
				<div>Mon</div>
				<div>Tue</div>
				<div>Wed</div>
				<div>Thu</div>
				<div>Fri</div>
				<div>Sat</div>
			</div>
			<div class="day">

			</div>
		</div>
	</div>

	<div class="event col-md-6">
		<?php
		$events = array();
		$dates = array();
		$months = array();
		$years = array();
		$ids = array();

		$sql = "SELECT * FROM events LIMIT 5";

		$result = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_object($result)) {
			$events[] = $row;
		}

		if (count($events) > 0) {

			foreach ($events as $event) {

				$date = $event->e_date;

				$year = date('Y', strtotime($date));
				$month = date('M', strtotime($date));
				$month_num = date('n', strtotime($date));
				$day = date('d', strtotime($date));
				$dayName = date('D', strtotime($date));
				$description = $event->e_description;

				$dates[] = $day;
				$months[] = $month_num;
				$years[] = $year;
				$ids[] = $event->e_id;
		?>
				<div class="row row-striped">
					<div class="col-2 text-center">
						<h1 class="display-4"> <span class="badge badge-success"><?php echo $day ?></span></h1>
						<h2><?php echo $month ?></h2>
					</div>
					<div class="col-10">
						<h1><a href="php/event-add.php?view_id=<?php echo $event->e_id; ?>"> <?php echo $event->e_name ?></a></h1>
						<ul class="list-inline">
							<li class="list-inline-item"><i class="fas fa-calendar"></i> <?php echo $dayName ?></li>
							<!-- <li class="list-inline-item"><i class="fas fa-clock"></i>  08:30 - 13:30</li> -->
							<!-- <li class="list-inline-item"><i class="fas fa-location-arrow"></i>  Colombo</li> -->
						</ul>
						<p><a href="php/event-add.php?view_id=<?php echo $event->e_id; ?>"> Event details</a></p>
					</div>
				</div>
		<?php
			}
		}

		?>
	</div>
</div>
</div>

<!-- Footer -->
<?php
include 'support/footer.php';
?>

<script src="layout/scripts/calender.js"></script>
<script>
	loadDates(<?php echo json_encode($dates); ?>, <?php echo json_encode($months) ?>, <?php echo json_encode($years) ?>,
		<?php echo json_encode($ids); ?>);
</script>

</body>

</html>