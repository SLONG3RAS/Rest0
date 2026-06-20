<h1>Liste des restaurants</h1>
<?php
foreach($lesResto as $unResto) {
    $lesPhotos = getLaPhotosByIdR($unResto->idR);
    ?>
    
<a href="./?action=detail&idR=<?php echo $unResto->idR; ?>"> 
  
    <div class='card'>
        <div class='photoCard'>
        <?php echo "<img src='photos/$lesPhotos->cheminP' />";
        ?>
        </div>
        <?php echo $unResto->nomR; 
              echo "</br>";
              echo $unResto->numAdrR;
              echo $unResto->voieAdrR;
              echo "</br>";
              echo $unResto->cpR;
              echo $unResto->villeR;

        $lesCuisines = getLesTypesCuisinebyIdR($unResto->idR);

        ?>
        <div class='tagCard'>
            <ul id='tagFood'>
                <?php
                foreach($lesCuisines as $uneCuisine){?>
                <li class='tag'><span class='tag'>#<?php echo $uneCuisine -> libelleTC; ?></span></li>
                <?php }
                ?>    
            </ul>
        </div>
    </div></a>
    <?php
}
?>