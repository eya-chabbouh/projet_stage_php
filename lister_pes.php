<?php
session_start();
if (!isset($_SESSION['id_pers'])) {
    header('Location: login.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LISTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="lister.css"/>
    <style>
        .modif {
            text-align: center;
            color: green;
        }
        .con {
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-sm bg-info navbar-light">
        <div class="container-fluid">
            <img src="images.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            <a class="navbar-brand" href="#">Gestion de personnel</a>
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
        </div>
        <form class="d-flex" method="get" action="lister_pes.php">
            <input class="form-control me-2" type="text" placeholder="Recherche" aria-label="Search" name="search">
            <button class="btn btn-outline-success" type="submit">Chercher</button>
        </form>
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Connexion</a>
            <ul class="dropdown-menu">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="nav-link" href="deconnection.php">Déconnexion</a>
            </ul>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h1>Liste des personnels</h1>

                <?php
                // Connexion à la base de données
                $connect = mysqli_connect("localhost", "root", "", "stage");
                if (!$connect) {
                    die('Erreur de connexion : ' . mysqli_connect_error());
                }
                mysqli_set_charset($connect, "utf8");

                // Requête de recherche
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $sql = "SELECT * FROM personnel WHERE id_pers LIKE '%$search%' OR nom LIKE '%$search%' OR prenom LIKE '%$search%' OR cin LIKE '%$search%' OR telephone LIKE '%$search%' OR adresse LIKE '%$search%' OR date_naiss LIKE '%$search%' OR sexe LIKE '%$search%' OR fonction LIKE '%$search%'";
                } else {
                    $sql = "SELECT * FROM personnel";
                }

                $req = mysqli_query($connect, $sql);
                if (!$req) {
                    echo 'Erreur dans la requête : ' . mysqli_error($connect);
                } else {
                    if (isset($_GET['msg']) && $_GET['msg'] == 9) {
                        echo '<p class="modif">Modification avec succès</p>';
                    }
                    if (isset($_GET['msg']) && $_GET['msg'] == 1) {
                        echo '<p class="con">Déjà existant !!!</p>';
                    }
                ?>

                <!-- Table d'affichage des résultats -->
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>NOM</th>
                            <th>PRENOM</th>
                            <th>DATE DE NAISSANCE</th>
                            <th>CIN</th>
                            <th>TELEPHONE</th>
                            <th>ADRESSE</th>
                            <th>SEXE</th>
                            <th>FONCTION</th>
                            <th>ACTION</th>
                        </tr>

                        <?php while ($t = mysqli_fetch_array($req)) { ?>
                        <tr>
                            <td><?php echo $t['nom']; ?></td>
                            <td><?php echo $t['prenom']; ?></td>
                            <td><?php echo $t['date_naiss']; ?></td>
                            <td><?php echo $t['cin']; ?></td>
                            <td><?php echo $t['telephone']; ?></td>
                            <td><?php echo $t['adresse']; ?></td>
                            <td><?php echo $t['sexe']; ?></td>
                            <td><?php echo $t['fonction']; ?></td>
                            <td>
                                <a class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce personnel ?')" href="suppression.php?id_pers=<?= $t['id_pers'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="..."/>
                                    </svg>
                                </a>
                                <a href="modifier_pes.php?id_pers=<?= $t['id_pers'] ?>" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="..."/>
                                    </svg>
                                </a>
                                <a class="btn btn-danger" href="detail.php?id_pers=<?= $t['id_pers'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                                        <path d="..."/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>

                    </table>
                </div>
                <?php
                }
                mysqli_close($connect);
                ?>
            </div>
        </div>
    </div>
</body>
</html>
