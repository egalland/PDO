<?php

$patient = new Patients();
$patientsList = $patient->getPatients();

$appointment = new appointments();

$formError = [];
$testPatient = [];
$appointmentChecked = null;

$idPatient = &$appointment->idPatients;

if(isset($_POST['createAppointment'])){
    if (isset($_POST['idPatient'])) {
        $idPatient = $_POST['idPatient'];
        //vérifier avec une method ou ?
    }
}