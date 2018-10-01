<?php
require '../models/clients.php';
require '../controllers/clientsLimitController.php';
$pageTitle = 'Exo 3';
include 'header.php';
?>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientList as $client) { ?>
            <tr>
                <td><?= $client->firstname; ?></td>
                <td><?= $client->lastname; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>