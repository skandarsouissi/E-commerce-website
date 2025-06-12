<?php

//echo " id de categorie".$_GET['idcategorie'];
$idcategorie=$_GET['idcategorie'];
include "../../inc/fonctions.php";
$conn =connect();
$requette ="DELETE FROM categories WHERE id='$idcategorie'";
$resultat = $conn-> query($requette);
if($resultat){
    //echo"categorie supprimer";
    header('location:liste.php?delete=ok');
}
?>