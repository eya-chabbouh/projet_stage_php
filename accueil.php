<?php
//vérifie si un utilisateur est connecté en vérifiant si une certaine variable de session est définie. 
session_start();
if(!isset($_SESSION['id_pers'])){
header('location:login.php') ; exit();
}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> ACUUEIL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
  <body>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-sm bg-info navbar-light">
        <div class="container-fluid">
        <img src="images.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        <a class="navbar-brand" href="lister_pes.php">Gestion de personnel</a>
            <a class="navbar-brand" href="accueil.php">Accueil</a>
            <div class="collapse navbar-collapse" id="navbarScroll">

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop1" role="button" data-bs-toggle="dropdown">Personnel</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="ajouter_pers.php">Ajouter</a></li>
                            <li><a class="dropdown-item" href="lister_pes.php">Lister</a></li>
                        </ul>
                    </li>
<!--                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop2" role="button" data-bs-toggle="dropdown">Fournisseur</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="ajouter_pers.php">Ajouter</a></li>
                            <li><a class="dropdown-item" href="lister_pes.php">Lister</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="login.php" role="button" data-bs-toggle="dropdown">Connection</a>
            <ul class="dropdown-menu">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="nav-link" href="deconnection.php">Déconnexion</a>
            </ul>
            </div>
        </div>
    </nav>


    <form class="nav navbar-inverse navbar-fixed-top" method="POST" action="accueil.php">
    <div class="container">
        <div class="card shadow mb-4">
        <div class="card-body">
        <h1 style="text-align:center;">Bienvenue</h1><br>
        <div class="container mt-5">
        <div class="row justify-content-md-center">
        <div class="col-md-6">
        <img src="logo.png" class="rounded float-start"  alt="medina" class="image" /> 
        <div class="form-group">
        <div class="mb-3 mt-3">
        <label for="nom" class="form-label">NOM: <?php echo $_SESSION['nom']; ?> </label>
    </div>
    </div>
    <div class="form-group">
    <div class="mb-3">
        <label for="prenom" class="form-label">PRENOM: <?php echo $_SESSION['prenom']; ?></label>
     </div>
     </div>
</form>



</body>
</html>