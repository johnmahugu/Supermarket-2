<aside>

			<h2>Myanmar Center <?php //echo $_SESSION['allAuth'];?></h2>
			<div class="title-line">
				<h3>Pannel</h3>
				<hr>
			</div>
			<ul>
				<a href='mainmenu'>
					<?php
					if($_SERVER['REQUEST_URI'] == '/mainmenu'){
						echo '<li class="current">Main Menu</li>';
					}else{
						echo '<li>Main Menu</li>';
					}
					 ?>
				</a>
			</ul>

			<div class="title-line">
				<h3>Tour</h3>
				<hr>
			</div>
			<ul>
				<?php
					if( substr($_SESSION['allAuth'],0,1) == "T"){
						echo"
				<a href='mm-std-main'>
					<li>Standard Tours</li>
				</a>
				"; }?>

				<?php
					if( substr($_SESSION['allAuth'],1,1) == "T"){
						echo"
				<a href='tm-mc-easy-main.html'>
					<li>Easy Packages</li>
				</a>
				"; }?>

				<?php
					if( substr($_SESSION['allAuth'],2,1) == "T"){
						echo"
				<a href='tm-mc-promotion-main.html'>
					<li>Promotion</li>
				</a>
				"; }?>

				<?php
					if( substr($_SESSION['allAuth'],3,1) == "T"){
						echo"
				<a href='mm-locationdata'>
					<li>Location Data</li>
				</a>
				"; }?>

				<?php
					if( substr($_SESSION['allAuth'],4,1) == "T"){
						echo"
				<a href='mm-locationimg'>
					<li>Location Images</li>
				</a>
				"; }?>

			</ul>
			<div class="title-line">
				<h3>Shop Travel</h3>
				<hr>
			</div>
			<ul>

				<?php
					if( substr($_SESSION['allAuth'],5,1) == "T"){
						echo"
				<a href='st-hotel'>
					<li>Hotel</li>
				</a>
				"; }?>

				<?php
					if( substr($_SESSION['allAuth'],6,1) == "T"){
						echo"
				<a href='st-vehicle'>
					<li>Vehicle</li>
				</a>
				"; }?>
				<?php
					if( substr($_SESSION['allAuth'],7,1) == "T"){
						echo"
				<a href='st-meal'>
					<li>Meal</li>
				</a>
				"; }?>

				<?php
					if( substr($_SESSION['allAuth'],8,1) == "T"){
						echo"
				<a href='st-ticket'>
					<li>Ticket</li>
				</a>
				"; }?>

				<?php
					if( substr($_SESSION['allAuth'],9,1) == "T"){
						echo"
				<a href='st-guide'>
					<li>Guide</li>
				</a>
				"; }?>

				<?php
					if( substr($_SESSION['allAuth'],10,1) == "T"){
						echo"
				<a href='st-other'>
					<li>Others</li>
				</a>
				"; }?>


			</ul>

			<div class="title-line">
				<h3>Pricing Setup</h3>
				<hr>
			</div>


			<ul>
				<?php
					if( substr($_SESSION['allAuth'],18,1) == "T"){
						echo"
				<a href='PriceAll'>
					<li>All Price Setting (STD Tour)</li>
				</a>
				"; }?>
			</ul>


			<ul>
				<?php
					if( substr($_SESSION['allAuth'],19,1) == "T"){
						echo"
				<a href='PriceFlight'>
					<li>Flight Price Setting</li>
				</a>
				"; }?>
			</ul>

			<h2 class="top-mg">Supermarket Tours</h2>
			<div class="title-line">
				<h3>Domestic Tours</h3>
				<hr>
			</div>
			<ul>

				<?php
					if( substr($_SESSION['allAuth'],11,1) == "T"){
						echo"
				<a href='domestic-package?type=ep'>
					<li>Easy Package</li>
				</a>
				"; }?>

				<?php
					if( substr($_SESSION['allAuth'],12,1) == "T"){
						echo"
				<a href='domestic-package?type=sp'>
					<li>Series Package</li>
				</a>
				"; }?>

				<?php
					if( substr($_SESSION['allAuth'],13,1) == "T"){
						echo"
				<a href='domestic-location-data'>
					<li>Location Data</li>
				</a>
				"; }?>

			</ul>
			<div class="title-line">
				<h3>Outbound Tours</h3>
				<hr>
			</div>
			<ul>

			<?php
					if( substr($_SESSION['allAuth'],14,1) == "T"){
						echo"
				<a href='outbound-package?type=ep'>
					<li>Easy Package</li>
				</a>
				"; }?>

				<?php
					if( substr($_SESSION['allAuth'],15,1) == "T"){
						echo"
				<a href='outbound-package?type=sp'>
					<li>Series Package</li>
				</a>
				"; }?>

				<?php
					if( substr($_SESSION['allAuth'],16,1) == "T"){
						echo"
				<a href='outbound-location-data'>
					<li>Location Data</li>
				</a>
				"; }?>


			</ul>
			<div class="title-line">
				<h3>Tour Agency</h3>
				<hr>
			</div>
			<ul>

				<?php
					if( substr($_SESSION['allAuth'],17,1) == "T"){
						echo"
				<a href='tm-touragency-main.html'>
					<li>Tour Agency Management</li>
				</a>
				"; }?>

			</ul>
		</aside>
