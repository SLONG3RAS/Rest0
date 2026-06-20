<?php
include_once "$racine/modele/bd.resto.php";
include_once "$racine/modele/bd.typeCuisine.php";
include_once "$racine/modele/bd.photo.php";
 
// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=recherche&critere=nom","label"=>"Recherche par nom");
$menuBurger[] = Array("url"=>"./?action=recherche&critere=adresse","label"=>"Recherche par adresse");
$menuBurger[] = Array("url"=>"./?action=recherche&critere=type","label"=>"Recherche par type de cuisine");
 
$nomR = $_POST['nomR'] ?? '';
$villeR = $_POST['ville'] ?? '';
$cpR = $_POST['cpR'] ?? '';
$voieAdrR = $_POST['voieAdrR'] ?? '';
$tabIdTC = $_POST['tabIdTC'] ?? array();
$critere = $_GET["critere"] ?? "nom";
 
// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
     // on appelle les fonctions utiles en fonction du type de recherche
     $lesResto = array();
     
     switch($critere){
          case 'nom':
          if (!empty($nomR)) { 
            $lesResto = getLesRestosByNomR($nomR);
        }
        break;
          case 'adresse':
          $lesResto = getLesRestosByAdresse($voieAdrR, $cpR, $villeR);
          break;
          case 'type':
           if (!empty($tabIdTC)) {
                $lesResto = getLesRestosByTC($tabIdTC);
            }
           break;
      }
 
// traitement si necessaire des donnees recuperees
$lesCuisines = getTypesCuisine();
 
// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Recherche d'un restaurant";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueRechercheResto.php";
if (!empty($_POST)) {
    // affichage des résultats de la recherche
    include "$racine/vue/vueListeRestos.php";
}
include "$racine/vue/pied.html.php";
?>