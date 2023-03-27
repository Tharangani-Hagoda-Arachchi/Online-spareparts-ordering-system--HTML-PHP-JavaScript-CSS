<?php
if($_POST["submit"] ?? ""=="continue to check out")
{
$a=$_POST["firstname"];

$b=$_POST["email"];
$c=$_POST["address"];
$d=$_POST["city"];
$e=$_POST["cardname"];
$f=$_POST["cardnumber"];
$g=$_POST["expmonth"];
$h=$_POST["expyear"];

$conn= new mysqli('localhost','root','');
if(!$conn)
{
echo"not connected";
} 

if (!mysqli_select_db($conn,'vehicle_spareparts_shop')){
echo "database not seected";}
	



$sql = "INSERT INTO online_order_details ( cus_fullname, cus_email,cus_address, cus_city,name_on_card, credit_card_number,exp_month,exp_year) VALUES ( '$a', '$b', '$d','$c', '$e', '$f','$g','$h' )";



if(!mysqli_query($conn,$sql)){
header("location:payment.html");


}
  
   
 else {
	 header("location:action.html");

exit();}
}


?>


