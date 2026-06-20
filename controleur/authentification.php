<?php
include_once "$racine/modele/bd.utilisateur.php";

// test de connexion
if (isLoggedOn()) {
    echo "logged<br/>";
} else {
    echo "not logged<br/>";
}
 
login("test@bts.sio", "sio");
 
if (isLoggedOn()) {
    echo "logged<br/>";
} else {
    echo "not logged<br/>";
}
 
$mail=getMailULoggedOn();
echo "utilisateur connecté avec cette adresse : $mail <br/>";
 
// deconnexion
logout();

?>