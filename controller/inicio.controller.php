
<?php

require_once './view/inicio.view.php'; 
class inicioController{

    public function  __construct() {}

    public function showInicio()
    {
        $view = new inicioView();
        $view->showInicio();
    }
    public function showLogin()
    {
        $view = new inicioView();
        $view->showLogin();
    }
}
