<?php
require("connexpdo.inc.php");
require_once("Pokemon.php");
require_once("Type.php");

function getAllPokemon(){
    $pdo = connexpdo("pokemon");
    $pdostt_pokemonWithTypes = $pdo->query("SELECT pt.pok_id, p.pok_height, p.pok_weight, p.pok_name, t.type_id, t.type_name FROM pokemon_types pt JOIN pokemon p ON p.pok_id=pt.pok_id JOIN types t ON t.type_id=pt.type_id ORDER BY p.pok_name ASC");
    $pokemonWithTypes = [];
    while($pWt = $pdostt_pokemonWithTypes->fetch(PDO::FETCH_ASSOC)){
        if(isset($pokemonWithTypes[$pWt['pok_id']])){
            $pokemonWithTypes[$pWt['pok_id']]->addType(new Type($pWt['type_id'], $pWt['type_name']));
        }else{
            $p = new Pokemon(intval($pWt['pok_id']), $pWt['pok_name'], $pWt['pok_height'], $pWt['pok_weight']);
            $pokemonWithTypes[$pWt['pok_id']] = $p;
            $pokemonWithTypes[$pWt['pok_id']]->addType(new Type($pWt['type_id'], $pWt['type_name']));
        }
    }
    return $pokemonWithTypes;
}




function mettre_a_jour($id, $taille, $poids)
{
    $pdo = connexpdo("pokemon");

    $requete = $pdo->prepare("SELECT * FROM pokemon WHERE pok_id = ?");
    $requete->execute([$id]);
    $pokemon = $requete->fetch();

    $ancienne_taille = $pokemon['pok_height'];
    $ancien_poids = $pokemon['pok_weight'];
    $nom_pokemon = $pokemon['pok_name'];

    $stmt = $pdo->prepare("UPDATE pokemon SET pok_height = :height, pok_weight = :weight WHERE pok_id = :id");
    $stmt->execute(array(":id" => $id, ":height" => $taille, ":weight" => $poids));

    $description = "La taille ($ancienne_taille->$taille) et le poids ($ancien_poids->$poids) de $nom_pokemon [id=$id] modifiés.";
    ajouter_operation_xml('modif_pok', $description);
}

function ajouter_operation_xml($type, $description)
{
    $xml_file = './public/xml/histo.xml';

    $doc = new DOMDocument();
    $doc->preserveWhiteSpace = false;
    $doc->formatOutput = true;
    $doc->load($xml_file);
    $operations = $doc->getElementsByTagName('operations')->item(0);

    $operation = $doc->createElement('operation');

    $typeElem = $doc->createElement('type', $type);
    $operation->appendChild($typeElem);

    $horodateElem = $doc->createElement('horodate', date('Y-m-d H:i:s'));
    $operation->appendChild($horodateElem);

    $descElem = $doc->createElement('desc', $description);
    $operation->appendChild($descElem);

    $operations->appendChild($operation);
    $doc->save($xml_file);
}

   
?>