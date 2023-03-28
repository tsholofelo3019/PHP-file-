<?php 
include("dbconn.php");
$title = $isbn = $author = $description= $price =$image =$quantity= "";
    

    $isbn = $_GET['param'];

    $sql = "SELECT * FROM tblrequest WHERE Book_ISBN =  '{$isbn}'";

    if($dbconnect === FALSE){
        echo "DB Error - " . mysqli_connect_error();
        exit();
    }

    $result = mysqli_query($dbconnect, $sql);

    $row = mysqli_fetch_assoc($result);
        
    $title = $row['Book_Title'];
    $isbn = $row['Book_ISBN'];
    $author = $row['Book_Author'];
    $description = $row['Book_Desc'];
    $price =$row['Book_Price'];
    $quantity=$row['quantity'];
    $image= $row['Book_Image'];
    //inserting book into the books for sale

    $sql = "INSERT INTO book (Book_Title, Book_ISBN, Book_Author, Book_Desc, Book_Price,quantity,Book_Image) VALUES('{$title}','{$isbn}','{$author}','{$description}','{$price}','{$quantity}','{$image}') ";
                   
                        

        //executing the query
        $dbResult = mysqli_query($dbconnect, $sql);

        if ($dbResult === FALSE) {
            echo "Error inserting details into the database: ". mysqli_connect_error();
        } else { 
            //echo "Book details inserted successfully.";
            $sql = "DELETE FROM tblrequest WHERE Book_ISBN = '{$isbn}'";

            $result = mysqli_query($dbconnect, $sql);
            session_start();
            $_SESSION['message'] = "Book has been successfully updated.";
            $_SESSION['msg_type'] = "warning";
            header('location:viewSellRequests.php');
        }

            //closing the connection
            mysqli_close($dbconnect);
            $dbconnect = FALSE;
        
    ?>