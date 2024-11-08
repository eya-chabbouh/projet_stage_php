<?php
session_start();
if(!isset($_SESSION['id_pers'])){
    header('location:login.php');
    exit();
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier Personnel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .message {
            text-decoration: none;
        }
    </style>
    <script>
        function modifier() {
            var nom = document.getElementById('nom').value;
            var prenom = document.getElementById('prenom').value;
            var cin = document.getElementById('cin').value;
            var tel = document.getElementById('tel').value;
            var sexe = document.getElementsByName('sexe');

            // Vérifier que tous les champs sont remplis
            var inputs = document.querySelectorAll('input');
            for (let input of inputs) {
                if (input.type !== "submit" && input.value === "") {
                    alert('Veuillez remplir tous les champs.');
                    return false;
                }
            }

            // Validation du prénom et du nom
            var alphaRegex = /^[A-Za-z ]+$/;
            if (!alphaRegex.test(prenom)) {
                alert("Le prénom ne doit contenir que des lettres et des espaces.");
                return false;
            }
            if (!alphaRegex.test(nom)) {
                alert("Le nom ne doit contenir que des lettres et des espaces.");
                return false;
            }

            // Vérification de la longueur du CIN
            if (cin.length !== 8) {
                alert("Le CIN doit être composé de 8 caractères.");
                return false;
            }

            // Vérification de la longueur du numéro de téléphone
            if (tel.length !== 8) {
                alert("Le numéro de téléphone doit être composé de 8 chiffres.");
                return false;
            }

            // Validation de sexe
            var sexeSelected = false;
            for (let s of sexe) {
                if (s.checked) {
                    sexeSelected = true;
                    break;
                }
            }
            if (!sexeSelected) {
                alert("Veuillez sélectionner le sexe.");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-info navbar-light">
        <div class="container-fluid">
            <img src="images.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            <a class="navbar-brand" href="lister_pes.php">Gestion de personnel</a>
            <a class="navbar-brand" href="accueil.php">Accueil</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Personnel</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="ajouter_pers.php">Ajouter</a></li>
                            <li><a class="dropdown-item" href="lister_pes.php">Lister</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="login.php" role="button" data-bs-toggle="dropdown">Connexion</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="deconnection.php">Déconnexion</a></li>
                </ul>
            </div>
        </div>
    </nav>

<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    $connect = mysqli_connect("localhost", "root", "", "stage") or die('Impossible de se connecter : ' . mysqli_error());
    mysqli_set_charset($connect, 'utf8');

    $sql = "SELECT * FROM personnel WHERE id_pers=" . $_GET['id_pers'];
    $req = mysqli_query($connect, $sql);
    if (!$req) {
        echo 'Erreur dans la requête : ' . mysqli_error($connect);
    } else {
        $t = mysqli_fetch_assoc($req);
    }
?>

<form method="POST" action="code.php" onsubmit="return modifier()">
    <input type="hidden" value="<?php echo $_GET['id_pers']; ?>" name="id_pers">
    <div class="container">
        <h1>Modifier un personnel</h1>
        <div class="col-sm-4">
            <label for="nom">Nom : </label>
            <input type="text" value="<?= $t['nom']; ?>" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="col-sm-4">
            <label for="prenom">Prénom : </label>
            <input type="text" value="<?= $t['prenom']; ?>" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="col-sm-4">
            <label for="dat">Date de naissance : </label>
            <input type="date" value="<?= $t['date_naiss']; ?>" class="form-control" name="dat" required>
        </div>
        <div class="col-sm-4">
            <label for="cin">CIN : </label>
            <input type="text" value="<?= $t['cin']; ?>" class="form-control" id="cin" name="cin" required>
        </div>
        <div class="col-sm-4">
            <label for="tel">Téléphone : </label>
            <input type="tel" value="<?= $t['telephone']; ?>" class="form-control" id="tel" name="tel" required>
        </div>
    </div>
</form>
