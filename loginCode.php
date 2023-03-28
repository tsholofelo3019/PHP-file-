

	
    <?php
        include("dbconn.php");
        $userName="";
        $password="";
       
        $userNameError="";
        $passwordError="";
        
        

        $userNameValid=FALSE;
  
        $passwordValid=FALSE;
    if(isset($_POST['submit'])){
        $stickyUserName=$_POST['userName'];
        $stickyPassword=$_POST['password'];
    }
    else
    {
        $stickyUserName=" ";
        $stickyPassword=" ";
    }
            if(isset($_POST['login'])){

               
                
               
                if (!empty($_POST['userName']) &&  !empty($_POST['password'])) {
                    $userName= filter_var($_POST['userName'], FILTER_SANITIZE_EMAIL);
                    $userCheck = mysqli_query($dbconnect, "SELECT * FROM tbluser WHERE email = '{$userName}'");
                  
                        
                        
                           if($userCheck)
                           {
                               $userNameValid=True;
                               if($userNameValid )
                                    {
                       
                                        $row=mysqli_fetch_assoc($userCheck);
                                        $hashedPassword=$row['password'];
                                        
                                            if(password_verify($_POST['password'], $hashedPassword ) )
                                                 {
                                                    if($row['Verified'])
                                                    {
                                                     $passwordValid=True;
                                                     session_destroy();
                                                     session_start();
                                                     $_SESSION['message'] = "{$row['name']} is logged in.";
                                                     $_SESSION['msg_type'] = "warning";
                                                     $_SESSION['USER_ID']=$userName;
                                                     header('location:usedBooks.php');
                                                     
                                                    }
                                                    else{
                                                        echo "<p>Still pending verification</p>";
                                                    }
                                                 }
                                            else 
                                                {
                                                    $userNameError="Please insert correct name or password";
                                                }
                                            
                                    }
                             }
                        
                    
                }
                else
                {
                    $userNameError="Please insert name";
                    $passwordError="Please insert password";
                }
               
           
                
                
                
                
            }

                 function cleanse($inpu )
                 {
                     $blue= trim($inpu);
                    $blue=stripslashes($blue);
                    $blue=htmlspecialchars($blue);

                    return $blue;
                 }
                 
 
    ?>
    
		
