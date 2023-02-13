<?php
    require('../models/Infos.php');
    $info1 = new Infos();
    $gender = $info1->returnGender("fatimaezzahraerrami@gmail.com");
    foreach($gender as $value){
        echo $value;
    }
?>