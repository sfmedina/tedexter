<?php
require_once './model/userModel.php';
require_once './controller/userController.php';
require_once './view/userView.php';

class userView {
  
    public function showClients($clients) {
      $count = count($clients);
      require './templates/clientsView.template.phtml';
    }

  public function showClientsById($orders){
    $count = count($orders);
    require './templates/clientsById.template.phtml';
  }
}
?>
