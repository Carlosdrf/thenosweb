<?php

class UserSession{

    public function __construct(){
        session_start();
    }

    public function setCurrentUser($user){
        $_SESSION['correo'] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION['correo'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>