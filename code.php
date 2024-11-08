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
     $connect = mysql_connect("localhost", "root","") or die('Impossible de se connecter : ' . mysql_error());
     // s�lection de la base de donn�es
     mysql_select_db("stage", $connect);
     mysql_set_charset('utf8',$connect);

if (isset($_POST['modifie']))
{
    
    $id=$_POST['id_pers'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $cin=$_POST['cin'];
    $dat=$_POST['dat'];
    $tel=$_POST['tel'];
    $adresse=$_POST['adresse'];
    $sexe = $_POST['sexe'];
    $fonction=$_POST['fonc']; 

    $sql2="SELECT * FROM personnel WHERE cin='$cin' and id_pers!='$id'";
    $req2=mysql_query($sql2) ;

    if (mysql_num_rows($req2)==0){
        $sql1 = "UPDATE personnel SET id_pers='$id',nom='$nom',prenom='$prenom',cin='$cin',telephone='$tel', adresse='$adresse',sexe='$sexe',fonction='$fonction',date_naiss='$dat' where id_pers='$id' ";
        $req1=mysql_query($sql1) ;
        header('location:lister_pes.php?msg=9');exit();
        if ($req1) { 
            header("location:lister_pes.php?msg=1");exit();
        }
    }   
    else{
        header('location:lister_pes.php?msg=1');exit();
    }

}

?>
