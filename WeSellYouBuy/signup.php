<!DOCTYPE HTML>
<html>
<head>
  <title>We Sell You Buy</title>
  <link rel="stylesheet" type="text/css" href="style/core.css">
  <link rel="stylesheet" type="text/css" href="style/signup.css">
</head>
<body>
<?php include 'includes/signedOutHeader.php'; ?>
<div class="signUp">
<img src="images/logo2.png" style="width:10%;">
<h1>Sign Up </h1>
<form class="signupForm" method="post" action="includes/signup.inc.php" >
  <input type="text" name="Username" placeholder="Username"> <br>
  <input type="password" name="Password" placeholder="Password"><br>
  <input type="text" name="Email" placeholder="Email"><br />

  <select name="What do you shop for most?">
    <option value="Electronics">Electronics</option>
    <option value="Clothing">Clothing</option>
    <option value="Home">Home Appliances</option>
    <option value="Outdoor">Outdoor Appliances</option>
    <option value="Baby">Baby</option>
  </select><br />
  <input type="submit" name="signup-submit" value="Submit">
</form><br/>

<form method="post" action="signin.php">
  <button class="signInBtn">Sign In</button>
</form>

</div>

</body>
</html>
