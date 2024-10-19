<?php

class authView {
    public function showInicio(){
        require './templates/inicioView.templates.phtml';
    }

    public function showLogin($error = ''){
        require './templates/login.template.phtml';
    }

    public function showError(){
        require './templates/error.template.phtml';
    }
}
?>