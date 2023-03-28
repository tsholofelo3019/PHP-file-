<?php
session_start();

include("dbconn.php");


//code for Cart
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	//code for adding product in cart
	case "add":
		if(!empty($_POST["quantity"])) {
			$pid=$_GET["pid"];
			$result=mysqli_query($dbconnect,"SELECT * FROM book WHERE Book_ISBN='$pid'");
	          while($bookByISBN=mysqli_fetch_array($result)){
			$itemArray = array($bookByISBN["Book_ISBN"]=>array('name'=>$bookByISBN["Book_Title"], 'code'=>$bookByISBN["Book_ISBN"], 'quantity'=>$_POST["quantity"], 'price'=>$bookByISBN["Book_Price"], 'image'=>$bookByISBN["Book_Image"]));
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($bookByISBN["Book_ISBN"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($bookByISBN["Book_ISBN"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			}  else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	}
	break;

	// code for removing product from cart
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["ISBN"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	// code for if cart is empty
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>VARSITY BOOK</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>

<a href="usedBooks.php">Back to home page   </a>
<!-- Cart ---->
<div id="shopping-cart">
<div class="txt-heading">Cart</div>

<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
<?php
$tP=0;
$tQ=0;
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">ISBN</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&ISBN='<?php echo $item["code"]; ?>'" class="btnRemoveAction"><img src="image/delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
				$tQ=$total_quantity;
				$tP=$total_price;
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>





<?php $sId=session_id();
$uId=$_SESSION['USER_ID'];
echo "<p>Ref No: {$sId}        </p>";?>
<button type="submit" name="checkout"><a href="checkout.php?userId=<?=$uId?>&param=<?=$tP?>&ref=<?= $sId?>&tQuantity=<?=$tQ?>">CheckOut</a></button>
<p>Order History</p>
<?php
//View the shopping history 
	
				//History shown for specific user
				$sql= "SELECT * FROM orderline WHERE email='{$uId}' ";

         $result =mysqli_query($dbconnect,$sql);

         if(mysqli_num_rows($result)>0)
         {
            echo "<table class=\"styled-table\"><tr><th>Reference Number</th><th>Total Price</th><th>Total Quantity</th></tr>";
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<tr><td>{$row["refNo"]}</td><td>{$row["total_Price"]}</td><td>{$row["total_Quantity"]}</td></tr>";
            }

            echo"</table>";
         }
         else 
         {
            echo"<p>No results</p>";
         }
			
?>


</BODY>
</HTML>