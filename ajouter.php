<?php
//vérifie si un utilisateur est connecté en vérifiant si une certaine variable de session est définie. 
session_start();
if(!isset($_SESSION['id_pers'])){
header('location:login.php') ; exit();
}
?>

<?php
//fichier de configuration de la base de données
error_reporting(E_ALL ^ E_DEPRECATED);
// Connexion au serveur mysql
$connect = mysqli_connect("localhost", "root","") or die('Impossible de se connecter : ' . mysqli_error());
// s�lection de la base de donn�es
mysqli_select_db("stage", $connect);
mysqli_set_charset('utf8',$connect);

// Récupération des données du formulaire 
$nom=$_POST['nom'];
//$nom = mysql_real_escape_string(trim($nom));
$prenom=$_POST['prenom'];
$cin=$_POST['cin'];
$dat=$_POST['dat'];
$tel=$_POST['tel'];
$adresse=$_POST['adresse'];
$sexe=$_POST['sexe'];
$fonction=$_POST['D1'];


if($nom=='' || $prenom=='' || $cin==''||$dat==''||$fonction==''){
    
    header('location:ajouter_pers.php'); exit();
}

//tester si le personnel existe deja dans la base de données
$sql="SELECT * FROM personnel WHERE cin='$cin'";
$req=mysql_query($sql) ;
if (!$req) 
{
    die('Erreur dans la requête : ' . mysql_error());
}
    if (mysql_num_rows($req) > 0){
        echo "Le personnel est existe déjà dans la base de données.";
        header('location:ajouter_pers.php?ajout=9');exit();
        }
    else 
    {
        // inserer a la base de donneès si n'existe pas 
        $sqlinsert = "INSERT INTO personnel (nom, prenom, cin,telephone,adresse,date_naiss,sexe,fonction) VALUES ('$nom', '$prenom', '$cin','$tel','$adresse','$dat', '$sexe', '$fonction')";
        $res=mysqli_query($sqlinsert);
        //echo $sqlinsert;


        // Exécution de la requête
        if ($res== 1) {
        echo "Le personnel a été ajouté avec succès.";
        header('location:ajouter_pers.php?ajout=1') ; exit();}
        else {
        echo "Erreur lors de l'ajout du personnel : ";
        header('Location:ajouter_pers.php?ajout=2'); exit();}
        
    }
?>

