<?php
/* * ****************************IMPORT***************************************** */
//model patients
require '../../models/patients.php';
//regex
require '../../controllers/regex.php';
// Controlleur de la page
require '../../controllers/liste-patientsController.php';
// Controlleur du header
include '../../controllers/headerController.php';
// Titre de la page
$pageTitle = 2;
// Header
include '../header.php';
/* * *************************************************************************** */
?>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de Naissance</th>
            <th>Téléphone</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($patientsList as $patient) { ?>
            <tr>
                <td><?= $patient->lastname; ?></td>
                <td><?= $patient->firstname; ?></td>
                <td><?= $patient->birthDate; ?></td>
                <td><?= $patient->phone; ?></td>
                <td><?= $patient->mail; ?></td>
                <td><a href="<?= $patient->id; ?>.html">Voir la fiche du patient</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php
/* * ****************************IMPORT***************************************** */
// footer
include '../footer.php';
/* * *************************************************************************** */
?>