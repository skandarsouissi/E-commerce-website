<?php // la page ajout c'est une autre methde de telfacon chaque action prend ca page kona nejmou nekhedmou kima les action lo5rin
session_start();
//1recupuration des donnes de la formulaire
$nom=$_POST['nom']; // nom eli 7atitou ferl input
$description=$_POST['description'];
$createur=$_SESSION['id'];
$date_creation= date("y-m-d");
//2 la chaine de connexion 
include "../../inc/fonctions.php";
$conn= connect();
//3 la creation dela requette 
$requette ="INSERT INTO categories(nom,description,createur,date_creation)VALUES('$nom','$description','$createur','$date_creation')";
//4 exuction de la requette
$resultat=$conn->query($requette);

if($resultat){
    header ('location:liste.php?ajout=ok');
}



?>