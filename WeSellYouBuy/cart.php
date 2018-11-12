<!DOCTYPE html>
<html>
<head>
	<title>We Sell You Buy</title>
	<link rel="stylesheet" type="text/css" href="style/core.css">
	<link rel="stylesheet" type="text/css" href="style/cart.css">
</head>
<body>
	<?php include 'includes/signedOutHeader.php';
		  
	$servername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "shoppingcart";

	/* sets up a variable for the connection using given credentials */
	$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

	/* checks if connection failed, if it did, display error message */
	if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
	}
	
	$sql = "SELECT * FROM products";
	$res = mysqli_query($conn, $sql);
	?>
	
	<h1>WeSellYouBuy<h1>
	<header id="title">
    <h1>My Shopping Cart</h1>
	
	<div class="container">
	<div class="row">
	  <table class="table">
	  	<tr>
	  		<th>Item Name</th>
	  		<th>Quanity</th>
	  		<th>Price</th>
	  	</tr>
		
		
		<?php

			$cartitems = array();
			$sql = "SELECT * FROM cart";
			$result = mysqli_query($conn, $sql);
			if($result){
				while($row = mysqli_fetch_assoc($result)){
					$cartitems[] = $row["name"];
				}
			}
			
		?>
		
		<?php
			$total = 0;
			$i = 0;	
			
			$item = mysqli_query($conn,"SELECT * FROM cart");
			while($row = mysqli_fetch_array($item))
			{
				echo "<tr>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['quantity'] . "</td>";
				echo "<td>" . $row['price'] . "</td>";
				echo "</tr>";
				$total = $total + $row['price'];
			}
		echo "</table>";
		?>
		
		<tr>
			<td><strong>Total Price</strong></td>
			<td><strong><?php echo $total;?></strong></td>
			<td><a href="#" class="btn btn-info">Checkout</a></td>
		</tr>
	  </table>
	</div>
</div>
 
</body>

</html>