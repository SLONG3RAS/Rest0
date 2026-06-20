<?php
include_once "bd.pdo.php";
function getLesRestos(){
    try{
        $connexion = connexionPDO();
        $requete = "select * from resto ";
        $prep = $connexion->prepare($requete);      
        $prep->execute();


        $lesResto = $prep->fetchAll(PDO::FETCH_OBJ);
        return $lesResto;
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
}

function getLeRestoByIdR($idR){
    $connexion = connexionPDO();
    $requete = "select * from resto where idR = ?";
    $prep = $connexion->prepare($requete);    
    $prep->bindvalue (1, $idR);
    $prep->execute();

    
    $desResto = $prep->fetchAll(PDO::FETCH_OBJ);
    return $desResto;
}

function getLesRestosByNomR($nomR){
    $connexion = connexionPDO();
    $requete = "select * from resto where nomR LIKE ?";
    $prep = $connexion->prepare($requete);  
    $prep->bindValue(1, "%".$nomR."%");
    $prep->execute();

    $lesResto = $prep->fetchAll(PDO::FETCH_OBJ);
    return $lesResto;



}

function getLesRestosByAdresse($voieAdrR, $cpR, $villeR){
    $connexion = connexionPDO();
    $requete = "select * from resto where voieAdrR LIKE ? AND cpR LIKE ? AND villeR LIKE ?";
    $prep = $connexion->prepare($requete); 
    $prep->bindValue(1, "%".$voieAdrR."%");
    $prep->bindValue(2, "%".$cpR."%");
    $prep->bindValue(3, "%".$villeR."%");
    $prep->execute();

    $lesResto = $prep->fetchAll(PDO::FETCH_OBJ);
    return $lesResto;



}




?>