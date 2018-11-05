<?php

$limit = 2;

$patient = new Patients();

$patient->page = 0;
$patient->limit = $limit;

if(isset($_GET['del'])){
    $patient->id = $_GET['del'];
    $patient->deletePatientWithAppointments();
}

if(isset($_GET['search'])){
    $patient->search = $_GET['search'];
    $patientsList = $patient->searchPatient();
} else {
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        $patient->page = ($page - 1) * $limit;
    }
    $patientsList = $patient->getPatients();
}