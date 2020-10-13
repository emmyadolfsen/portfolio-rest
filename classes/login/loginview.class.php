<?php

class LoginView extends Dbh {


    public function LoginUser($username, $password)
    {
        // kolla om rätt värden är inlagda
        $sql = "SELECT * FROM user WHERE username= '$username' AND password = '$password'";
        $stmt = $this->connect()->prepare($sql);
        if ($stmt->execute()) { 
            return true;
         } else {
            return false;
         }  
    }
}
?>