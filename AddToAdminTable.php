<?php

    include "dbconn.php";

    $password= password_hash('abcd', PASSWORD_DEFAULT);
    $query= "INSERT INTO tbladmin (Admin_id,Name, Surname, Student_num, password) VALUES('Lasi@vet.com','Lesedi','Shikwambane','12344','{$password}') ";

    $result=mysqli_query($dbconnect,$query);

    if($result)
    {
        echo"view";
    }
?>