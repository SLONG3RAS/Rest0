<?php
include_once "bd.pdo.php";

function getAimerById($mailU, $idR) {
    try {
        $connexion = connexionPDO();
        $requete = "SELECT * FROM aimer WHERE mailU = ? AND idR = ?";
        $prep = $connexion->prepare($requete);
        $prep->bindValue(1, $mailU);
        $prep->bindValue(2, $idR);
        $prep->execute();

        $resultat = $prep->fetch(PDO::FETCH_OBJ);
        return $resultat; 
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

?>