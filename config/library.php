<?php
  
    function redirect($page){
        return header("Location:$page.php");
    }

    function isAuthenticated(){
        if(isset($_SESSION['email'])){
            return $_SESSION['email'];
        }
    } 

    function authenticate($email,$password){
        return ($email == EMAIL && $password == PASSWORD);
    }

    function ensureUserIsAuthenticated(){
        if(!isAuthenticated()){
            redirect('login');
            die();
        }
    }
   

?>