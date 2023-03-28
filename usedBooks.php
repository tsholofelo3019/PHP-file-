<!DOCTYPE html>

<html>
<style>
    body{font-family: Georgia}

    .Link1 
    {
        padding-right: 50
    }

    .Link2 
    {
        padding-right:50
    }

    .Link3 
    {
        padding-right:50
    }
    .Link4 
    {
        padding-right:50
    }
    
    </style>
<head>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>

    <h1>Varsity Books </h1> 
	
    
    <a href="login.php">logout   </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="usedBooks.php">Used Books   </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a name="sellBooksLink" href="sellBooks.php">Sell Books     </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="index.php"> Show cart    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a  href="adminLogin.php">      Admin</a>
    
    <p style="text-align:center;"> Selling and Buying Used Books</p>
    <div id="book-grid">
	<div class="txt-heading"> Used Books</div>

   
        
	<?php
    include("dbconn.php");
	$book= mysqli_query($dbconnect,"SELECT * FROM book ORDER BY Book_ISBN ASC");
	if (!empty($book)) { 
		while ($row=mysqli_fetch_array($book)) {
		
	?>
		<div class="book-item">
			<form method="post" action="index.php?action=add&pid=<?php echo $row["Book_ISBN"]; ?>">
			<div class="book-image"><img src="<?php echo $row["Book_Image"]; ?>"></div>
			<div class="book-tile-footer">
			<div class="book-title"><?php echo $row["Book_Title"]; ?></div>
			<div class="book-price"><?php echo "$".$row["Book_Price"]; ?></div>
			<div class="book-action"><input type="text" class="book-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}  else {
 echo "No Records.";

	}
	?>
</div>
</body>
</html>