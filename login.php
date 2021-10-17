<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/page.css">
<style>
.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}


</style>
</head>
<body>
	<div class="wrapper fadeInDown" style="background-image: url(images/expense1.jpg);">
  <div id="formContent">
  	<div class="head fadeIn first">
  		<h3>Login Form</h3>
  		
  	</div>
  	 <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="Enter Email" required autofocus>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Enter Password" required>
      <input type="submit" class="fadeIn fourth" name="btn-login" value="Log In">
    </form>
</div>
</div>
<?php
$conn = new mysqli("localhost","root","","miniproject");
if(isset($_POST['email']) and isset($_POST['password']) )
    {     

        $mail = $_POST["email"]; 
        $pass = $_POST["password"]; 

        $ret=mysqli_query( $conn, "SELECT * FROM register WHERE email='$mail' AND password='$pass' ") or die("Could not execute query: " .mysqli_error($conn)); 
    $row = mysqli_fetch_assoc($ret); 
    if(!$row) { 
       echo ("<script LANGUAGE='JavaScript'>
            window.location.href='login.php';
            window.alert('Invalid Email Or Password');
            </script>");
    } 
    else { 
          session_start(); 
          $_SESSION['mail']=$mail; 
      header('location: dailyexpenses.php'); 
    } 
}
?>
</body>
</html>