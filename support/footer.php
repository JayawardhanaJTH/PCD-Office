<!-- Footer -->
<div class="wrapper row4">
	<footer id="footer" class="hoc clear">
		<div class="one_third first">
			<h6 class="heading">PCDOffice</h6>
			<p></p>
			<p class="btmspace-30"></p>
			<ul class="faico clear">
				<li><a class="faicon-facebook" href="https://www.facebook.com/PremnathSL"><i class="fab fa-facebook"></i></a></li>
				<li><a class="faicon-youtube" href="https://www.youtube.com/channel/UC-95HQVyrY1oMu7yqIKRCQg"><i class="fab fa-youtube"></i></a></li>
				<li><a class="faicon-twitter" href="https://twitter.com/dolawattec?lang=en"><i class="fab fa-twitter"></i></a></li>
			</ul>
		</div>
		<div class="one_third">
			<h6 class="heading">Contact Us</h6>
			<ul class="nospace clear ">
				<li><i class="fas fa-phone-square"></i> Give us a call : 011-2142882</li>
				<li><i class="fas fa-at"></i> Send us a email : pcdsecretaryoffice@gmail.com</li>
				<li><i class="fas fa-envelope"></i> No.50 , Ihala Bomiriya Kaduwela</li>
			</ul>
		</div>
		<div class="one_third">
			<div class="mapouter">
				<div class="gmap_canvas"><iframe width="353" height="299" id="gmap_canvas" src="https://maps.google.com/maps?q=Ihala%20Bomiriya%20Kaduwela&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2piratebay.org">pirate bay</a><br>
					<style>
						.mapouter {
							position: relative;
							text-align: right;
							height: 299px;
							width: 353px;
						}
					</style><a href="https://www.embedgooglemap.net"></a>
					<style>
						.gmap_canvas {
							overflow: hidden;
							background: none !important;
							height: 299px;
							width: 353px;
						}
					</style>
				</div>
			</div>
		</div>
	</footer>
</div>
<div class="wrapper row5">
	<div id="copyright" class="hoc clear">
		<p class="fl_left">Copyright &copy; <?php echo date('Y') ?> - All Rights Reserved - <a href="index.php">PCDOffice</a></p>

	</div>
</div>
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>

<!-- JAVASCRIPTS -->
<script src="layout/scripts/activeLinks.js"></script>
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.counterup.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="js/event_add.js"></script>
<script src="js/downloads_add.js"></script>
<script src="js/popup_msgs.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>

<!-- animation script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
	AOS.init();
</script>

<?php
if (isset($type)) {
?>
	<script>
		(function() {
			'use strict';
			window.addEventListener('load', function() {
				var forms = document.getElementsByClassName('needs-validation');
				var validation = Array.prototype.filter.call(forms, function(form) {
					form.addEventListener('submit', function(event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			}, false);
		})();
	</script>
<?php
}
?>
</body>

</html>