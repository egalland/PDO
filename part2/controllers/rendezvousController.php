<?php

$formError = [];
$testAppointment = [];
$modifyChecked = null;

$appointment = new Appointments();
if(isset($_GET['id'])){
    $appointment->id = $_GET['id'];
}

$patient = new Patients();
$patientsList = $patient->getPatients();

$dateHour = &$appointment->dateHour;


if(isset($_POST['modifyAppointment'])){

    if (isset($_POST['dateAppointment'])) {
        $dateTest = htmlspecialchars($_POST['dateAppointment']);
        if (preg_match($regexDate, $dateTest)) {
            $date = $dateTest;
        }else{
            $formError['dateAppointment'] = 'Ce n\'est pas une date valide';
        }
    }else{
        $formError['dateAppointment'] = 'Veuillez inscrire une date';
    }

    if (isset($_POST['hourAppointment'])) {
        $hourTest = htmlspecialchars($_POST['hourAppointment']);
        if (preg_match($regexHour, $hourTest)) {
            $hour = $hourTest;
        }else{
            $formError['hourAppointment'] = 'Ce n\'est pas une heure valide';
        }
    }else{
        $formError['hourAppointment'] = 'Veuillez inscrire une heure';
    }

    if(($date != null) && ($hour != null)){
        $dateHourTest = $date . ' ' . $hour . ':00';
        if($dateHourTest > date('Y-m-d H:i:s')){
            $dateHour = $dateHourTest;
        }else{
            $formError['datetime'] = 'La date du rendez-vous ne peut pas être inférieure à la date actuelle';
        }
    }

    if(count($formError) == 0){
        $checkIfAppointmentExists = $appointment->checkIfAppointmentExists();
        if($checkIfAppointmentExists->count == 0){
            $checkIfAppointmentIsAvailable = $appointment->checkIfAppointmentIsAvailable();
            if($checkIfAppointmentIsAvailable->count == 0){
                $modifyAppointment = $appointment->modifyAppointment();
            }
        }
    }
}
$oneAppointment = $appointment->getOneAppointment();
