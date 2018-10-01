<?php

include_once 'database.php';

class Clients extends Database {
    public $id;
    public $lastName;
    public $firstName;
    public $birthDate;
    public $card;
    public $cardNumber;

    public function __constructor() {
        parent::__construct();
    }

    public function getAllClients() {
        $request = $this->_db_->query('SELECT `firstname`, `lastname` FROM `clients`');
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
    public function getTwentyFirstClients() {
        $request = $this->_db_->query('SELECT `firstname`, `lastname` FROM `clients` LIMIT 20');
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function getClientsWithCard() {
        $request = $this->_db_->query('SELECT `clients`.`firstname`, `clients`.`lastname` FROM `clients` LEFT JOIN `cards` ON `clients`.`cardNumber` = `cards`.`cardNumber` WHERE `cards`.`cardTypesId` = 1');
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function getClientsStartWithM() {
        $request = $this->_db_->query('SELECT `firstname`, `lastname` FROM `clients` WHERE `lastname` LIKE "M%" ORDER BY `lastname`');
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function getClientsLastnameFirstnameBirthDateLoyaltyCardNumberCard() {
        $request = $this->_db_->query('SELECT `clients`.`lastname`, `clients`.`firstname`, DATE_FORMAT(`clients`.`birthDate`, "%d/%m/%Y") as `birthDate`, `cards`.`cardTypesId`, `cards`.`cardNumber` FROM `clients` LEFT JOIN `cards` ON `clients`.`cardNumber` = `cards`.`cardNumber`');
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
    