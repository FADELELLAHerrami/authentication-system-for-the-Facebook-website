<?php 
    require('../config/library.php');
    require('../models/Infos.php');
    $status = '';
    if(isset($_GET['v'])){
        if($_GET['v']==2){
            redirect('login');
        }
    }
   

    
    
    $status = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){


        $firstname = htmlspecialchars($_POST['firstname'])?? '';
        $lastname = htmlspecialchars($_POST['lastname'])?? '';
        $email = htmlspecialchars($_POST['email']) ?? '';
        $password = htmlspecialchars($_POST['password']) ?? '';
        $gender = htmlspecialchars($_POST['gender'])?? '';
        $birthday = htmlspecialchars($_POST['birthday'])?? '';







            if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($gender) || empty($birthday)){
                $status = "All informations are required";
            }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $status .= "email is invalid <br />";
            }else if(strlen($password) < 8){
                $status .= "password must be more than 8 characters <br />";
            }else{
                $info1 = new Infos();
                $info1->addInfo($firstname,$lastname,$email,$password,$gender,$birthday);
                redirect('login');
            }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/Login.css">
    <title>Document</title>
    <style>
        .container1{
            display: flex;
            justify-content: space-around;
            margin-top: -25px;
        }
        .content1{
            display: flex;
            align-items: center;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        input[type="date"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
        }
        
    </style>
</head>
<body>
<a href="signup.php?v=2">Login</a><br />
<div class="container">
        <div class="content1">
            <h1><b>facebook</b></h1>
        </div>
       <div class="content2a">
            <form action="" method="POST">
                <input type="text" name="firstname" placeholder="First name"><br />
                <input type="text" name="lastname" placeholder="Last name"><br />
                <input type="text" name="email" placeholder="Email address or phone number"><br />
                <input type="password" name="password" placeholder="Password"><br />
                <p class="gender">Gender ?</p> <br />
                <div class="container1">
                    <span class="content1">
                        <span>Female</span>   <span><input type="radio" id="female" name="gender" value="female"></span>
                    </span>
                    <span class="content1">
                        <span>Male</span>     <span><input type="radio" id="male" name="gender" value="male"></span>
                    </span>
                    <span class="content1">
                        <span>Custom</span>  <span><input type="radio" id="custom" name="gender" value="custom"></span>
                    </span>
                </div>
                <p>Birthday ?</p>
                <input type="date" id="birthday" name="birthday">
                <input type="submit" class="btn1" value="Sign up"><br />
            </form>
                
           <p>
                People who use our service may have uploaded your contact information to Facebook. Learn more.<br />
            By clicking Sign Up, you agree to our Terms, Privacy Policy and Cookies Policy. You may receive SMS notifications from us and can opt out at any time.
           </p>
            <p class="error">
                <?php 
                    if($status != '' ){
                        echo $status;
                    }
                ?>
            </p>
        </div>
        
    </div>
    
</body>
</html>