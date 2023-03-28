<!DOCTYPE html>


<html>
<style>
    * {box-sizing: border-box}

/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
}
    </style>
<head>
</head>
<body>
<?php include "addBookCode.php" ; ?>
    <h1>Varsity Books </h1>

   
	<form method="POST" >

   
		
		<label> Book Title: </label> <input type="text" name="title" value="<?= $title?>"><span style="color:red"> <?= $title_error?> </span>
        </br></br>
		<label> ISBN: </label><input type="text" name="isbn" value="<?= $isbn ?>" ><span style="color:red"><?= $isbn_error?> </span>
        </br></br>
        <label> Author: </label><input type="text" name="author" value="<?= $author ?>"><span style="color:red"><?= $author_error?> </span>
        </br></br>
        <label> Description: </label><input type="text" name="description" value="<?= $description ?>" ><span style="color:red"><?= $description_error?> </span>
        </br></br>
        <label> Price: </label><input type="text" name="price" value="<?= $price ?>"><span style="color:red"><?= $price_error?> </span>
        </br></br>
        <label> Quantity: </label><input type="text" name="quantity" value="<?= $quantity ?>"><span style="color:red"><?= $quantity_error?> </span>
        </br></br>
        <label> Image: </label><input type="file" name="image" value="<?= $image?>"><span style="color:red"><?= $image_error?> </span>
        </br></br>
        
        </br></br>

        
    <button type="submit" class="signupbtn" name="AddBook"> Add Book</button><button class="cancelbtn" type="button"><a href="viewBooks.php">  Back to view Books </a></button>

  

        
		
</form>	

</body>
</html>