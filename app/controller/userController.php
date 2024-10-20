<?php
require_once './app/model/userModel.php';
require_once './app/view/userView.php';

class userController {
    private $model;
    private $view;
 
    public function __construct() {
        $this->model = new userModel();
        $this->view = new userView();
    }

    public function showClients() {
        $clients = $this->model->showClients();
        return $this->view->showClients($clients);
    }

    public function showClientsById($id){
        $orders = $this->model->showClientsById($id);

        $client = $this->model->getClientById($id);
        
        return $this->view->showClientsById($orders, $client);
    }
    
   public function newClient() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $addres = $_POST['addres'];
        $phone = $_POST['phone'];

        if ($this->isEmailUsed($email, $_POST['id_client'])) { //chequea si el email ha sido usado
            return $this->view->addClient(null,'Email ya ha sido usado'); //si fue usado salta error en el form
        }

        $image = null;
        if (isset($_FILES['image']) && ($_FILES['image']['type'] == "image/jpg" 
                || $_FILES['image']['type'] == "image/jpeg" 
                || $_FILES['image']['type'] == "image/png")) {
                $image = $_FILES['image']['tmp_name'];
        }
        // se añade
           $this->model->newClient($name, $email, $addres, $phone, $image);
        
        header("Location: " . BASE_URL. 'showClients'); //se actualiza a show clients
}

    public function updateClient(){
        $id_client = $_POST['id_client'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $addres = $_POST['addres'];
        $phone = $_POST['phone'];

        if ($this->isEmailUsed($email, $_POST['id_client'])) { //chequea si el email ha sido usado
            return $this->view->addClient(null,'Email ya ha sido usado'); //si fue usado salta error en el form
        }

        $image = null;
        if (isset($_FILES['image']) && ($_FILES['image']['type'] == "image/jpg" 
                || $_FILES['image']['type'] == "image/jpeg" 
                || $_FILES['image']['type'] == "image/png")) {
                $image = $_FILES['image']['tmp_name'];
        } 

        $this->model->updateClient($id_client, $name, $email, $addres, $phone,$image);  
        header("Location: " . BASE_URL. 'showClients'); //se actualiza a show clients
    }

    

    public function showClientForm($id = null) {
        $client = null;
            if ($id) {
            // si hay id cargado voy al modelo a buscar los datos
            $client = $this->model->getClientById($id); // traigo lo del cliente con el id especifico
        }
            return $this->view->addClient($client); //te devuelve la vista del add client dependiendo de la accion 
}

    public function deleteClient($id) {
        $this->model->deleteClientById($id);
        header("Location: " . BASE_URL. 'showClients');
    }

    public function isEmailUsed($email, $id_client = null){
        $existingEmail = $this->model->getClientByEmail($email);
        return $existingEmail  && (!$id_client || $existingEmail->id_client != $id_client); 
    }
}