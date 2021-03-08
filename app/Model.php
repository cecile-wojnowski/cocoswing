<?php
abstract class Model{
    // Informations de la base de données
    private $host = "localhost";
    private $db_name = "cocoswing";
    private $username = "root";
    private $password = "";
    protected $_connection; // Propriété qui contiendra l'instance de la connexion
    public $table; // Propriétés permettant de personnaliser les requêtes

    public function getConnection(){
      $this->_connection = null; // On supprime la connexion précédente

      try{
          $this->_connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
          $this->_connection->exec("set names utf8");
      }catch(PDOException $exception){
          echo "Erreur de connexion : " . $exception->getMessage();
      }
    }

    public function getOne(){
        $sql = "SELECT * FROM ".$this->table." WHERE id=".$this->_id;
        $query = $this->_connection->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    public function getAll(){
        $sql = "SELECT * FROM ".$this->table;
        $query = $this->_connection->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function deleteOne(){

    }

    public function test() {
      var_dump(get_object_vars($this));
    }

    public function __get($name){
      return $this->$name;
    }
}
