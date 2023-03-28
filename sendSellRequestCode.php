<?php
    include("dbconn.php");

    $errorCount = 0;
    $title_error = $isbn_error=$author_error = $description_error=$quantity_error = $price_error = $image_error = "";
    $title = $isbn = $author = $description= $price= $quantity =$image = "";
    

   /* $isbn = $_GET['param'];

    $sql = "SELECT * FROM book WHERE Book_ISBN =  '{$isbn}'";

    if($dbconnect === FALSE){
        echo "DB Error - " . mysqli_connect_error();
        exit();
    }

    $result = mysqli_query($dbconnect, $sql);

    $row = mysqli_fetch_assoc($result);
        //Sticky values
    $title = $row['Book_Title'];
    $isbn = $row['Book_ISBN'];
    $author = $row['Book_Author'];
    $description = $row['Book_Desc'];
    $price =$row['Book_Price'];
    $image= $row['Book_Image']; */
  
    if(isset($_POST["AddBook"])){
        if(empty($_POST['title'])){
            $title_error = "Please insert the title.";
            $errorCount++;
        }else{

            $title = $_POST['title'];
        }

        if(empty($_POST['isbn'])){
            $isbn_error = "Please insert the isbn.";
            $errorCount++;
        }else{
            $isbn = $_POST['isbn'];
        }

        if(empty($_POST['author'])){
            $author_error = "Please insert the author";
            $errorCount++;
        }else{
            $author = $_POST['author'];
        }

        if(empty($_POST['description'])){

            $description_error = "Please insert the description.";
            $errorCount++;
        }else{
            $description = $_POST['description'];
        }

        if(empty($_POST['price'])){

            $price_error = "Please insert the price.";
            $errorCount++;
        }else{
            $price = $_POST['price'];
        }

        if(empty($_POST['quantity'])){

            $quantity_error = "Please insert the quantity.";
            $errorCount++;
        }else{
            $quantity = $_POST['quantity'];
        }
      

        
            $image = $_POST['image'];
        
        

           
        if($errorCount == 0){
            //query for updating into a table
            $sql = "INSERT INTO tblrequest (Book_Title, Book_ISBN, Book_Author, Book_Desc, Book_Price,quantity,Book_Image) VALUES('{$title}','{$isbn}','{$author}','{$description}','{$price}','{$quantity}','{$image}') ";
                   
                        

        //executing the query
        $dbResult = mysqli_query($dbconnect, $sql);

        if ($dbResult === FALSE) {
            echo "Error inserting details into the database: ". mysqli_connect_error();
        } else { 
            //echo "User details updated successfully.";
            session_start();
            $_SESSION['message'] = "Book has been successfully updated.";
            $_SESSION['msg_type'] = "warning";
            header('location:sellBooks.php');
        }

            //closing the connection
            mysqli_close($dbconnect);
            $dbconnect = FALSE;
        }
        unset($_POST["AddBook"]);
    }


?>