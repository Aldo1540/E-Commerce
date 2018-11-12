<?php
/* checks if the signupsubmit button was posted */
if(isset($_POST['signup-submit'])){

 /* require dbh to gain access to the $conn to database */
  require 'dbh.inc.php';

  /* sets variables for info passed from sign up form*/
  $username = $_POST['Username'];
  $userpass = $_POST['Password'];
  $useremail = $_POST['Email'];
  $userpref = $_POST['What do you shop for most?'];

  /* if the username, password, or email is left empty */
  if(empty($username) || empty($userpass) || empty($useremail)) {
    header("Location: ../signup.php?error=emptyfields&username=".$username."&mail=".$useremail);
    exit();
  }
  /* checks if both are valid */
  else if(!filter_var($useremail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username) ){
    header("Location: ../signup.php?error=invalidmailusername");
    exit();
  }
  /* checks if email is valid */
  else if(!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&username=".$username);
    exit();
  }
  /* checks if username is valid */
  else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invlaidusername&mail=".$useremail);
    exit();

} else {

  /* sets up an sql snippet to get userNames in database */
  $sql = "SELECT userNames FROM users WHERE userNames=?";

  /* makes the sql a mysqli statement with the conn to the databae */
  $stmt = mysqli_stmt_init($conn);
  /* if the statement failed to be prepared */
  if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../signup.php?error=sqlerror");
    exit();
  }  else {
  /* sets up the ? values for the sql*/
  mysqli_stmt_bind_param($stmt, "s", $username);

  /* runs data through database */
  mysqli_stmt_execute($stmt);

  /* stores result of check */
  mysqli_stmt_store_result($stmt);

  /* sets variable to check if any matches */
  $resultCheck = mysqli_stmt_num_rows($stmt);
  if($resultCheck > 0){
    header("Location: ../signup.php?error=usertaken&mail=.$useremail");
    exit();
  } else {

   $sql = "INSERT INTO users (userNames, emailUsers, pwdUsers, prefUsers ) VALUES (?, ?, ?, ?)";
   $stmt = mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql)) {
     header("Location: ../signup.php?error=sqlerror");
     exit();
   }
   else {
       /* hashes password before entering into database to increase security */
       $hashPwd = password_hash($userpass, PASSWORD_DEFAULT);
       mysqli_stmt_bind_param($stmt, "ssss", $username, $useremail, $hashPwd, $userpref);
       mysqli_stmt_execute($stmt);
       header("Location: ../login.php?signup=success");
       exit();
    }
   }
  }
 }
 /* closes sqli statement and connection to database */
 mysqli_stmt_close($stmt);
 mysqli_close($conn);
} else {
  /* if user didnt click on the sign up button, returned to sign up page*/
  header("Location: ../signup.php");
  exit();
}
 ?>
