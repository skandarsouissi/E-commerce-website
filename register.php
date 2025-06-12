<?php
session_start();
if(isset($_SESSION['nom'])){     // variable de session (nom) existe  et  d'utilisateur connecte 
    header('location:profil.php');

}


include "inc/fonctions.php";
$showRegistrationAlert=0;
$categories=getALLCategories();
if(!empty($_POST)){ // cliker le bouton sauvgarder
 if( AddVisiteur($_POST)){ //if true
  $showRegistrationAlert=1;
 }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E_shop</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.16.1/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <?php
   include "inc/header.php";
   ?>
   </div>
</head>
<body>
<div class="col-12 p-4 ">
    <h1 class="text-center">Register</h1>
    <form action="register.php" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Nom</label>
          <input type="text" name="nom" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Prenom</label>
            <input type="text"  name="prenom"class="form-control" id="exampleInputPassword1">
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">telephone</label>
            <input type="text" name="telephone" class="form-control" id="exampleInputPassword1">
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password"name="mp" class="form-control" id="exampleInputPassword1">
          </div>
      
        </div>
        <button type="submit" class="btn btn-primary">Sauvgarder</button>
      </form>
</div>










</body>
      
<?php 
      include "inc/footer.php"; //footer recuperation
      ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.16.1/sweetalert2.all.min.js"></script>
<?php
if ($showRegistrationAlert==1){
print"<script> 
  Swal.fire({
  title: 'Done ',
  text: 'Cration with success',
  icon: 'success',
  confirmButtonText: 'ok',timer:3000
})
</script>";}


?>

</html>