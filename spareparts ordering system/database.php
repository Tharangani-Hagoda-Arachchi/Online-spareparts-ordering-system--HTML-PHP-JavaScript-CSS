
<?php
session_start();
if($_POST["add"] ?? ""=="Submit")
{
$a=$_POST["Name"];

$b=$_POST["Address"];
$c=$_POST["Email"];
$d=$_POST["Telephone"];
$e=$_POST["User_Name"];
$f=$_POST["Password"];



$con=new mysqli("localhost","root","","vehicle_spareparts_shop");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$sql = "INSERT INTO online_customer_detail ( cus_name, cus_address, cus_phone, cus_email, cus_user_name, cus_password) VALUES ( '$a', '$b', '$d','$c', '$e', '$f' )";



if(!mysqli_query($con,$sql)){
header("location:register.html");


exit();}
  
   
 else {
	header("location:login.html");

exit();
}

$con->close();
}
?>