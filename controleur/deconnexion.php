<?php

include_once "$racine/modele/bd.utilisateur.php";

logout();

$titre = "Authentification";

include "$racine/vue/entete.html.php";
include "$racine/vue/vueAuthentification.php";
include "$racine/vue/pied.html.php";
?>



