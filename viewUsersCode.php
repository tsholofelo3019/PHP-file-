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

        $sql= "SELECT * FROM tblUser ";

         $result =mysqli_query($dbconnect,$sql);

         if(mysqli_num_rows($result)>0)
         {
            echo "<table class=\"styled-table\"><tr><th>Name</th><th>Surname</th><th>Email</th><th>Password</th><th>Student_num</th><th>Verified</th></tr>";
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<tr><td>{$row["name"]}</td><td>{$row["surname"]}</td><td>{$row["email"]}</td><td>{$row["password"]}</td><td>{$row["student_num"]}</td><td>{$row["Verified"]}</td><td><button name='submit' type='submit'><a href='editUser.php?param={$row["email"]}'> Edit </a></button></td><td> <button name = 'submit' type = 'submit' 
                > <a href='deleteUser.php?param={$row["email"]}' > Delete</a></button></td></tr>";
            }

            echo"</table>";
         }
         else 
         {
            echo"<p>No results</p>";
         }
      
   
    
       
 
    ?>
    
		
