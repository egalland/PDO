<?php
/* * ****************************IMPORT***************************************** */
//model patients
require '../../models/patients.php';
//regex
require '../../controllers/regex.php';
// Controlleur de la page
require '../../controllers/pagePatientController.php';
// Controlleur du header
include '../../controllers/headerController.php';
// Titre de la page
$pageTitle = 2;
// Header
include '../header.php';
/* * *************************************************************************** */
?>
<?php if($modifyChecked != null){?><p class="alert alert-warning"><?= $modifyChecked; ?></p><?php } ?>
<?php foreach ($onePatient as $patient) { ?>
<form class="py-4" action="<?= $patient->id; ?>.html" method="POST">
    <div class="form-group row">
        <label for="lastname" class="col-4 col-form-label badge-light text-center">Modifier le nom : </label>
        <div class="col-8">
            <input class="form-control" value="<?= $patient->lastname; ?>" placeholder="Nom" id="lastname" name="lastname" maxlength="25" type="text" />
        </div>
    </div>
    <?php if (!empty($formError['lastname'])) { ?>
    <p class="alert alert-danger">/!\
        <?= $formError['lastname']; ?>
    </p>
    <?php } ?>
    <div class="form-group row">
        <label for="firstname" class="col-4 col-form-label badge-light text-center">Modifier le prénom : </label>
        <div class="col-8">
            <input class="form-control" value="<?= $patient->firstname; ?>" placeholder="Prénom" id="firstname" name="firstname" maxlength="25" type="text" />
        </div>
    </div>
    <?php if (!empty($formError['firstname'])) { ?>
    <p class="alert alert-danger">/!\
        <?= $formError['firstname']; ?>
    </p>
    <?php } ?>
    <div class="form-group row">
        <label for="birthDate" class="col-4 col-form-label badge-light text-center">Modifier la date de naissance : </label>
        <div class="col-8">
            <input class="form-control" value="<?= $patient->birthDate; ?>" id="birthDate" name="birthDate" maxlength="25" type="date" />
        </div>
    </div>
    <?php if (!empty($formError['birthDate'])) { ?>
    <p class="alert alert-danger">/!\
        <?= $formError['birthDate'] ?>
    </p>
    <?php } ?>
    <div class="form-group row">
        <label for="phone" class="col-4 col-form-label badge-light text-center">Modifier le téléphone : </label>
        <div class="col-8">
            <input class="form-control" value="<?= $patient->phone; ?>" placeholder="0000000000" id="phoneNumber" name="phoneNumber" maxlength="25" type="text" />
        </div>
    </div>
    <?php if (!empty($formError['phoneNumber'])) { ?>
    <p class="alert alert-danger">/!\
        <?= $formError['phoneNumber']; ?>
    </p>
    <?php } ?>
    <div class="form-group row">    
        <label for="mail" class="col-4 col-form-label badge-light text-center">Modifier l'email : </label>
        <div class="col-8">
            <input class="form-control" value="<?= $patient->mail; ?>" placeholder="email@email.com" id="mail" name="mail" maxlength="100" type="mail" />
        </div>
    </div>
    <?php if (!empty($formError['mail'])) { ?>
    <p class="alert alert-danger">/!\
        <?= $formError['mail']; ?>
    </p>
    <?php } ?>
    <div class="row pt-2">
        <input type="submit" name="modifyPatient" class="col btn btn-dark" id="modifyPatient" value="Modifier le patient" disabled="disabled" />
    </div>
</form>
<?php } ?>
<a href="../liste-patients.php" class="col-md-2 btn btn-dark">Retour à la liste</a>
<script src="../../../assets/js/modifyPatient.js"></script>
<?php
/* * ****************************IMPORT***************************************** */
// footer
include '../footer.php';
/* * *************************************************************************** */
?>