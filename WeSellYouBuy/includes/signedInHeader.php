<?php
/* since header file is included in all pages, mainly index.php,
   all pages will start as session to be tracked
*/
  session_start();
?>
	<header>
		<?php
		if(isset($_SESSION['userID'])){
	    echo '<div class="topNav">

			<form name="form1" method="post" action="index.php">
				<input type="image" src="images/logo.png" name="Submit"/>
			</form>

			<button class="button">Language</button>

			<form method="post" action="">
				<button class="button">Account</button>
			</form>

			<form method="post" action="logout.inc.php">
			<button class="button">Log Out</button>
			</form>

		</div>
		<div class="secondNav">
			<div class="search-container">
				<form action="itemsearch.php">

					<div class="dropdown">
						<button class="searchbtn">Category</button>
						<div class="dropdown-content">
							<a href="#">Electronics</a>
							<a href="#">Clothing</a>
							<a href="#">Home Appliances</a>
							<a href="#">Outdoor Appliances</a>
							<a href="#">Baby</a>
						</div>
					</div>
					<input name="search" type="text" placeholder="Search">
					<button class="searchbtn" type="submit">Submit</button>
				</form>

				<form method="post" action="cart.php">
					<button class="cartbtn">My Cart</button>
				</form>

			</div>
		</div>
		<hr';
	} else {
		include 'includes/signedOutHeader.php';
		echo ''
	}
		?>
	</header>
