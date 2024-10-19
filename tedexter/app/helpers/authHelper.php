<?php

function verifySession($res){
        session_start(); //lee si hay una cookie
        if(isset($_SESSION['USERNAME'])){ //si esta seteado el username
            $res->user = new stdClass(); // en el objeto response guarda los datos de usuario
            //$res->user->id = $_SESSION['ID_USER']; 
            $res->user->username = $_SESSION['USERNAME'];
            return;
        } else {
            header('Location: ' . BASE_URL . 'showLogin'); //sino redirije log in 
        }
    }
