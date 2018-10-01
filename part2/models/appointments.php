<?php

include_once 'database.php';

class Appointments extends Database {

    public $id;
    public $dateHour;
    public $idPatients;

    public function __constructor() {
        parent::__construct();
    }

    public function addAppointment(){
        $addAppointment = $this->db->prepare('INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES (:dateHour, :idPatients)');
        $addAppointment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $addAppointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        return $addAppointment->execute();
    }

    public function checkIfAppointmentExists() {
        $result = array();
        $checkAppointment = $this->_db_->prepare('SELECT * FROM `appointments` WHERE `dateHour` = :dateHour AND `idPatients` = :idPatients');
        $checkAppointment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $checkAppointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        if ($checkAppointment->execute()) {
            $result = $checkAppointment->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    public function checkIfAppointmentIsAvailable() {
        $result = array();
        $checkAppointment = $this->_db_->prepare('SELECT * FROM `appointments` WHERE `dateHour` = :dateHour');
        $checkAppointment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        if ($checkAppointment->execute()) {
            $result = $checkAppointment->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    public function __destruct() {
        $this->_db_ = NULL;
    }
}
