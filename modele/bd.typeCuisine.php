<?php
include_once "bd.pdo.php";

function getLesTypesCuisinebyIdR($idR){
    $connexion = connexionPDO();
    $requete = "select libelleTC from typecuisine inner join proposer on typecuisine.idTC = proposer.idTC where idR = ? ";
    $prep = $connexion->prepare($requete); 
    $prep->bindValue(1, $idR);    
    $prep->execute();
    return $prep->fetchAll(PDO::FETCH_OBJ);
}

function getLesRestosByTC($tabIdTC){
    if (is_array($tabIdTC) && count($tabIdTC) > 0) { 
        $filtre = "(";
        foreach($tabIdTC as $idTC){
            $filtre .= "$idTC,";
        }
        $filtre .= "null)";
 
        try{
            $connex = connexionPDO();
            $prep = $connex->prepare("select distinct resto.* from resto inner join proposer on resto.idR=proposer.idR where idTC IN $filtre");
            $prep->execute();
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }else{
        return false;
    }
} 


function getTypesCuisine() {
    $connexion = connexionPDO();
    $requete = "select * from typecuisine"; 
    $prep = $connexion->prepare($requete); 
    $prep->execute();
    return $prep->fetchAll(PDO::FETCH_OBJ);
}
?>