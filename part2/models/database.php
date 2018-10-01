<?php
/**
 * class Database
 */
class Database {
    
    protected $_db_;
    /**
     * __construct lorsqu'on veut se connecter à la bdd
     */
    public function __construct() {
        // essai de connection à la bdd
        try {
            $this->_db_ = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'exercice_usr', 'exercice_psw');
        } catch (Exception $e) { //si la connection echoue on affiche le message d'erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * __destruct de la connection à la db
     */
    public function __destruct(){
        $this->_db_= NULL;
    }
}
