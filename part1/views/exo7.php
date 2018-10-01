<?php
require '../models/clients.php';
require '../controllers/clientsCardController.php';
$pageTitle = 'Exo 7';
include 'header.php';
?>
<div class="row">
    <?php foreach ($clientCardList as $client) { ?>
        <div class="col-xs-3 pt-2 m-1">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nom : <?= $client->lastname; ?></li>
                    <li class="list-group-item">Prénom : <?= $client->firstname; ?></li>
                    <li class="list-group-item">Date de naissance : <?= $client->birthDate; ?></li>
                    <li class="list-group-item">Carte de fidélité : <?= ($client->cardTypesId) == 1 ? 'Oui' : 'Non'; ?></li>
                    <?php if (($client->cardTypesId) == 1) { ?><li class="list-group-item">Numéro de carte : <?= $client->cardNumber; ?></li><?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
</div>
<?php include 'footer.php'; ?>