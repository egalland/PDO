<?php

$patient = new Patients();
if(isset($_GET['del'])){
    $patient->id = $_GET['del'];
    $patient->deletePatientWithAppointments();
}
if(isset($_GET['search'])){
    $patient->search = $_GET['search'];
    $patientsList = $patient->searchPatient();
} else {
    $patientsList = $patient->getPatients();
}