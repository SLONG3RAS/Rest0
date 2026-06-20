<?php
include_once "bd.pdo.php";
    function getCritiquerByIdR($idR){
        $connexion = connexionPDO();
        $requete = "select * from critiquer where idR = ? ";
        $prep = $connexion->prepare($requete); 
        $prep->bindValue(1, $idR);    
        $prep->execute();

         $lesCritiques = $prep->fetchAll(PDO::FETCH_OBJ);
        return $lesCritiques;

    }

?>