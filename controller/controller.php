<?php
require("model/model.php");

function home(){
    require("view/home.php");
}

function test(){
    try {
        $test = getAllPokemon();
        require("view/test.php");
    }catch(Exception $e){
        $errorMsg = "Une exception a été levée<br>".$e->getMessage();
        require("view/error.php");
    }catch(Error $e){
        $errorMsg = "Une erreur a été levée<br>".$e->getMessage();
        require("view/error.php");
    }
}

function modifiy(){
    if(isset($_POST['modifier'])) {
        $pokemon_id = intval($_POST['pokemon']);
        $taille = intval($_POST['height']);
        $poids = intval($_POST['weight']);
        try{
            mettre_a_jour($pokemon_id, $taille, $poids);
        } catch (Exception $e) {
            $error_message = $e->getMessage();
        }
    }
    $pokemons = getAllPokemon();

    require("view/modifier.php");
}

function  historique()
{
    try {
        $xml = simplexml_load_file('./public/xml/histo.xml');
        require("view/historiser.php");
    }catch(Exception $e){
        $errorMsg = "Une exception a été levée<br>".$e->getMessage();
        require("view/error.php");
    }catch(Error $e){
        $errorMsg = "Une erreur a été levée<br>".$e->getMessage();
        require("view/error.php");
    }
}

?>