<?php
    require('data_provider.php');
    Class Infos extends DataProvider{

        public function addInfo($firstname,$lastname,$email,$password,$gender,$birthday){
            $db = $this->connect();
            if($db == null){
                return;
            }
            $sql = 'INSERT INTO infos (FirstName,LastName,Email,Password,Gender,Birthday) VALUES(:FirstName,:LastName,:Email,:Password,:Gender,:Birthday)';
            $stm = $db->prepare($sql);
            $stm->execute([
                ":FirstName"=> $firstname,
                ":LastName" => $lastname,
                ":Email" => $email,
                ":Password" => $password,
                ":Gender" => $gender,
                ":Birthday" => $birthday
            ]);
            $db = null;
            $stm = null;
        }


        public function getInfosByEmailAndPassword($email,$password){
            $db = $this->connect();
            if($db == null){
                return;
            }
            $sql = 'SELECT * FROM infos WHERE Email = :email AND Password = :password';
            $stm = $db->prepare($sql);
            $stm->execute([
                ':email' => $email,
                ':password' => $password,
            ]);
            $data = $stm->fetch();
            if(!$data){
                return false;
            }else{
                return true;
            }
            $db = null;
            $stm = null;
        }
        public function returnGender($email){
            $db = $this->connect();
            if($db == null){
                return;
            }
            $sql = 'SELECT Gender FROM infos WHERE Email = :email';
            $stm = $db->prepare($sql);
            $stm->execute([
                ":email" =>$email,
            ]);
            $data = $stm->fetch(PDO::FETCH_OBJ);
            $db =null;
            $stm = null;
            return $data;
        }
    }
?>