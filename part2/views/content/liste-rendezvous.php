<?php
/* * ****************************IMPORT***************************************** */
//model patients
require '../../models/patients.php';
//model appointments
require '../../models/appointments.php';
//regex
require '../../controllers/regex.php';
// Controlleur de la page
require '../../controllers/liste-rendezvousController.php';
// Controlleur du header
include '../../controllers/headerController.php';
// Titre de la page
$pageTitle = 4;
// Header
include '../header.php';
/* * *************************************************************************** */
?>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th>Date du rendez-vous</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($appointmentsList as $appointment) { ?>
            <tr>
                <td><?= $appointment->dateHour; ?></td>
                <td><?= $appointment->lastname; ?></td>
                <td><?= $appointment->firstname; ?></td>
                <td><?= $appointment->birthDate; ?></td>
                <td><?= $appointment->phone; ?></td>
                <td><?= $appointment->mail; ?></td>
                <td><a href="rdv/<?= $appointment->id; ?>.html">Modifier</td>
                <td><a href="?del=<?= $appointment->id; ?>">Supprimer</a></td>
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