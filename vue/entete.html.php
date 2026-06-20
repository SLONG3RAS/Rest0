<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $titre ?></title>
        <style type="text/css">
            @import url("css/base.css");
            @import url("css/form.css");
            @import url("css/corps.css");
            /* @import url("css/menu.css"); */
        </style>
    </head>
    <body>
        <nav>
        <ul id="menuGeneral">
            <li><a href="./?action=accueil">Accueil</a></li> 
            <li><a href="./?action=Liste">Liste</a></li> 
            <li><a href="./?action=recherche"><img src="images/rechercher.png" alt="loupe" />Recherche</a></li>
            <li id="logo"><a href="./?action=accueil"><img src="images/logoBarre.png" alt="logo" /></a></li>
            
            <?php if (isLoggedOn()) { ?>
                <li><a href="./?action=deconnexion"><img src="images/profil.png" alt="profil" />Déconnexion</a></li>
            <?php } else { ?>
                <li><a href="./?action=connexion"><img src="images/profil.png" alt="profil" />Connexion</a></li>
            <?php } ?>
        </ul>
</nav>
    <div id="bouton">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <ul id="menuContextuel">
        <li><img src="images/logoBarre.png" alt="logo" /></li>
        <?php if (isset($menuBurger)) { ?>
            <?php for ($i = 0; $i < count($menuBurger); $i++) { ?>
                <li>
                    <a href="<?php echo $menuBurger[$i]['url']; ?>">
                        <?php echo $menuBurger[$i]['label']; ?>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
    <div id="corps">