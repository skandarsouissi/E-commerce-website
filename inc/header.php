<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">E_shop</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             
           
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categorie
                </a>
                <ul class="dropdown-menu">
                  <?php
                  foreach($categories as $categorie){
                    print' <li><a class="dropdown-item" href="#">'.$categorie['nom'].'</a></li>';
                  }




                  ?>
                  
                </ul>
              </li>
              <?php if (isset ($_SESSION['nom'])){ // lorsque mon session est ouverte (btw i can use any variable here not specialy nom)
                print' <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="profil.php">profil</a>
              </li>
              ';
              if(isset($_SESSION['panier']) &&   is_array($_SESSION['panier'][3])){
                print' <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="panier.php">panier('.count($_SESSION['panier'][3]).')</a>
              </li>
              ';
              }else{
                print' <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="panier.php">panier(0)</a>
              </li>
              ';
              }
           
              } else{
                print'  <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="connexion.php">Conexion</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="register.php">Register</a>
              </li>';
              }          ?>
            
              
              
           
            </ul>
            <form class="d-flex" role="search" action="index.php" method="POST">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <?php  
            if (isset($_SESSION['nom'])){ //test comme d'hab 
              print'<a href ="deconnexion.php" class ="btn btn-primary">deconnexion</a>';
            }

            ?>
          </div>
        </div>


      </nav>