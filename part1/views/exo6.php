<?php
require '../models/shows.php';
require '../controllers/showsController.php';
$pageTitle = 'Exo 6';
include 'header.php';
?>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th>Spectacle</th>
            <th>Artiste</th>
            <th>Date</th>
            <th>Heure</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($showList as $show) { ?>
            <tr>
                <td><?= $show->title; ?></td>
                <td><?= $show->performer; ?></td>
                <td><?= $show->date; ?></td>
                <td><?= $show->startTime; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>