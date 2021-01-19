<?php

$product = $_GET["prod"];
if (isset($_GET["type"])) {
  $type = $_GET["type"];
};
$js = '<script src="../js/product.js"></script>';

if ($type == "true"){
  $js = '<script src="../js/productbp.js"></script>';
}
$product = str_replace("-", " ", $product);

?>

<!DOCTYPE HTML>
<html>
	<head>
	<title><?php echo $product ?></title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php include('../blocks/head.php') ?>

	</head>
        <body onload="init()">

	<div class="colorlib-loader"></div>

	<div id="page">
		<?php include('../blocks/header.php') ?>

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="home.html">Home</a></span> / <span>player</span></p>
					</div>
				</div>
			</div>
		</div>

				                <?php include '../blocks/page_banner.php' ?>


               <!-- THIS IS THE PRODUCT SECTION -->
		<div class="colorlib-product">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-xl-3">
						<div class="row">
							<div class="col-sm-12">
								<div class="side border mb-1" id="brand">
								</div>
							</div>
						<!--	<div class="col-sm-12">
								<div class="side border mb-1">
									<h3>Size/Width</h3>
									<div class="block-26 mb-2">
										<h4>Size</h4>
					               <ul>
					                  <li><a href="#">7</a></li>
					                  <li><a href="#">7.5</a></li>
					                  <li><a href="#">8</a></li>
					                  <li><a href="#">8.5</a></li>
					                  <li><a href="#">9</a></li>
					                  <li><a href="#">9.5</a></li>
					                  <li><a href="#">10</a></li>
					                  <li><a href="#">10.5</a></li>
					                  <li><a href="#">11</a></li>
					                  <li><a href="#">11.5</a></li>
					                  <li><a href="#">12</a></li>
					                  <li><a href="#">12.5</a></li>
					                  <li><a href="#">13</a></li>
					                  <li><a href="#">13.5</a></li>
					                  <li><a href="#">14</a></li>
					               </ul>
					            </div>
					            <div class="block-26">
										<h4>Width</h4>
					               <ul>
					                  <li><a href="#">M</a></li>
					                  <li><a href="#">W</a></li>
					               </ul>
					            </div>
								</div>
							</div> -->
							<div class="col-sm-12">
								<div class="side border mb-1" id="seller">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="side border mb-1" id="colour">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="side border mb-1" id="product">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="side border mb-1" id="gender">
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-xl-9">
						<div class="row row-pb-md" id="id01">
						</div>

					</div>
				</div>
			</div>
		</div>

		<?php include ("../blocks/partners.php") ?>

		<?php include ("../blocks/footer.php") ?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
   <!-- popper -->
   <script src="../js/popper.min.js"></script>
   <!-- bootstrap 4.1 -->
   <script src="../js/bootstrap.min.js"></script>
   <!-- jQuery easing -->
   <script src="../js/jquery.easing.1.3.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="../js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="../js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="../js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="../js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="../js/main.js"></script>

        <script>

            var product = "<?php echo $product ?>";
            var pagename = "balls.php";
            console.log("product name = " + product);
        </script>
  <?php echo $js ?>

	</body>
</html>
