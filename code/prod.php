<?php 
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "online_store";

$connect= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(isset($_POST["buy_item"]))  
 {  
      if(isset($_SESSION["buy_pro"]))  
      {  
           $item_array_id = array_column($_SESSION["buy_pro"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["buy_pro"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["buy_pro"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="prod.php"</script>';  
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
           $_SESSION["buy_pro"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["buy_pro"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["buy_pro"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="prod.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title> Products</title>  
          <style type="text/css">
          	.imgp{
          		width: 70%;
          		height: 750px;
          	}
          	.buyb{
          		width: 50px;
          		height: 25px;
          		border-radius: 5px;
          	}
            .ad{
              position: relative;
              left: 37px;
            }
          	
          </style>
      </head>  
      <body>  
      	<?php include("head.php") ?>
           <br />  
           <div class="container" style="width:95% ;">  
                <h1 align="center">Products</h1><br>
                <?php  
                $query = "SELECT * FROM product ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="pro">  
                     <form method="post" action="prod.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img class="imgp" src="<?php echo $row["image"]; ?>"  /><br>
                               <h4><?php echo $row["name"]; ?></h4>  
                               <h4>Rs. <?php echo $row["price"]; ?></h4>  
                                   Quantity<input type="text" name="quantity"  value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input class="buyb" type="submit" name="buy_item" style="margin-top:5px;"  value="buy" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br>  
                    <h3> Buy</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="20%" style="position: relative;left: 11%;">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["buy_pro"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["buy_pro"] as $keys => $values)  
                               {  
                          ?>  
                          <br>
                          <tr>  
                               <td style="position: relative;left: 15%;"><?php echo $values["item_name"]; ?></td>  
                               <td style="position: relative;left: 5%;"><?php echo $values["item_quantity"]; ?></td>  
                               <td style="position: relative;left: 5%;">Rs. <?php echo $values["item_price"]; ?></td>  
                               <td style="position: relative;left: 5%;">Rs. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td style="position: relative;left: 15%;"><a href="prod.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span>Remove</span></a></td>  
                          </tr> 

                         
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  


                                     $pname= $values["item_name"];
                          $pquantity=$values["item_quantity"];

                                    $ptotal=$total;
                               }  
                          ?>  
                          <tr>  
                          	<br>
                          	
                               <td style="position: relative;top: 50px;" colspan="3" align="right"><strong>Total</strong></td>  

                               <td style="position: relative;top: 50px;" align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br>  
           <br>
           <br>
        

<form method="post">
	
   Your Name  <input class="ad" id="text" type="text" name="usname"><br><br>

   Dilivary  Address   <input  id="text" type="text" name="Address"><br><br>

      <input id="button" type="submit" value="BUY"><br><br>

</form>


<?php 

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$username = $_POST['usname'];
		$address = $_POST['Address'];

if(!empty($username) && !empty($address) && !is_numeric($username))
		{

		
			

			
			$query = "insert into buy (username,address,pname,pquantity,total) values ('$username','$address','$pname','$pquantity',$ptotal)";

			mysqli_query($connect, $query);
        echo '<script>alert("Your Request is Confirm")</script>'; 
			header("Location: prod.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
 ?>

 <br><br><br>
 <?php include ("foot.php") ?>

      </body>  
 </html>
   