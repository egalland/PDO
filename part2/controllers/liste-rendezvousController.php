<?php

$appointment = new Appointments();

if(isset($_GET['del'])){
    $appointment->id = $_GET['del'];
    $appointment->deleteAppointment();
}
$appointmentsList = $appointment->getAppointments();
