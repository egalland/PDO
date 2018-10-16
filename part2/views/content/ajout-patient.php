<?php
/* * ****************************IMPORT***************************************** */
//model patients
require '../../models/patients.php';
//regex
require '../../controllers/regex.php';
// Controlleur de la page
require '../../controllers/ajout-patientController.php';
// Controlleur du header
include '../../controllers/headerController.php';
// Titre de la page
$pageTitle = 1;
// Header
include '../header.php';
/* * *************************************************************************** */
?>
<?php if ($addPatient == true) { ?><p>Le patient a bien été créé</p><?php } ?>
<?php if (($addPatient == false) && !empty($_POST['submitPatient']) && sizeof($formError) == 0) { ?><p class="alert alert-danger bg-danger">Il a eu un problème, veuillez réessayer plus tard</p><?php } ?>
<form class="pt-4" action="ajout-patient.php" method="POST">
    <?php foreach ($form as $formNumber) { ?>
        <div class="form-group row">
            <label for="<?= $formNumber['attr']; ?>" class="col-4 col-form-label badge-light text-center"><?= $formNumber['text']; ?></label>
            <div class="col-8">
                <input class="form-control" type="<?= $formNumber['type']; ?>" placeholder="<?= $formNumber['text']; ?>" id="<?= $formNumber['attr']; ?>" name="<?= $formNumber['attr']; ?>" maxlength="<?= $formNumber['maxLength']; ?>" value="<?= $formNumber['value']; ?>" />
            </div>
        </div>
        <?php if (!empty($formNumber['error'])) { ?><p class="alert alert-danger">/!\ <?= $formNumber['error'] ?></p><?php } ?>
    <?php } ?>
    <div class="row pt-2">
        <input type="submit" name="submitPatient" class="col btn btn-dark" id="submitPatient" value="Envoyer" disabled="disabled" />
    </div>
</form>
<script src="../../assets/js/form.js"></script>
<?php
/* * ****************************IMPORT***************************************** */
// footer
include '../footer.php';
/* * *************************************************************************** */
?>