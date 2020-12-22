<?php
abstract class Model{
    // Informations de la base de données
    private $host = "localhost";
    private $db_name = "cocoswing";
    private $username = "root";
    private $password = "";
    private $port = 3308;

    // Propriété qui contiendra l'instance de la connexion
    protected $_connexion;

    // Propriétés permettant de personnaliser les requêtes
    public $table;

    /**
     * Fonction d'initialisation de la base de données
     *
     * @return void
     */
    public function getConnection(){
        // On supprime la connexion précédente
        $this->_connection = null;

        // On essaie de se connecter à la base
        try{
            $this->_connection = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->_connection->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }
    }

    /**
     * Méthode permettant d'obtenir un enregistrement de la table choisie en fonction d'un id
     *
     * @return void
     */
    public function getOne(){
        $sql = "SELECT * FROM ".$this->table." WHERE id=".$this->_id;
        $query = $this->_connection->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    /**
     * Méthode permettant d'obtenir tous les enregistrements de la table choisie
     *
     * @return void
     */
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
}
