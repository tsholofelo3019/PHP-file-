

	
    <?php
        include "dbconn.php";
        $name="";
        $surname="";
        $email="";
        $password="";
        $confirmPassword="";
        $studentNo="";

        $nameError="";
        $surnameError="";
        $emailError="";
        $studentNoError="";
        $passwordError="";
        $confirmPasswordError="";

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

        $registrationSuccess="";
      
    if(isset($_POST['submit'])){
        $stickyName=$name;
        $stickySurname=$surname;
        $stickyEmail=$email;
        $stickyStudentNo=$studentNo;
        $stickyPassword=$password;
        $stickyConfirmPassword=$confirmPassword;
      
    }
    
        //validation of the inputs
            if($_SERVER['REQUEST_METHOD']==='POST'){

                //Name validation
                if (!empty($_POST['Name'])) {
                    $name=cleanse($_POST['Name']);
                    if(preg_match ("/^[a-zA-z]*$/", $name)==1)
                    {
                            $nameValid=TRUE;
                    }
                    else
                    {
                        $nameError="Please insert correct name";
                    }
                }
                else
                {
                    $nameError="Please insert name";
                }
                //Surname validation
                if (!empty($_POST['Surname'])) {
                    $surname=cleanse($_POST['Surname']);
                    if(preg_match ("/^[a-zA-z]*$/", $surname)==1)
                    {
                            $surnameValid=TRUE;
                    }
                    else
                    {
                        $surnameError="Please insert Surname";
                    }
                }
                else
                {
                    $surnameError="Please insert surname";
                }
                //Email/username validation

                if (!empty($_POST['Email'])) {
                    $email=filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
                    if(filter_var($email,FILTER_VALIDATE_EMAIL)=== FALSE)
                    {
                            $emailError="Please insert correct email";
                    }
                    else
                    {
                        $Squery="SELECT * FROM tbluser WHERE email = {$email}";
                                if(mysqli_query($dbconnect, $Squery))
                                {
                                    $emailError="Email already exists";
                                }
                                else{
                                $emailValid=TRUE;
                                }
                    }
                    
                }
                else
                {
                    $emailError="Please insert correct email";
                }
                //Student Number validation
                if (!empty($_POST['StudentNo'])) {
                    $studentNo=cleanse($_POST['StudentNo']);
                    if(preg_match("/[0-9][0-9][0-9][0-9][0-9]/", $studentNo)==1)
                    {
                            $studentNoValid=TRUE;
                    }
                    else
                    {
                        $studentNoError="Please insert correct student number with 5 digits";
                    }
                }
                else
                {
                    $studentNoError="Please insert student number";
                }
                
                //Password Validation
                if (!empty($_POST['Password'])) 
                {   

                    $password=$_POST['Password'];
                    $passwordValid=TRUE;
                    if(!empty($_POST['ConfirmPassword']))
                    {
                        $confirmPassword=$_POST['ConfirmPassword'];
                        //checking to see if both passwords match
                        if($confirmPassword==$password)
                        {
                            $confirmPasswordValid=TRUE;
                        }
                        else
                        {
                         $confirmPasswordError="Password does not match the one above";
                        }
                    }
                }
                else
                {
                    $passwordError="Please enter password";
                }
                    //Insert data into database
                if($nameValid && $surnameValid && $emailValid && $studentNoValid && $passwordValid && $confirmPasswordValid)
                {
                    //Hashing the password
                    $hashPassword= password_hash($password, PASSWORD_DEFAULT);
                        echo"<p> password hashed</p>";
                    $query= "INSERT INTO tbluser (name, surname, email, password, student_num,verified) VALUES('{$name}','{$surname}','{$email}','{$hashPassword}','{$studentNo}',0) ";
                    if(mysqli_query($dbconnect,$query))
                    {
                        $registrationSuccess="Registration was successful. Awaiting approval....";
                    }
                    else
                    {
                        $registrationSuccess="Registration unsuccesful";
                    }
                    
                }


                } 

                 function cleanse($inpu)
                 {
                     $blue= trim($inpu);
                    $blue=stripslashes($blue);
                    $blue=htmlspecialchars($blue);

                    return $blue;
                 }
                 
                 mysqli_close($dbconnect);
 
    ?>
    
		
