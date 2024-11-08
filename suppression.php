<?php
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

        $id=$_GET['id_pers'];
        $sql="DELETE  FROM personnel WHERE  id_pers='$id' ";
        $req=mysql_query($sql) ;
        if ($req) {
            header("location:lister_pes.php?msg=deleted success");exit();
        }
        else {
            echo 'Erreur dans la requête : ' . mysql_error();
        }
        ?>

<script>
    alert (" la suppression de personnel a été fait avec succés !!");
    window.open("lister_pes.php");
</script>

            
     
    

