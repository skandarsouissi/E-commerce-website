<?php
$idvisiteur=$_GET['id'];
include "../../inc/fonctions.php";
$conn = connect();
$requette="UPDATE visiteur SET etat =1 WHERE id='$idvisiteur'";
$resultat=$conn->query($requette);
if($resultat){
    header ('location:liste.php?valider=ok');

       
    
    
    
    
    } else {
        echo"erreur de validation y sahbi "; 
    }


?>