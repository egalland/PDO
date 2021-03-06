<?php
/* * ****************************IMPORT***************************************** */
//model patients
require '../../models/patients.php';
//model appointments
require '../../models/appointments.php';
//regex
require '../../controllers/regex.php';
// Controlleur de la page
require '../../controllers/rendezvousController.php';
// Controlleur du header
include '../../controllers/headerController.php';
// Titre de la page
$pageTitle = 3;
// Header
include '../header.php';
/* * *************************************************************************** */
?>
<?php if (!empty($formError['dateHourAppointment'])) { ?><p class="alert alert-danger">/!\<?= $formError['dateHourAppointment']; ?></p><?php } ?>
<form class="py-4" action="<?= $appointment->id; ?>.html" method="POST">
<p><?= implode(' ', $formError); ?></p>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="dateAppointment" class="col-md-12 col-form-label badge-light text-center mt-4">La date du rendez vous :</label>
                <input class="form-control col m-2" id="dateAppointment" name="dateAppointment" type="date" value="<?= $oneAppointment->date; ?>" />
                <input class="form-control col m-2" id="hourAppointment" name="hourAppointment" type="time" value="<?= $oneAppointment->hour; ?>" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="patientName" class="col-md-12 col-form-label badge-light text-center mt-4">Sélectionner un patient :</label>
                <select name="idPatients" id="idPatients" class="form-control col m-2">
                    <option value="0" selected disabled>Choix du patient</option>
                    <?php foreach ($patientsList as $patient) { ?>
                    <option value="<?= $patient->id ?>" <?= $patient->id == $oneAppointment->idPatients? 'selected': '' ?>> <?= $patient->lastname . ' ' . $patient->firstname . ' ' . $patient->birthDate . ' ' . $patient->phone . ' ' . $patient->mail; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row pt-2">
        <input type="submit" name="modifyAppointment" class="col btn btn-dark" id="modifyAppointment" value="Modifier le rendez-vous" />
    </div>
</form>
<script src="../../../assets/js/modifyPatient.js"></script>
<?php
/* * ****************************IMPORT***************************************** */
// footer
include '../footer.php';
/* * *************************************************************************** */
?>