<?php
include_once "bd.pdo.php";

function getLeUtilisateurByMailU($mailU){
    $connexion = connexionPDO();
    $requete = "select * from utilisateur where mailU = ?";
    $prep = $connexion->prepare($requete); 
    $prep->bindValue(1, $mailU);    
    $prep->execute();
    
   
    $resultat = $prep->fetch(PDO::FETCH_OBJ); 
    return $resultat; 
}

function login($mailU, $mdpU) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getLeUtilisateurByMailU($mailU);
    
    if ($util) {
        $mdpBD = $util->mdpU;
        // Vérification du mot de passe
        if (trim($mdpBD) == trim(crypt($mdpU, $mdpBD))) {
            $_SESSION["mailU"] = $mailU;
            $_SESSION["mdpU"] = $mdpBD;
        }
    }
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["mailU"]);
    unset($_SESSION["mdpU"]);
   
}

function getMailULoggedOn(){
    return isLoggedOn() ? $_SESSION["mailU"] : "";
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["mailU"]) && isset($_SESSION["mdpU"])) {
        $util = getLeUtilisateurByMailU($_SESSION["mailU"]);
        if ($util && $util->mailU == $_SESSION["mailU"] && $util->mdpU == $_SESSION["mdpU"]) {
            $ret = true;
        }
    }
    return $ret;
}



