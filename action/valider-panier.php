<?php
session_start();
include "../inc/fonctions.php";

$conn = connect();
//id visiteur
$visiteur=$_SESSION['id'];
$total=$_SESSION['panier'][1];
$date=('y-m-d');
// //panier
 $requette_panier= "INSERT INTO panier(visiteur,total,date_creation) VALUES('$visiteur','$total','$date')";
// //exuction requette panier
 $resultat= $conn ->query($requette_panier);
 $panier_id=$conn-> lastInsertId();
$commande=$_SESSION['panier'][3];
foreach($commande as $command){
    $quantite=$command[0];
    $total=$command[1];
    $id_produit=$command[4];
// //ajouter commander
$requette="INSERT INTO cammnades(quantite,total,panier,produit,date_creation,date_modification) VALUES('$quantite','$total','$panier_id','$id_produit','$date','$date') ";
// //exuction
 $resultat= $conn ->query($requette);
}
//supp de panier
$_SESSION['panier']=NULL;
header("location:../index.php");


?>