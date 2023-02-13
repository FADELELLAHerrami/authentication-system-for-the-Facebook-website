<?php
    session_start();
    require('../config/library.php');
    require('../config/config.php');
    require('../models/Infos.php');
    
    if(isAuthenticated()){
        redirect('admin');
        die();
    }

    $info1 =new Infos();

        
    $status = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = htmlspecialchars($_POST['email'])  ?? '';
        $password = htmlspecialchars($_POST['password']) ?? '';
            if($info1->getInfosByEmailAndPassword($email,$password) ==true){
                $_SESSION['email'] = $email;
                redirect('admin');
                die();
            }else{
                $status = 'The provided credentals didn\'t work';
            }
        }
    if(isset($_GET['v'])){
        if($_GET['v']==2){
            redirect('signup');
        }else if($_GET['v'] == 5 ){
            redirect('forgotten');
        }
    } 

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../style/Login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="content1">
            <h1><b>facebook</b></h1>
            <h3>Facebook helps you connect and share<br /> with the people in your life.</h3>
        </div>
       <div class="content2">
            <form action="" method="POST">
                <input type="text" name="email" placeholder="Email address or phone number"><br />
                <input id="password" type="password" name="password" placeholder="Password"><br />
                <a class="show" onclick="togglePassword()">show/hide</a>
                <input type="submit" class="btn1" value="Log in"><br />
            </form>
           
            <p class="error">
                <?php 
                    if($status != '' ){
                        echo $status;
                    }
                ?>
            </p>
             <a href="login.php?v=5" class="a1">Forgotten password?</a>
            <br />
            <hr>
            <a href="login.php?v=2" class="btn2"> Create new account </a><br />
            <p><a href="" class="a2"><b>Create a Page</b></a> for a celebrity, brand or business.</p>
        </div>
    </div>

</body>
<script>
    function togglePassword(){
        let x = document.getElementById('password');
        if(x.type === 'password'){
            x.type = 'text';
        }else{
            x.type = 'password';
        }
    }
</script>
</html>