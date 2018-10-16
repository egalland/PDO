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
        $appointment = $this->_db_->prepare('INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES (:dateHour, :idPatients)');
        $appointment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $appointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        return $appointment->execute();
    }

    public function checkIfAppointmentExists() {
        $result = array();
        $checkAppointment = $this->_db_->prepare('SELECT COUNT(`id`) as `count` FROM `appointments` WHERE `dateHour` = :dateHour AND `idPatients` = :idPatients');
        $checkAppointment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $checkAppointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        if ($checkAppointment->execute()) {
            if (is_object($checkAppointment)) {
                $result = $checkAppointment->fetch(PDO::FETCH_OBJ);
            }
        }
        return $result;
    }

    public function checkIfAppointmentIsAvailable() {
        $result = array();
        $checkAppointment = $this->_db_->prepare('SELECT COUNT(`id`) as `count` FROM `appointments` WHERE `dateHour` = :dateHour');
        $checkAppointment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        if ($checkAppointment->execute()) {
            if (is_object($checkAppointment)) {
                $result = $checkAppointment->fetch(PDO::FETCH_OBJ);
            }
        }
        return $result;
    }
    
    public function getAppointments() {
        $result = array();
        $appointment = $this->_db_->query('SELECT `appointments`.`id`, DATE_FORMAT(`appointments`.`dateHour`, "%d/%m/%Y %H:%i") as `dateHour`, `patients`.`lastname`, `patients`.`firstname`, DATE_FORMAT(`patients`.`birthDate`, "%d/%m/%Y") as `birthDate`, `patients`.`phone`, `patients`.`mail` FROM `appointments` LEFT JOIN `patients` ON `appointments`.`idPatients` = `patients`.`id`');
        if (is_object($appointment)) {
            $result = $appointment->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    public function getOneAppointment() {
        $result = array();
        $appointment = $this->_db_->prepare('SELECT `appointments`.`id`, `appointments`.`idPatients`, DATE_FORMAT(`appointments`.`dateHour`, "%d/%m/%Y %H:%i:%s") as `dateHour`, DATE_FORMAT(`appointments`.`dateHour`, "%Y-%m-%d") as `date`, DATE_FORMAT(`appointments`.`dateHour`, "%H:%i") as `hour`, `patients`.`lastname`, `patients`.`firstname`, DATE_FORMAT(`patients`.`birthDate`, "%d/%m/%Y") as `birthDate`, `patients`.`phone`, `patients`.`mail` FROM `appointments` LEFT JOIN `patients` ON `appointments`.`idPatients` = `patients`.`id` WHERE `appointments`.`id` = :id');
        $appointment->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($appointment->execute()) {
            $result = $appointment->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }

    public function modifyAppointment() {
        $appointment = $this->_db_->prepare('UPDATE `appointments` SET `dateHour` = :dateHour, `idPatients` = :idPatients WHERE `id` = :id');
        $appointment->bindValue(':id', $this->id, PDO::PARAM_INT);
        $appointment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $appointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        return $patient->execute();
    }
    
    public function getAppointmentsForPatient() {
        $result = array();
        $appointment = $this->_db_->prepare('SELECT DATE_FORMAT(`appointments`.`dateHour`, "%d/%m/%Y %H:%i") as `dateHour` FROM `appointments` WHERE `idPatients` = :idPatients');
        $appointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        if ($appointment->execute()) {
            $result = $appointment->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    public function deleteAppointment(){
        $appointment = $this->_db_->prepare('DELETE FROM `appointments` WHERE `id` = :id');
        $appointment->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $appointment->execute();
    }

    public function __destruct() {
        parent::__destruct();
    }
}
