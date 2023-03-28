<?php
        include "dbconn.php";
        $name="";
        $surname="";
        $email="";
        $password="";
        $confirmPassword="";
        $studentNo="";

       

        $nameValid=FALSE;
        $surnameValid=FALSE;
        $emailValid=FALSE;
        $passwordValid=FALSE;
        $studentNoValid=FALSE;
        $confirmPasswordValid=FALSE;

        $hashPassword="";

        $stickyName="";
        $stickySurname="";
        $stickyEmail="";
        $stickyStudentNo="";
        $stickyPassword="";
        $stickyConfirmPassword= "";

        $sql= "SELECT * FROM book ";

         $result =mysqli_query($dbconnect,$sql);

         if(mysqli_num_rows($result)>0)
         {
            echo "<table class=\"styled-table\"><tr><th>Book Title</th><th>Book ISBN</th><th>Book Author</th><th>Book Desc</th><th>Book Price</th><th> Quantity</th><th>Book Image</th></tr>";
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<tr><td>{$row["Book_Title"]}</td><td>{$row["Book_ISBN"]}</td><td>{$row["Book_Author"]}</td><td>{$row["Book_Desc"]}</td><td>{$row["Book_Price"]}</td><td>{$row["quantity"]}</td><td><img src=\"/images/{$row["Book_Image"]}\"></td><td><button name='submit' type='submit'><a href='editBook.php?param={$row["Book_ISBN"]}'> Edit </a></button></td><td> <button name = 'submit' type = 'submit' 
                > <a href='deleteBook.php?param={$row["Book_ISBN"]}' > Delete</a></button></td></tr>";
            }

            echo"</table>";
         }
         else 
         {
            echo"<p>No results</p>";
         }
      
   
    
       
 
    ?>
    
		
