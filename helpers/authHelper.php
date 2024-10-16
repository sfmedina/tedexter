<?php

class authHelper {

public function verifySession(){
        session_start(); //lee si hay una cookie
        if(isset($_SESSION['ID_USER'])){ //si esta seteado el id
            $user = new stdClass(); // en el objeto response guarda los datos de usuario
            $user->id = $_SESSION['ID_USER'];
            $user->username = $_SESSION['USERNAME'];
            return $user;
        } else {
            header('Location: ' . BASE_URL . 'showLogin'); //sino redirije log in 
        }
    }

}