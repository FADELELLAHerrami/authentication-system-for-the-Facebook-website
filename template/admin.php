 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 
    session_start();
    require('../config/config.php');
    require('../config/library.php');
    require('../models/Infos.php');


    function testGender($email){
        $info1 = new Infos();
        $gender = $info1->returnGender($email);
        foreach($gender as $value){
            return $value;
        }
    }


    if(isset($_GET['v'])){
        require('logout.php');
        redirect('login');
    }

    echo $_SESSION['email'];
    if(testGender($_SESSION['email']) == 'male'){
        include('footerForMale.php');
    }else if(testGender($_SESSION['email'])== 'female'){
        include('footerForFemale.php');
    }
    ?>
