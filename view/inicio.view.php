<?php
class inicioView
{
    public function showInicio(){
        require './templates/inicioView.templates.phtml';
    }

    public function showLogin(){
        require './templates/login.template.phtml';
    }

    public function showError(){
        require './templates/error.template.phtml';
    }
}
?>