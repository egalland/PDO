<?php
require '../models/clients.php';
require '../controllers/clientsStartWithM.php';
$pageTitle = 'Exo 5';
include 'header.php';
?>
<?php foreach ($clientList as $client) { ?>
    <p>Prénom : <?= $client->firstname; ?></p>
    <p>Nom : <?= $client->lastname; ?></p>
<?php } ?>
<?php include 'footer.php'; ?>