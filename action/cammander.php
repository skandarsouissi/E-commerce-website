<?php
//test user connecte
session_start();
 if(!isset($_SESSION['nom'])){     // variable de session (nom)  not existe  et  d'utilisateur connecte 
     header('location:../connexion.php');
     exit();

 }


 include "../inc/fonctions.php";

 $conn = connect();
// //creation panier
 $visiteur=$_SESSION['id'];


// //var_dump($_POST);
 $id_produit= $_POST['produit'] ;
$quantite= $_POST['quantite'] ;
// //selesction le produit avec leur id

// //requette
 $requette="SELECT prix,nom FROM produit WHERE id='$id_produit' ";
// //exuction
 $resultat=$conn-> query($requette);
 $produit=$resultat->fetch();
 $total=$quantite*$produit['prix'];
$date=date("y-m-d");
if(!isset($_SESSION['panier'])){ //panier n'existe pas
    $_SESSION['panier']=array($visiteur,0,$date,array()); // creation de panier et panier tableau et le commande tab aussi fih quanitet et le produit ..
}
$_SESSION['panier'][1]+=$total;

$_SESSION['panier'][3][]=array($quantite,$total,$date,$date,$id_produit,$produit['nom']);


header('location:../panier.php')
 ?>