<?php
require_once './view/authView.php';

require_once './model/authModel.php';

class authController{
    private $view;
    private $model;
    
    public function __construct() {
        $this->view = new authView();
        $this->model = new authModel();
    }


    public function showInicio(){
        $this->view->showInicio();
    }

    public function showLogin(){
        $this->view->showLogin();
    }

    public function login(){
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            return $this->view->showLogin('Por favor ingrese usuario y contraseña');
        }
       //chequeo que esten seteados y los pongo en variables
        $username = $_POST['username'];
        $password = $_POST['password'];

        //busco usuario por su username
        $userDb = $this->model->getUserByUsername($username);

        if (!$userDb) {
            return $this->view->showLogin('El usuario no existe');
        }

        //verifico que exista y que las contras sean iguales
        if (password_verify($password, $userDb->password)) {
            //guardo en la sesion los datos del usuario
            session_start();
            $_SESSION['ID_USER'] = $userDb->id;
            $_SESSION['USERNAME'] = $userDb->username;
            $_SESSION ['IS_LOGGED'] = true;// $_SESSION['LAST_ACTIVITY'] = time(); //para el tiempo de inactividad
            
            header("Location: " . BASE_URL. 'home');
        } else {
            return $this->view->showLogin('Contraseña incorrecta..');
        }
        
    }

    public function showError(){
        $this->view->showError();
    }

    public function showLogOut() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL. 'home');
    }

}
