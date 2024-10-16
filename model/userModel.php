<?php
require_once './config.php';

class userModel {
    private $db;

    public function __construct() {
        $this-> db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
    }

   
    public function showClients() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase
        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM client");
        $query->execute();
        // 3. obtengo los resultados
        $clients = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        return $clients;
    }

    public function showClientsById($id){

        $query = $this->db->prepare('SELECT * FROM `command` WHERE id_client = ?');
        $query->execute([$id]);
        $orders = $query->fetchAll(PDO::FETCH_OBJ); //fetchAll porque select agarra todos por ende fetchall devuelve un arreglo de registros, cuando busco uno es fetch que devuelve un registro

        return $orders;
    }
    
    public function getClientById($id){

        $query = $this->db->prepare('SELECT * FROM `client` WHERE id_client = ?');
        $query->execute([$id]);
        $client = $query->fetch(PDO::FETCH_OBJ);
        return $client;
    }
    
   public function newClient($name, $email, $addres, $phone) {
        $query = $this->db->prepare('INSERT INTO `client` (name, email, addres, phone) VALUES (?, ?, ?, ?)');
        $query->execute([$name, $email, $addres, $phone]);

        return $this->db->lastInsertId();
    }

    public function deleteClientById($id) {
        $query = $this->db->prepare('DELETE FROM `command` WHERE id_client = ?');
        $query->execute([$id]);
    
        $query = $this->db->prepare('DELETE FROM `client` WHERE id_client = ?');
        $query->execute([$id]);
    }

    public function updateClient($id_client, $name, $email, $addres, $phone) {
        $query = $this->db->prepare('UPDATE `client` SET name = ?, email = ?, addres = ?,phone = ? WHERE id_client = ?');
        $query->execute([$name, $email, $addres, $phone, $id_client]); 
    }

    public function getUserByUsername ($username){
        $query = $this->db->prepare('SELECT * FROM `user` WHERE username = ?');
        $query->execute([$username]);

        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}

