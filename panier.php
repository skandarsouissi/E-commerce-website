<?php
session_start();
include "inc/fonctions.php";
$total=0;
if (isset($_SESSION['panier'])){
  $total=$_SESSION['panier'][1];


}

$categories=getALLCategories();
if (!empty($_POST)) { //button search clicked
//echo"search cliked";
//echo $_POST['search'];
$produit= searchProduit ($_POST['search']); //les produit a chercher sera afficher (liste des produit came from search) et 
//comme parametere continu of our input
} else{
  $produit=getALLProducts(); //aficher tt les produit si je n'est pas fait la recherche

}
$cammande=array();
if(isset($_SESSION['panier'])){
    if(count ($_SESSION['panier'][3])>0){
        $cammande=$_SESSION['panier'][3];
    }
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E_shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


</head>


<body>

   <?php
   include "inc/header.php";
   ?>
      <div class="row col-12 mt-4 p-5">

<h1>panier utilisateur<h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">produit</th>
      <th scope="col">quanite</th>
      <th scope="col">total</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>

  

  </tbody>
  <?php
foreach ($cammande as $index => $cc){
    print'    <tr>
      <th scope="row">'.($index+1).'</th>
      <td>'.$cc[5].'</td>
      <td>'.$cc[0].'</td>
        <td>'.$cc[1].'</td>
          <td><a href="action/enlever.produit.panier.php?id='.$index.'" classe="btn btn-danger">supprimer</a></td>
     
    </tr>';
}




?>
</table>
<div class="text-end mt-3">
  <h3> Total:<?php echo $total;  ?></h3>
</hr>
  <a href="action/valider-panier.php" class="btn btn-success">valider</a>


</div>



 
  

      </div>
      <?php 
      include "inc/footer.php"; //footer recuperation
      ?>
      


    
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>