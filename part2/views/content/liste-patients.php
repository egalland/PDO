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
<form method="GET" action="liste-patients.php">
    <input type="text" name="search" />
    <input type="submit" value="Rechercher" />
</form>
<table class="table table-striped table-dark mt-4">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de Naissance</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Modifier</th>
            <th>Supprimer</th>
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
                <td><a href="profil/<?= $patient->id; ?>.html">Voir la fiche du patient</a></td>
                <td><a href="?del=<?= $patient->id; ?>">Supprimer</a></td>
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