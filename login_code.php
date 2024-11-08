<?php
// Fichier de configuration de la base de données

// Connexion au serveur MySQL
$connect = mysqli_connect("localhost", "root", "", "stage");

// Vérifie si la connexion a réussi
if (!$connect) {
    die('Impossible de se connecter : ' . mysqli_connect_error());
}

// Définit le jeu de caractères à utiliser
mysqli_set_charset($connect, 'utf8');

// Récupération des données du formulaire
$login = $_POST['nom'];
$pw = $_POST['pass'];

// Vérifie si les champs sont vides
if (empty($login) || empty($pw)) {
    header('location:login.php'); 
    exit();
}

// Recherche de l'utilisateur dans la base de données
$sql = "SELECT * FROM utlisateur WHERE identifiant=? AND mot_passe=?";
$stmt = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmt, 'ss', $login, $pw);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Vérifie si une seule ligne a été retournée par la requête SQL
if ($row = mysqli_fetch_assoc($result)) {
    if ($row['etat'] == 'actif') {
        echo 'Cet utilisateur existe et est actif.';
        session_start();
        $_SESSION['nom'] = $row['nom'];
        $_SESSION['prenom'] = $row['prenom'];
        $_SESSION['id_pers'] = 1;
        header('location:accueil.php'); 
        exit();
    } elseif ($row['etat'] == 'bloque') {
        echo 'Utilisateur bloqué.';
        header('location:login.php?error=2'); 
        exit();
    }
} else {
    echo 'Utilisateur inexistant.';
    header('location:login.php?error=1'); 
    exit();
}

// Fermeture de la connexion
mysqli_close($connect);
?>
