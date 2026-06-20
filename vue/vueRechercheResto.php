<h1>Recherche d'un restaurant</h1>
<form action="./?action=recherche&critere=<?= $critere ?>" method="POST">
<?php
   switch ($critere){
      case "nom":
        echo "Recherche par nom :";?>
        <input type="text" name="nomR" placeholder="Nom " />
         <?php
         break;
    
      case "adresse":
        echo "Recherche par adresse :";?>
        <input type="text" name="villeR" placeholder="ville " /></br>
        <input type="text" name="cpR" placeholder="code postal " /></br>
        <input type="text" name="voieAdrR" placeholder="rue " />
         <?php
         break;

    
      case "type":
         echo "Recherche par type de cuisine :";
         echo "Sélectionner un ou plusieurs types de cuisine :<br />";
    
         foreach ($lesCuisines as $uneCuisine) {
         ?>
            <input type="checkbox" name="tabIdTC[]" value="<?php echo $uneCuisine->idTC; ?>">
            <?php echo $uneCuisine->libelleTC; ?><br />
         <?php
         }
         break;
   }
?>
   <input type="submit" value="Rechercher" />
</form>