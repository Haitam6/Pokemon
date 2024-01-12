<?php ob_start(); ?>

<h1>Modifier Pokémon</h1>


<form method="post" action="index.php?action=modifyPokemon">
    <label for="pokemon">Pokémon :</label>
    <select id="pokemon" name="pokemon">
        <?php foreach($pokemons as $pokemon): ?>
            <option value="<?= $pokemon->getId() ?>"><?= $pokemon->getNom() ?></option>

        <?php endforeach; ?>
    </select>
    <br>
    <br>
    <label for="taille">Taille :</label>
    <input type="number" id="height" name="height" step="1" min="0">
    <br>
    <br>
    <label for="poids">Poids :</label>
    <input type="number" id="weight" name="weight" step="1" min="0"  >
    <br>
        </p><input type="submit" value="Envoyer" name="modifier"><p>
</form>
<?php
$content = ob_get_clean();
$title_part = "Modification Pokemon";
require("template.php");
?>