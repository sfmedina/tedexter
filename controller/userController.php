<?php
require_once './model/userModel.php';
require_once './view/userView.php';


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
        return $this->view->showClientsById($orders);
    }
    
   /* function addUser() {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];

        $id = $this->model->insertTask($title, $description, $priority);

        header("Location: " . BASE_URL); 
    }
   
    function removeUser($id) {
        $this->model->removeUserById($id);
        header("Location: " . BASE_URL);
    }

    function updateUser($id) {
        $this->model->update($id);
        header("Location: " . BASE_URL); 
    }
*/
}