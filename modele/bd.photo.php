<?php
include_once "bd.pdo.php";
function getLaPhotosByIdR($idR){
        $connexion = connexionPDO();
        $requete = "select * from photo where idR = ? ";
        $prep = $connexion->prepare($requete); 
        $prep->bindValue(1, $idR);    
        $prep->execute();

         $lesPhotos = $prep->fetch(PDO::FETCH_OBJ);
        return $lesPhotos;
}

function getLesPhotosByIdR($idR){
    $connexion = connexionPDO();
    $requete = "select * from photo where idR = ?";
    $prep = $connexion->prepare($requete);
    $prep->bindValue(1, $idR);
    $prep->execute();

    $desPhotos = $prep->fetchAll(PDO::FETCH_OBJ);
    return $desPhotos;
}

?>