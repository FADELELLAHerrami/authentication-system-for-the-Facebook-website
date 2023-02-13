<?php
    require('../config/library.php');
    if(isset($_GET['v'])){
        if($_GET['v'] == 1){
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
    <title>Document</title>
    <style>
        body{
            background-color: #F0F2F5;
        }
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 300px;
            height: 400px;
            text-align: center;
            margin-top: 12%;
            margin-left: 43%;
            background-color: white;
            box-shadow: 0 0 0 .2px gray;
            border-radius: 7px;
        }
       
        input{
            margin-bottom: 15px;
            width: 100%;
            margin-bottom: 12px;
            height: 30px;
            border-radius: 3px;
            border: 1px solid gray;
            caret-color: #3A8AF2;
            padding-left: 10px;
        }
        h1{
            color: #3A8AF2;
        }
        #update{
            background-color: #3A8AF2;
            border: none;
        }
        
    </style>
</head>
<body>
    <a href="forgotten.php?v=1">Login</a>
    <div class="container">
        
        <form action="">
            <h1>Find Your Account</h1><br>
            <input placeholder="Email" type="text"><br>
            <input placeholder="New password" type="password"><br>
            <input placeholder="New password" type="password"><br>
            <input id="update" type="submit" value="Update" >
        </form>
    </div>
</body>
</html>