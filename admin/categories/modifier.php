<?php // la page ajout c'est une autre methde de telfacon chaque action prend ca page kona nejmou nekhedmou kima les action lo5rin
session_start();
//1recupuration des donnes de la formulaire
$id=$_POST['idcategorie'];
$nom=$_POST['nom']; // nom eli 7atitou ferl input
$description=$_POST['description'];
// na7ina el createur 5atr eli 3mal el post houwa eli ybadal
$date_modification= date("y-m-d");
//2 la chaine de connexion 
include "../../inc/fonctions.php";
$conn= connect();
//3 la creation dela requette 
$requette ="UPDATE  categories SET nom='$nom',description='$description',date_modification='$date_modification'WHERE id='$id'";
//4 exuction de la requette
$resultat=$conn->query($requette);

if($resultat){
    header ('location:liste.php?modif=ok');
}



?>