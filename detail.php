<?php
session_start();
if(!isset($_SESSION['id_pers'])){
    header('location:login.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Personnel</title>
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

    <?php
    error_reporting(E_ALL);

    // Connexion au serveur MySQL avec mysqli
    $connect = mysqli_connect("localhost", "root", "", "stage");

    if (!$connect) {
        die('Impossible de se connecter : ' . mysqli_connect_error());
    }

    mysqli_set_charset($connect, 'utf8');

    $id_pers = $_GET['id_pers'];
    $sql = "SELECT * FROM personnel WHERE id_pers='$id_pers'";
    $req = mysqli_query($connect, $sql);

    if (!$req) {
        echo 'Erreur dans la requête : ' . mysqli_error($connect);
    } else {
        while ($row = mysqli_fetch_assoc($req)) {
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['cin'] = $row['cin'];
            $_SESSION['dat'] = $row['date_naiss'];
            $_SESSION['tel'] = $row['telephone'];
            $_SESSION['adresse'] = $row['adresse'];
            $_SESSION['sexe'] = $row['sexe'];
            $_SESSION['D1'] = $row['fonction'];
        }
    }
    ?>

    <form method="POST" action="">
        <div class="container">
            <div>
                <h1>Detail d'un personnel</h1>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label for="nom" class="form-label">NOM: <?php echo $_SESSION['nom']; ?></label>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label for="prenom" class="form-label">PRENOM: <?php echo $_SESSION['prenom']; ?></label>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label for="datN">DATE DE NAISSANCE: <?php echo $_SESSION['dat']; ?></label>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label for="cin" class="form-label">CIN: <?php echo $_SESSION['cin']; ?></label>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label for="tel" class="form-label">TELEPHONE: <?php echo $_SESSION['tel']; ?></label>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label for="adresse" class="form-label">ADRESSE: <?php echo $_SESSION['adresse']; ?></label>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label for="sexe" class="form-label">SEXE: <?php echo $_SESSION['sexe']; ?></label>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label for="fonction" class="form-label">FONCTION: <?php echo $_SESSION['D1']; ?></label>
            </div>
            
            <button class="btn btn-outline-success" id="print" type="button" onclick="window.print()">Imprimer</button>
        </div>
    </form>
</body>
</html>
