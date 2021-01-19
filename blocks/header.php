<?php
#unset ($_SESSION["search_term"]);

#define variables and initialize with empty values
$term = "";
$boo = false;
#Processing the data once the form is submitted
#if(isset($_POST["term"])){
if(isset($_POST["term"])){
    $boo = true;
}

if($boo){

    #$term = trim($_POST["term"]);
    #$term = str_replace(' ', '', $term);
    $boo = false;
    $term = $_POST["term"];
    session_start();

    $_SESSION["search_term"] = $term;

    header("location: search_results.php?term=$term");

    exit;



}


?>
<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="home.php">Polo Picker</a></div>
						</div>
						<div class="col-sm-5 col-md-3">
			            <form action="" method="post" class="search-wrap">
			               <div class="form-group">
			                  <input type="search" class="form-control search" placeholder="Search" name="term">
			                  <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
			               </div>
			            </form>
			         </div>
		         </div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li><a href="../home/home.php">Home</a></li>
								<li class="has-dropdown active">
									<a href="../home/player.php">the player</a>
									<ul class="dropdown">
                                                                            <li><a href="../productkneepads.php">Kneepads</a></li>
                                                                                <li><a href="mallets.php">Mallets</a></li>
                                                                                <li><a href="gloves.php">Gloves</a></li>
                                                                                <li><a href="helmets.php">Helmets</a></li>
										<li><a href="boots.php">Boots</a></li>
                                                                                <li><a href="whites.php">Whites</a></li>
									</ul>
								</li>
                                                                <li class="has-dropdown active">
									<a href="../home/pony.php">the pony</a>
									<ul class="dropdown">
                                                                            <li><a href="saddle.php">Saddles</a></li>
                                                                            <li><a href="bridles.php">Bridles</a></li>
                                                                            <li><a href="bandages.php">Bandages</a></li>
                                                                            <li><a href="horseboots.php">Boots</a></li>
                                                                            <li><a href="headcollar.php">Headcollars</a></li>
                                                                            <li><a href="rugs.php">Rugs</a></li>
									</ul>
								</li>
								<!--<li><a href="">the pets</a></li> -->
								<li><a href="../home/about.php">about</a></li>
								<!-- <li class="cart"><a href="cart.html"><i class="icon-shopping-cart"></i> Cart [0]</a></li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php include('../blocks/header_banner.php') ?>
		</nav>
