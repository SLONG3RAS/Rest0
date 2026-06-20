<h1></h1>

<span id="note">
    <?php
    for ($i = 1; $i <= 5; $i++) {
        echo "<img class='note' src='images/like.png' alt=''>";
    }
    ?>
</span>
<?php


?>

<section>
    <h3>Type de cuisine</h3>
    <ul id="tagFood">	
        <?php	
        foreach($lesCuisines as $uneCuisine){?>
        <li class="tag"><span class="tag">#<?php echo $uneCuisine -> libelleTC; ?></span></li>
        <?php }
        ?>
    </ul>
</section>
<section>
    
    <?php
    foreach($desResto as $leResto) {
    $lesPhotos = getLaPhotosByIdR($leResto->idR);
    }
    echo "<img src='photos/$lesPhotos->cheminP' />";    

    foreach ($desResto as $laDesrc){
    echo $laDesrc-> descR;

    }
   ?>
</section>

<h2 id="adresse">
    Adresse
</h2>
<p>
    <?php
    foreach ($desResto as $uneAdresse){
        echo $uneAdresse->numAdrR; 
        echo " ";
        echo $uneAdresse->voieAdrR;
    ?>
      </br>
    <?php
        echo $uneAdresse->cpR;
        echo " ";
        echo $uneAdresse->villeR;

    }
    ?>
</p>

<h2 id="photos">
    Photos
    
</h2>

<ul id="galerie">

   <?php
   foreach ($desPhotos as $unePhoto) {      
    ?>

    <li> <img class="galerie" src="photos/<?php echo $unePhoto->cheminP; ?>" ?></li>  

<?php
    }
?>
</ul>
<h2 id="horaires">
    Horaires
</h2> 
<p>
    <?php
      foreach ($desResto as $unHoraire){
        echo $unHoraire->horairesR;

}
?>
</p>

<h2 id="crit">Critiques</h2>
<ul id="critiques">
    <?php
    foreach ($lesCritiques as $uneCritique){  

        echo $uneCritique->mailU;
        echo "</br>";
        echo $uneCritique->note;
        echo "</br>";
        echo $uneCritique->commentaire;


    }
   


    ?>
</ul>



