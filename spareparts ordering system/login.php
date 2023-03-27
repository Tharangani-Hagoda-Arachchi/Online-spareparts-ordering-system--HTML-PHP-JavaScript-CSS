<?php
session_start();
if($_POST["submit"] ?? ""=="submit"){
$a=$_POST["name"];
$b=$_POST["email"];


$conn= new mysqli('localhost','root','');
if(!$conn)
{
echo"not connected";
} 

if (!mysqli_select_db($conn,'vehicle_spareparts_shop')){
echo "database not seected";}
	

$sql=("SELECT * FROM online_customer_detail WHERE cus_user_name='$a' && cus_password='$b'");
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num == 1){


header("location:catgories.html");
exit();
}
	
else
{header("location:login.html");

exit();
}
$conn->close();

}


?>

	
	
	
	
	
	
	
	
	
	
