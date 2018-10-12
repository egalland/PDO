<?php

$formError = [];
$modifyChecked = null;

$patient = new Patients();
$appointment = new Appointments();

if(isset($_GET['id'])){
    $patient->id = $_GET['id'];
    $appointment->id = $_GET['id'];
}

$lastname = &$patient->lastname;
$firstname = &$patient->firstname;
$birthDate = &$patient->birthDate;
$phoneNumber = &$patient->phone;
$mail = &$patient->mail;


if (isset($_POST['modifyPatient'])) {
    if (isset($_POST['lastname'])) {
        $lastname = htmlspecialchars($_POST['lastname']);
        $form[0]['value'] = $lastname;
        $lastname = ucwords(strtolower($lastname));
        if (!preg_match($regexName, $lastname)) {
            $formError['lastname'] = 'Saisie invalide.';
        }
        if (strlen($lastname) > 25) {
            $formError['lastname'] = 'La saisie ne doit pas dépasser 25 caratères';
        }
        if (empty($lastname)) {
            $formError['lastname'] = 'Champ obligatoire.';
        }
    }

    if (isset($_POST['firstname'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
        $form[1]['value'] = $firstname;
        $firstname = ucwords(strtolower($firstname));
        if (!preg_match($regexName, $firstname)) {
            $formError['firstname'] = 'Saisie invalide.';
        }
        if (strlen($firstname) > 25) {
            $formError['firstname'] = 'La saisie ne doit pas dépasser 25 caratères';
        }
        if (empty($firstname)) {
            $formError['firstname'] = 'Champ obligatoire.';
        }
    }

    if (isset($_POST['birthDate'])) {
        $birthDate = htmlspecialchars($_POST['birthDate']);
        $form[2]['value'] = $birthDate;
        if (!preg_match($regexDate, $birthDate)) {
            $formError['birthDate'] = 'Saisie invalide.';
        }
        if (strlen($birthDate) != 10) {
            $formError['birthDate'] = 'La saisie ne doit pas dépasser 10 caratères';
        }
        if ($birthDate > date('Y-m-d')) {
            $formError['birthDate'] = 'La date de naissance ne peut pas être supérieur à la date actuelle';
        }
        if (empty($birthDate)) {
            $formError['birthDate'] = 'Champ obligatoire.';
        }
    }

    if (isset($_POST['phoneNumber'])) {
        $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        $form[3]['value'] = $phoneNumber;
        $phoneNumber = preg_replace("/[^0-9]/", "", $phoneNumber);
        if (!preg_match($regexPhoneNumber, $phoneNumber)) {
            $formError['phoneNumber'] = 'Saisie invalide.';
        }
        if (strlen($phoneNumber) > 25) {
            $formError['phoneNumber'] = 'La saisie ne doit pas dépasser 25 caratères';
        }
        if (strlen($phoneNumber) < 8) {
            $formError['phoneNumber'] = 'La saisie doit dépasser 8 caratères';
        }
        if (empty($phoneNumber)) {
            $formError['phoneNumber'] = 'Champ obligatoire.';
        }
    }

    if (isset($_POST['mail'])) {
        $mail = htmlspecialchars($_POST['mail']);
        $form[4]['value'] = $mail;
        $mail = strtolower($mail);
        if (!FILTER_VAR($mail, FILTER_VALIDATE_EMAIL)) {
            $formError['mail'] = 'Saisie invalide.';
        }
        if (strlen($mail) > 100) {
            $formError['mail'] = 'La saisie ne doit pas dépasser 100 caratères';
        }
        if (empty($mail)) {
            $formError['mail'] = 'Champ obligatoire.';
        }
    }
    if (sizeof($formError) == 0) {
        $checkIfPatientExist = $patient->checkIfPatientExist();
        if ($checkIfPatientExist->count == 0) {
            $addPatient = $patient->modifyPatient();
            $modifyChecked = 'Le patient a bien été modifié';
        }else{
            $modifyChecked = 'Le patient existe déjà';
        }
    }
}
$onePatient = $patient->getOnePatient();
$appointmentsList = $appointment->getAppointmentsForPatient();
