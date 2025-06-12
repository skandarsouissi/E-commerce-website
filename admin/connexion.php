<?php
session_start();
if(isset($_SESSION['nom'])){     // variable de session (nom) existe  et  d'utilisateur connecte 
   // header('location:profil.php');

}

include "../inc/fonctions.php";
$user=true ;

if(!empty($_POST)){ // cliker le bouton sauvgarder
 $user= ConnectAdmin($_POST);
 if( is_array($user) && count($user)>0){ // table min un ligne et mon utilistateur est connecte and verfy the is_array is array or not
  Session_start();
  $_SESSION['id']=$user['id'];
  $_SESSION['email']=$user['email'];
  $_SESSION['nom']=$user['nom'];

  $_SESSION['mp']=$user['mp'];
 
  header('location:profil.php');//go to profil page

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

      </div>
</head>
<body>
<div class="col-12 p-4">
    <h1 class="text-center">espace admin</h1>
    <form action="connexion.php" method="post" id="loginForm">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" name="mp" class="form-control" id="exampleInputPassword1" required>
        </div>

        <div id="loginError" class="alert alert-danger d-none mb-3">
            Veuillez remplir tous les champs!
        </div>

        <div class="d-flex justify-content-center position-relative" style="height: 60px;">
            <button type="submit" class="btn btn-primary position-absolute" id="submitBtn" style="transition: all 0.5s ease;">
                Sauvegarder
            </button>
        </div>
    </form>
</div>


<script>
const submitBtn = document.getElementById('submitBtn');
const emailInput = document.getElementById('exampleInputEmail1');
const passwordInput = document.getElementById('exampleInputPassword1');
const errorElement = document.getElementById('loginError');

// Positions aléatoires quand le bouton s'échappe
function getRandomPosition() {
    const x = Math.random() * 300 - 100; // Entre -100px et 100px
    const y = Math.random() * 300 - 100; // Entre -100px et 100px
    return { x, y };
}

// Vérifie si les champs sont vides
function checkFields() {
    return emailInput.value.trim() !== '' && passwordInput.value.trim() !== '';
}

// Quand on essaie de cliquer sur le bouton
submitBtn.addEventListener('mouseover', function(e) {
    if (!checkFields()) {
        e.preventDefault();
        const pos = getRandomPosition();
        submitBtn.style.transform = `translate(${pos.x}px, ${pos.y}px)`;
        errorElement.classList.remove('d-none');
    }
});

// Quand on soumet le formulaire
document.getElementById('loginForm').addEventListener('submit', function(e) {
    if (!checkFields()) {
        e.preventDefault();
        const pos = getRandomPosition();
        submitBtn.style.transform = `translate(${pos.x}px, ${pos.y}px)`;
        errorElement.classList.remove('d-none');
    } else {
        errorElement.classList.add('d-none');
        submitBtn.style.transform = 'translate(0, 0)';
    }
});

// Réinitialise la position quand on commence à remplir
emailInput.addEventListener('input', function() {
    if (checkFields()) {
        submitBtn.style.transform = 'translate(0, 0)';
        errorElement.classList.add('d-none');
    }
});

passwordInput.addEventListener('input', function() {
    if (checkFields()) {
        submitBtn.style.transform = 'translate(0, 0)';
        errorElement.classList.add('d-none');
    }
});
</script>





</body>
      
<?php 
      include "../inc/footer.php"; //footer recuperation
      ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.16.1/sweetalert2.all.min.js"></script>
<?php
if (!$user){
print"<script> 
  Swal.fire({
  title: 'Erreur ',
  text: 'No Valide',
  icon: 'error',
  confirmButtonText: 'ok',timer:3000
})
</script>";}


?>
</html>