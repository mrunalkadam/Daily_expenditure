<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Registration</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
.fadeIn.fifth {
  -webkit-animation-delay: 1.2s;
  -moz-animation-delay: 1.2s;
  animation-delay: 1.2s;
}
.fadeIn.sixth {
  -webkit-animation-delay: 1.3s;
  -moz-animation-delay: 1.3s;
  animation-delay: 1.3s;
}


</style>
</head>
<body>
<div class="wrapper fadeInDown" style="background-image: url(images/expense1.jpg);">
  <div id="formContent">
  	<div class="head fadeIn first">
  		<h3>Registration Form</h3>
  	</div>
  	 <form action="#" method="post">
      <input type="text" id="name" class="fadeIn second" name="name" placeholder="Enter Fullname" onblur="validate()" required><div id="div1"></div>
      <input type="email" id="email" class="fadeIn third" name="email" placeholder="Enter Email" onblur="validate()" required><div id="div2"></div>
      <input type="phone" id="phoneno" class="fadeIn fourth" name="phoneno" placeholder="Enter Mobile Number" onblur="validate()" required><div id="div3"></div>
      <input type="password" id="password" class="fadeIn fifth" name="password" placeholder="Enter Password" onblur="validate()" required><div id="div4"></div>
      <input type="submit" class="fadeIn sixth" name="btn_submit" value="REGISTER" onclick="validate()">
    </form>
</div>
</div>
 <script>
                function validate()
                {
                    var fname = document.getElementById("name").value;
                    var Email = document.getElementById("email").value;
                    var phone = document.getElementById("phoneno").value;
                    var password = document.getElementById("password").value;
                    if(fname==="")
                    {
                        document.getElementById("div1").innerHTML="Enter firstname";
                        document.getElementById("div1").style.color="Red";
                        
                    }
                    else
                    {
                        document.getElementById("div1").innerHTML="";
                    }
                    if(Email.indexOf("@")> -1)
                    {
                        document.getElementById("div2").innerHTML="";
                    }
                     else
                    {
                        document.getElementById("div2").innerHTML="Enter the correct email address";
                        document.getElementById("div2").style.color="Red";
                        
                    }
                    if(password.length<=6)
                    {
                        document.getElementById("div4").innerHTML="Password is weak";
                        document.getElementById("div4").style.color="Red";
                    }
                     else
                    {
                        document.getElementById("div4").innerHTML="";
                    }
                    if(phone.length!=10)
                    {
                        document.getElementById("div3").innerHTML="Enter valid phone number";
                        document.getElementById("div3").style.color="Red";
                    }
                     else
                    {
                        document.getElementById("div3").innerHTML="";
                    }
                    }
</script>
<?php
   $conn = new mysqli("localhost","root","","miniproject");
if(isset($_POST["btn_submit"])){
        $name=$_POST["name"];
        $email=$_POST["email"];
        $mobile=$_POST["phoneno"];
        $password=$_POST["password"];
        if($conn->connect_error){
            echo "not successful";
            die("Error in db connection".$conn->connect_error);
        }
        $sql="INSERT INTO REGISTER VALUES('$name','$email','$mobile','$password')";
        $result = $conn->query($sql);
        if($result)
        {
            $conn->close();
            session_destroy();
            echo ("<script LANGUAGE='JavaScript'>
            window.location.href='index.html';
            window.alert('Succesfully Registered');
            </script>");
        
        }
    }
?>
</body>
</html>