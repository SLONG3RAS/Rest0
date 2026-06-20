<?php
include_once "$racine/modele/bd.utilisateur.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=connexion","label"=>"Connexion");
$menuBurger[] = Array("url"=>"./?action=inscription","label"=>"Inscription");

// recuperation des donnees GET, POST, et SESSION
// (On récupère les données si elles existent, sinon on met null ou vide)
$mailU = isset($_POST["mailU"]) ? $_POST["mailU"] : "";
$mdpU = isset($_POST["mdpU"]) ? $_POST["mdpU"] : "";

// traitement si necessaire des donnees recuperees
if (!isset($_POST["mailU"]) || !isset($_POST["mdpU"])){
    // Cas 1 : L'utilisateur arrive sur la page ou n'a pas encore validé le formulaire
    $titre = "Authentification";
}
else
{
    // Appel de la fonction login() définie dans bd.utilisateur.php
    login($mailU, $mdpU);

    if (isLoggedOn()){
        // Cas 2 : L'utilisateur est connecté, on affiche la confirmation
        $titre = "Confirmation";
    }
    else
    {
        // Cas 3 : L'utilisateur n'est pas connecté (erreur d'identifiants)
        $titre = "Authentification";
    }
}

// Appel des vues pour l'affichage
include "$racine/vue/entete.html.php";
include "$racine/vue/vueAuthentification.php";
include "$racine/vue/pied.html.php";
?>