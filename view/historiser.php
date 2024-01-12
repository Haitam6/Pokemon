<?php ob_start(); ?>
<h1>Historisation des opérations modifiant la base</h1>

<h2>Modifier</h2>
<table>
    <thead>
        <tr>
            <th>Horodatage</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($xml->operation as $operation): ?>
            <?php if ($operation->type == 'modif_pok'): ?>
                <tr>
                    <td><?= $operation->horodate ?></td>
                    <td><?= $operation->desc ?></td>
                </tr>
            <?php endif ?>
        <?php endforeach ?>
    </tbody>
</table>

<h2>Autres</h2>
<table>
    <thead>
        <tr>
            <th>Horodatage</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($xml->operation as $operation): ?>
            <?php if ($operation->type == 'other'): ?>
                <tr>
                    <td><?= $operation->horodate ?></td>
                    <td><?= $operation->desc ?></td>
                </tr>
            <?php endif ?>
        <?php endforeach ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
$title_part = "TEST";
require("template.php");
?>
