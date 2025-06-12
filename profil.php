<?php
session_start();
if(!isset($_SESSION['nom'])){// variable de session (nom) n'existe pas et pas d'utilisateur connecte 
    header('location:connexion.php');

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    include "inc/header.php";
     

    ?>
    <div class= container>
    <h1>welcome <span class="text-primary"><?php echo $_SESSION['nom']."".  $_SESSION['prenom'] ;    ?></span></h1>
    

</div>


<?php 
      include "inc/footer.php"; //footer recuperation
      ?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>