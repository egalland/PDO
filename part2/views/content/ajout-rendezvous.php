<?php
/* * ****************************IMPORT***************************************** */
//model patients
require '../../models/appointments.php';
//regex
require '../../controllers/regex.php';
// Controlleur de la page
require '../../controllers/ajout-rendezvousController.php';
// Controlleur du header
include '../../controllers/headerController.php';
// Titre de la page
$pageTitle = 1;
// Header
include '../header.php';
/* * *************************************************************************** */
?>
<form class="py-4" action="ajout-rendezvous.php" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="dateAppointment" class="col-md-12 col-form-label badge-light text-center mt-4">La date du rendez vous :</label>
                <input class="form-control col m-2" id="dateAppointment" name="dateAppointment" type="date" />
                <input class="form-control col m-2" id="hourAppointment" name="hourAppointment" type="time" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="dateAppointment" class="col-md-12 col-form-label badge-light text-center mt-4">La date du rendez vous :</label>
                <select name="patientName" id="patientName" class="form-control col m-2">
                <option value="<?= '$patient->id'; ?>"><?= '$patient->lastname' . ' - ' . '$patient->firstname'; ?></option>
                </select>
            </div>
        </div>
    </div>
    <?php if (!empty($formError['dateHourAppointment'])) { ?><p class="alert alert-danger">/!\<?= $formError['dateHourAppointment']; ?></p><?php } ?>
    <div class="row pt-2">
        <input type="submit" name="createAppointment" class="col btn btn-dark" id="createAppointment" value="Créer le rendez-vous"
            disabled="disabled" />
    </div>
</form>
<script src="../../assets/js/modifyPatient.js"></script>
<?php
/* * ****************************IMPORT***************************************** */
// footer
include '../footer.php';
/* * *************************************************************************** */
?>