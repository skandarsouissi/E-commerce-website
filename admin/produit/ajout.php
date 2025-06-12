<?php
session_start();

// 1. Get and sanitize form data
$nom = htmlspecialchars($_POST['nom']); 
$description = htmlspecialchars($_POST['description']); 
$prix = floatval($_POST['prix']); // Convert to float for price
$categorie = htmlspecialchars($_POST['categorie']);
$quantite = floatval($_POST['quantite']);
$date_creation=date("y-m-d");

// 2. Handle file upload
$target_dir = "../../images/";
$image_name = basename($_FILES["image"]["name"]);
$target_file = $target_dir . $image_name;
$upload_ok = true;

// Check if image file is valid
if($_FILES["image"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $upload_ok = false;
}

// Allow certain file formats
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if(!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $upload_ok = false;
}

// 3. Process upload and database insertion
if ($upload_ok) {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $date = date('Y-m-d'); // Fixed date format (use Y for 4-digit year)
        
        // 4. Database connection
        include "../../inc/fonctions.php";
        $conn = connect();
        
        try {
            // Use prepared statements to prevent SQL injection
            $requette = "INSERT INTO produit(nom, description, prix, categorie, image, date_creation)
                        VALUES(:nom, :description, :prix, :categorie, :image, :date)";
     
            $stmt = $conn->prepare($requette);
            $resultat = $stmt->execute([
                ':nom' => $nom,
                ':description' => $description,
                ':prix' => $prix,
                ':categorie' => $categorie,
                ':image' => $image_name, // Store the filename, not tmp_name
                ':date' => $date
            ]);
          

            if($resultat) {
                
                header('Location: liste.php?ajout=ok');
                exit();
            }
        } catch(PDOException $e) {
            // Delete the uploaded file if database insert fails
            if(file_exists($target_file)) {
                unlink($target_file);
            }
            
            if($e->getCode() == 23000) {
                header('Location: liste.php?erreur=duplicate');
            } else {
                header('Location: liste.php?erreur=systeme');
            }
            exit();
        }
    } else {
        header('Location: liste.php?erreur=upload');
        exit();
    }
} else {
    header('Location: liste.php?erreur=format');
    exit();
}

    $produit_id=$conn->lastInsertId();
    $requette2="INSERT INTO stock(produit, quantite, crateur, date_creation)
                VALUES(' $produit_id', '$quantite','$createur','$date_cration'";

     if($conn->query($requette2)){
        header('Location: liste.php?ajout=ok');
     }else{
        echo "impossible d'ajouter le stock de produit";
     }
?>