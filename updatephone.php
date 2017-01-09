<?php
  //connect to database:
  include('functions.php');
  include("nav.php");
  error_reporting(0);
  if(loggedIn()){ 

//avoid error notices, display only warnings:


//check if user submitted form:
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
  echo "<br />";
  
  //Create an array for errors:
  $errors = array();
  
  //check for email address:
  if (empty($_POST['_email'])){
    $errors[] = 'You forgot to enter your email!';
  }else{
    $e = mysqli_real_escape_string($conn, trim($_POST['_email'])); //escape is to have input such as O’Hara; trim removes the space, return, etc.
  } 
  
  //check current phone:
  if (empty($_POST['_phone'])){
    $errors[] = 'You forgot to enter the users phone number!';
  }else{
    $p = mysqli_real_escape_string($conn, trim($_POST['_phone']));
  }
  
  // //check for a new password and compare it with confirmed password:
  // if (!empty($_POST['_newPass'])){
  //   if ($_POST['_newPass'] != $_POST['_newPass2']){
  //     $errors[] = 'Your new password does not match the confirmed password!';
  //   }else{
  //     $np = mysqli_real_escape_string($conn, trim($_POST['_newPass']));
  //   }
  // }else{
  //   $errors[] = 'You forgot to enter your new password!';
  // }

  //if there is no errors:
  if(empty($errors)){
    //create query and return number of rows where email = $e and password = $p:
    $q = "SELECT ID FROM users WHERE (email='$e')"; //query the database
    $r = mysqli_query($conn, $q); //store the query result which are all the IDs that matching the email
    $num = mysqli_num_rows($r); //return how many records matched; should be one
    
    //get user id where email = $e and password = $p:
    if($num == 1){
      $row = mysqli_fetch_array($r, MYSQLI_NUM);
        
      //Make the UPDATE query:
      $q = "UPDATE users SET phone='$p' WHERE ID='$row[0]'";
      $r = mysqli_query($conn, $q);
      
      //if everything was ok:
      if(mysqli_affected_rows($conn) == 1){
        //Ok message confirmation:
        echo "Thanks! You have updated the users phone number!";
      }else{
        echo "Users phone number could not be changed due to a system error";
      }
      
      //close connection to db:
      mysqli_close($conn);
    }else{
      echo "The email do not match our records!";
    }
  }else{
    echo "Error! The following error(s) occurred: <br />";
    foreach($errors as $msg){
      echo $msg."<br />";
    }
  } 
 
 }
} else {
  header('location: login_err.php');
}

  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Update User Phone</title>
  <meta charset="utf-8">
</head>
<body>
  <h2>Update User Phone</h2>
  <form action="updatephone.php" method="POST">
    Email: <input type="text" name="_email" value="" required><br><br>
    Enter New Phone Number: <input type="text" name="_phone" value="" required><br><br>
    <input type="submit" name="change" value="Change User Phone Number">
    <button>
    <a href="account.php">I Changed My Mind, Don't Do It!</a>
    </button>
  </form>
</body>
</html>




