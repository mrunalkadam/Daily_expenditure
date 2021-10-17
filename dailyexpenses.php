<?php
session_start();
 include 'secured.php';
?>

<!DOCTYPE html>
<html style="background-color: white;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Daily Expenses</title>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/expenses.css">
<style>
  #sub{
    display: inline-block;
  padding: 12px 24px;
  background: rgb(39 192 20);
  font-weight: bold;
  color: rgb(255 250 250);
  height: 40px;
  width: 100px;
  border: none;
  outline: none;
  border-radius: 3px;
  cursor: pointer;
  transition: ease .3s;
  }
  form{
    width: 40%;
    margin: 10px 120px 5px 450px;
    background: #ffffff;
    text-align: center;
    padding: 10px 5px 2px 20px;
  }
  h1{
    text-align: center;
  }
</style>
</head>
<body>
<div style="background-image: url(images/blur5.jpg);">
	<div>
		<?php 
		$conn = new mysqli("localhost","root","","miniproject");
    $email=$_SESSION["mail"];?>
		<h1 style="text-align: center; text-shadow:0 0 6px #faf8f8, 0 0 5px #785c90; color: white; padding-top: 5px;"> YOUR DAILY EXPENDITURE  </h1>;
    <?php
    $strSQL = "SELECT name FROM REGISTER WHERE email='$email'";
    $result = mysqli_query($conn,$strSQL) or die('SQL Error :: '.mysql_error());
    $row = mysqli_fetch_assoc($result);
    ?>
    <h3 style="text-align: center; text-shadow:0 0 6px #faf8f8, 0 0 5px #785c90; color: white;">USER NAME : <?php echo $row['name']; ?></h3>
    <a style="padding-left: 1200px; color: black;" href="./logout.php">LOGOUT</a>
	</div>
	<form action="#" method="post">
  <label>
    <p class="label-txt">Enter Description</p>
    <input type="text" class="input" name="description" required>
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <label>
    <p class="label-txt">Enter Amount</p>
    <input type="text" class="input" name="amount" required>
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <label>
    <p class="label-txt">Enter Date</p>
    <input type="date" class="input" name="date" required>
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <input type="submit" name="btn-add" value="ADD" id="sub">
    </form>

<div>
	<?php
   $conn = new mysqli("localhost","root","","miniproject");
   $email=$_SESSION["mail"];
if(isset($_POST["btn-add"])){
        $email=$_SESSION["mail"];
        $description=$_POST["description"];
        $amount=$_POST["amount"];
        $date=$_POST["date"];
        if($conn->connect_error){
            echo "not successful";
            die("Error in db connection".$conn->connect_error);
        }
        $sql="INSERT INTO ITEM VALUES('$email','$description','$amount','$date')";
        $result = $conn->query($sql);
    }
    $sql="SELECT * FROM `item` where email='$email'";
    $result = mysqli_query($conn,$sql);
        if($result)
        {
         echo "<br><br>";

        echo "<table class='table table-dark table-striped container-fluid' style='width:80%'><tr><th>Email</th><th>Description</th><th>Amount</th><th>Date</th></tr>";
        $total=0;
            while($row=$result->fetch_assoc())
            {
                echo "<tr>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['description']."</td>";
                echo "<td>".$row['amount']."</td>";
                echo "<td>".$row['date']."</td>";
                $total=$total+$row['amount'];

            }
            echo "</tr>";
            echo "</table>";
            
              echo "<h3 style='color: white; text-align: center;'>Total Amount : $total </h3> ";
            
        }
    $conn->close();
?>

</div>
</div>
</body>
</html>