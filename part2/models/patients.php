<?php

include_once 'database.php';

class Patients extends Database {

    public $id;
    public $lastname;
    public $firstname;
    public $birthDate;
    public $phone;
    public $mail;

    public function __constructor() {
        parent::__construct();
    }

    public function checkIfPatientExist() {
        $result = array();
        $patient = $this->_db_->prepare('SELECT COUNT(`id`) AS `count` FROM `patients` WHERE `lastname` = :lastname AND `firstname` = :firstname AND `birthDate` = :birthDate AND `phone` = :phoneNumber AND `mail` = :mail');
        // :bidule = marqueur nominatif
        $patient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $patient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $patient->bindValue(':birthDate', $this->birthDate, PDO::PARAM_STR);
        $patient->bindValue(':phoneNumber', $this->phone, PDO::PARAM_STR);
        $patient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        if ($patient->execute()) {
            $result = $patient->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }

    public function addPatient() {
        $patient = $this->_db_->prepare('INSERT INTO `patients` (`lastname`, `firstname`, `birthDate`, `phone`, `mail`) VALUES (:lastname, :firstname, :birthDate, :phoneNumber, :mail)');
        $patient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $patient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $patient->bindValue(':birthDate', $this->birthDate, PDO::PARAM_STR);
        $patient->bindValue(':phoneNumber', $this->phone, PDO::PARAM_STR);
        $patient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $patient->execute();
    }

    public function getPatients() {
        $result = array();
        $patient = $this->_db_->query('SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthDate`, "%d/%m/%Y") as `birthDate`, `phone`, `mail` FROM `patients`');
        if (is_object($patient)) {
            $result = $patient->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    public function getOnePatient() {
        $result = array();
        $patient = $this->_db_->prepare('SELECT `id`, `lastname`, `firstname`, `birthDate`, `phone`, `mail` FROM `patients` WHERE `id` = :id');
        $patient->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($patient->execute()) {
            $result = $patient->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }

    public function modifyPatient() {
        $patient = $this->_db_->prepare('UPDATE `patients` SET `lastname` = :lastname, `firstname` = :firstname, `birthDate` = :birthDate, `phone` = :phoneNumber, `mail` = :mail WHERE `id` = :id');
        $patient->bindValue(':id', $this->id, PDO::PARAM_INT);
        $patient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $patient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $patient->bindValue(':birthDate', $this->birthDate, PDO::PARAM_STR);
        $patient->bindValue(':phoneNumber', $this->phone, PDO::PARAM_STR);
        $patient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $patient->execute();
    }

    public function __destruct() {
        $this->_db_ = NULL;
    }
}
