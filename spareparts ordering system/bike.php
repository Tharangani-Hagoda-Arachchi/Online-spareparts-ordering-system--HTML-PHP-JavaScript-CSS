<?php  

 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "vehicle_spareparts_shop");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],
                     					 
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="bike.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="bike.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  







<html>  
      <head>  
            
          
		   
		   
		   
		   <style>


*{box-sizing:border-box;
borde:1px solid;
}

 body{
 margin:0;
 color:black;
 }
 
 nav {
 background:gray ;
 color:white;
 width:"100%";
 overflow:auto; }
 
 ul{margin:0;
 padding:0;
 list-style:none;}
 
li{float:left;}
 background{color:black;}
 nav a{width:120px;
 display:block;
 text-decoration:none;
 text-align:center;
 background:#594848
 font-size:17px;
 color:white;
 padding:20px 10px;
 font-family:Arial;}
 
 footer {
  text-align: center;
  padding: 2px;
  background-color:red;
  color: black;
  border-radius:10px;
  font-size:14pt;
  clear: both;
  position: relative;
  margin-top: -1px;
}

#payment{
margin-right:20px;
    float:right;
	height:5vh;
	color:blue;
	font-size:20px;
	font-weight:bold;	
	
}

 </style>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
		   
 
 
      </head>  
      <body>  
	  <nav>
<ul>

<li > <a href="wad cw2.html"> HOME</a> 
</li>
<li > <a href="HOME.html"> ABOUT US</a> 
</li>
<li>  <a href="catgories.html"> CATAGEROY </a> </li>
<li>  <a href="contact .html">  CONTACT  </a></li>
<li> <a href="login.html">   LOGIN </a> </li>
<li>  <a href="register.html"> SIGN IN </a> </li>

 
 <form action="cart.php" method="post">
<form>

<input type="submit" name="MYCART" style="margin-top:15px;margin-right" class="btn btn-success" value="MYCART" />
 
 <br>
 <br>

</form>
	
</ul> 
</nav> 
           <br />  
           <div class="container" style="width:600px;">  
                 
                <?php  
                $query = "SELECT * FROM tbl_product ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="bike.php?action=add&id=<?php echo $row["id"]; ?>"> 
<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; align:center;overflow:hidden;height:400px; width:200px;" >					 
                          
                               <img src="<?php echo $row["image"]; ?>" class="img-responsive" /><br />  
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger">LKR <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
							  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
			
                <?php  
				
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br />  
                


</form>
	
	<footer>

 <a target="_blank" href="https://www.facebook.com/">
 <img src="img\facebook.png" alt="IMG" width="40" height="40"></a>&nbsp;
 
 
 
 <a target="_blank" href="https://www.instagram.com/">
 <img src="img\instagram.png" alt="IMG" width="50" height="50"></a>&nbsp;
 
 
</footer>
		   
      </body>  
 </html>