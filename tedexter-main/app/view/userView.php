<?php

class userView {
  
    public function showClients($clients) {
      $count = count($clients);
      require './templates/clientsView.template.phtml';
    }

  public function showClientsById($orders,$client){
    $count = count($orders);
    require './templates/clientsById.template.phtml';
  }

  public function addClient($client = null, $error = ''){
    require './templates/addClient.phtml';
  }
}
?>
