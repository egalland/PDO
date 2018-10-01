<?php
require '../models/showTypes.php';
require '../controllers/showTypesController.php';
$pageTitle = 'Exo 2';
include 'header.php';
?>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th>Type de spectacle</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($typesList as $type) { ?>
            <tr>
                <td><?= $type->type; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>