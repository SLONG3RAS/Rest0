<?php
include "getRacine.php";
include_once "$racine/modele/bd.utilisateur.php";
include "$racine/controleur/controleurPrincipal.php";

if (isset($_GET["action"])){
    $action = $_GET["action"];
}else{
    $action = "defaut";
}
$fichier = controleurPrincipal($action);
include "$racine/controleur/$fichier";
?>
     