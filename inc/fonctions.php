<?php
function connect(){
        // 1connexion vers la base de donnes
$servername = "localhost";
$DBuser = "root";
$DBpassword = "";
$DBname = "ecommece";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
return $conn;

}
function getALLCategories(){
$conn = connect();
//2creation de la requette
$requette ="SELECT * FROM categories";

//3 exuction de la requette
$resultat = $conn->query($requette);// queryr is the fonction how did the exuction and we met the result in varibale resultat
//4resultat de la requette

$categories=$resultat-> fetchAll();// i call the data from resultat and make the fitch to make like we say a table
//var_dump($categories);
return $categories;
}
function getALLProducts(){
        // 1connexion vers la base de donnes
        $conn = connect();

//2creation de la requette
$requette ="SELECT * FROM produit";

//3 exuction de la requette
$resultat =$conn->query($requette);// queryr is the fonction how did the exuction and we met the result in varibale resultat
//4resultat de la requette

$produit=$resultat-> fetchAll();// i call the data from resultat and make the fitch to make like we say a table
//var_dump($categories);
return $produit;

}
function searchProduit($keyword){
            // 1connexion vers la base de donnes
            $conn = connect();
//2creation de la requette
$requette ="SELECT * FROM produit WHERE nom LIKE'%$keyword%'";
//3exuction de la requette
$resultat =$conn->query($requette);
//4resultat
$produit=$resultat-> fetchAll();

return $produit; 

}
function getProduitById($id){
    $conn =connect();
    //1 creation de la requette
    $requette= "SELECT* FROM produit WHERE id=$id";
    //3exuction de la requette
$resultat =$conn->query($requette);
//4resultat
$produi=$resultat-> fetch();// fetch etr produit car j'ai un seul produit dans cette recupuration

return $produi; 
}
 function   AddVisiteur($data){
    $conn =connect();
    $mphach=md5( $data["mp"]);//hachage de mp dans BD
    $requette = "INSERT INTO visiteur(nom, prenom, email, mp, telephone) VALUES('" . $data["nom"] . "', '" . $data["prenom"] . "', '" . $data["email"] . "', '" . $mphach. "', '" . $data["telephone"] . "')";
    $resultat =$conn->query($requette);
    if ($resultat){
        return true;
    }else return false ;
}
function ConnectVisiteur($data){
    $conn= connect();
    $requette = "SELECT * FROM visiteur WHERE email='".$data['email']."' AND mp='".md5($data['mp'])."'"; //si il ya une retour de donnes don mp et adresse correct si nn 

    $resultat =$conn->query($requette);
    $user = $resultat->fetch();
    return $user;
}
function ConnectAdmin($data){
    $conn= connect();
    $requette = "SELECT * FROM administrateur WHERE email='".$data['email']."' AND mp='".md5($data['mp'])."'"; //si il ya une retour de donnes don mp et adresse correct si nn 

    $resultat =$conn->query($requette);
    $user = $resultat->fetch();
    return $user;

}
function getAllUsers(){
    $conn= connect();
    $requette = "SELECT * FROM visiteur WHERE etat=0"; //si il ya une retour de donnes don mp et adresse correct si nn 

    $resultat =$conn->query($requette);
$user=$resultat -> fetchall();
return $user;
}
function getAllCommandes() {
    $conn = connect();
    $requette = "SELECT v.nom, v.prenom, v.telephone, p.total, p.date_creation 
                 FROM panier p, visiteur v 
                 WHERE p.visiteur = v.id";  
    $resultat = $conn->query($requette);
    $commandes = $resultat->fetchAll();
    return $commandes;
}
?>