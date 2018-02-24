<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=projetperso;charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Adopte un Husky</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/carousel.css" />
		<link rel="stylesheet" href="assets/css/slippry.css">
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<?php include 'php/header.php'; ?>

		<a href="#header" class="scrolly"><span class="icon fa-paw" style="position:fixed;top:94%;left:95%;color:black;width:10%;z-index:999;"></span></a>

		<!-- First -->
			<section id="first" class="main">

				<?php include 'php/histoire.php'; ?>

			</section>

			<section id="first1" class="main">

				<?php include 'php/identite.php'; ?>

		  </section>

		<!-- Second -->
			<section id="second" class="main">

				<?php include 'php/slider.php'; ?>

				<?php include 'php/comportement.php'; ?>
			</section>

			<section id="second1" class="main">
				<?php include 'php/besoin.php'; ?>
			</section>

		<!-- Third -->
			<section id="third" class="main">

				<?php include 'php/education.php'; ?>

		  </section>

		 <!-- Carousel -->
		 <section id="sante">
				<?php include 'php/carousel.php'; ?>
		 </section>

		<!-- Fourth -->
			<section id="fourth" class="main">
				<?php include 'php/activite.php'; ?>
			</section>

			<section id="fourth1" class="main">
				<?php include 'php/idees.php'; ?>

			</section>

		<!-- Footer -->

			<?php include 'php/footer.php'; ?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.onvisible.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="assets/js/carousel.js"></script>
			<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
		  <script src="assets/js/slippry.min.js"></script>
		  <script src="//use.edgefonts.net/cabin;source-sans-pro:n2,i2,n3,n4,n6,n7,n9.js"></script>
		  <script src="assets/doubletaptogo.js"></script>
<script>
	$( function()
	{
		$( '#nav li:has(ul)' ).doubleTapToGo();
	});
</script>
		<script>
			$(function() {
				var demo1 = $("#demo1").slippry({
				});

				$('.stop').click(function () {
					demo1.stopAuto();
				});

				$('.start').click(function () {
					demo1.startAuto();
				});

				$('.prev').click(function () {
					demo1.goToPrevSlide();
					return false;
				});
				$('.next').click(function () {
					demo1.goToNextSlide();
					return false;
				});
				$('.init').click(function () {
					demo1 = $("#demo1").slippry();
					return false;
				});
			});
		</script>
	</body>
</html>
