<?php

//echo " id de categorie".$_GET['idcategorie'];
$idproduit=$_GET['idproduit'];
include "../../inc/fonctions.php";
$conn =connect();
$requette ="DELETE FROM produit WHERE id='$idproduit'";
$resultat = $conn-> query($requette);
if($resultat){
    //echo"categorie supprimer";
    header('location:liste.php?delete=ok');
}
?>