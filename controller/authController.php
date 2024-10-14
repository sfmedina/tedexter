<?php
require_once './view/authView.php';

class authController{
    private $view;
    
    public function __construct() {
        $this->view = new authView();
    }


    public function showInicio(){
        $this->view->showInicio();
    }

    public function showLogin(){
        $this->view->showLogin();
    }

    /*public function validateUser(){

    }*/

    public function showError(){
        $this->view->showError();
    }

    public function showLogOut() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }

}
