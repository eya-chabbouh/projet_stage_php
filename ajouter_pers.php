<?php
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
    <title>Ajouter personnel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .ajout-message{
            color:green;
            text-align:center;
        } 
        .err{
            color : red ; 
            text-align: center ; 
        }
        </style>
</head>
  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
function ajouter()
    {
            var nom = document.getElementById('nom').value;
            var prenom = document.getElementById('prenom').value;
            var date = document.getElementById('dat').value;
            var cin = document.getElementById('cin').value;
            var adresse = document.getElementById('adresse').value;
            var tel = document.getElementById('tel').value;
            var sexe = document.getElementsByName('sexe');
            var fonction = document.getElementById('D1').value;
            
            var champ = document.getElementsByTagName('input');
            for (var i = 0; i < champ.length; i++) {
                if(champ[i].type!=="submit" && champ[i].value === ""){
                    alert('Veuillez remplir tous les champs.');
                    return false ;
                }
            }      

            for (var i = 0; i < prenom.length; i++)
            {
                var b = prenom.toUpperCase();
                if (((b.charAt(i) < "A") || (b.charAt(i) > "Z")) && (b.charAt(i) !== " ")) 
                {
                    alert("Le prénom doit être contient des lettre et ne contient d'espace!!.");
                    return false ;
                }
            }
            for (var i = 0; i < nom.length; i++)
            {
                var x = nom.toUpperCase();
                if (((x.charAt(i) < "A") || (x.charAt(i) > "Z")) && (x.charAt(i) !== " ")) 
                {
                    alert("Le nom doit être contient des lettre et ne contient d'espace!!.");
                    return false ;
                }
            }
            if (cin.length < 8  ) {alert("Le CIN doit être composé de 8 caractères au minuman.");return false;}

            if (tel.length < 8 ) {
            alert("Le numéro de téléphone doit être composeé de 8 chiffres.");return false;
            }
            
         /*    if (sexe) {
            alert('Veuillez sélectionner le sexe.');
            return false;
        } */

            
    }

</script>
</head>
<body>


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
                            <li><a class="dropdown-item" href="#">Ajouter</a></li>
                            <li><a class="dropdown-item" href="#">Lister</a></li>
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




<?php
    if (isset($_GET['ajout']) && $_GET['ajout']==1)
    {
        echo '<p class = "ajout-message"> ajoute avec succes </p>' ;
    }
    if (isset($_GET['ajout']) && $_GET['ajout']==9)
    {
        echo '<p class = "err">deja existant !!!</p>' ;
    }
    if (isset($_GET['ajout']) && $_GET['ajout']==2)
    {
        echo '<p class = "err">probeme base de donnee</p>' ;
    }

?>


<form method="POST" action="ajouter.php">
<div class="container">
    <div>
        <h1>Ajouter un personnel</h1>
     </div>

    

    <div class="col-sm-4 col-md-4 col-lg-4">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
    </svg>
        <label for="nom">NOM : </label>
        <input type="text" class="form-control" id="nom" placeholder="Enter votre nom" name="nom"   />        
    </div>

    <div class="col-sm-4 col-md-4 col-lg-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
        </svg>
        <label for="prenom">PRENOM : </label>
        <input type="text" class="form-control" id="prenom" placeholder="Enter votre prenom" name="prenom"  />        
    </div>

    <div class="col-sm-4 col-md-4 col-lg-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
        </svg>
        <label for="datN">DATE DE NAISSANCE  : </label>
        <input type="date" class="form-control" id="dat"  name="dat" requried/>        
    </div>

    <div class="col-sm-4 col-md-4 col-lg-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
        <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
        <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
        </svg>
        <label for="cin ">CIN  : </label></td>
        <input type="text" class="form-control" id="cin" placeholder="Enter votre cin" name="cin"   />        
    </div>

    <div class="col-sm-4 col-md-4 col-lg-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
        </svg>
        <label for="tel ">TELEPHONE : </label>
        <input type="text" class="form-control" id="tel" placeholder="Enter votre numero de telephone" name="tel"  />        
    </div>

    <div class="col-sm-4 col-md-4 col-lg-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-threads-fill" viewBox="0 0 16 16">
        <path d="M6.81 9.204c0-.41.197-1.062 1.727-1.062.469 0 .758.034 1.146.121-.124 1.606-.91 1.818-1.674 1.818-.418 0-1.2-.218-1.2-.877Z"/>
        <path d="M2.59 16h10.82A2.59 2.59 0 0 0 16 13.41V2.59A2.59 2.59 0 0 0 13.41 0H2.59A2.59 2.59 0 0 0 0 2.59v10.82A2.59 2.59 0 0 0 2.59 16M5.866 5.91c.567-.81 1.315-1.126 2.35-1.126.73 0 1.351.246 1.795.711.443.466.696 1.132.754 1.983q.368.154.678.363c.832.559 1.29 1.395 1.29 2.353 0 2.037-1.67 3.806-4.692 3.806-2.595 0-5.291-1.51-5.291-6.004C2.75 3.526 5.361 2 8.033 2c1.234 0 4.129.182 5.217 3.777l-1.02.264c-.842-2.56-2.607-2.968-4.224-2.968-2.675 0-4.187 1.628-4.187 5.093 0 3.107 1.69 4.757 4.222 4.757 2.083 0 3.636-1.082 3.636-2.667 0-1.079-.906-1.595-.953-1.595-.177.925-.651 2.482-2.733 2.482-1.213 0-2.26-.838-2.26-1.936 0-1.568 1.488-2.136 2.663-2.136.44 0 .97.03 1.247.086 0-.478-.404-1.296-1.426-1.296-.911 0-1.16.288-1.45.624l-.024.027c-.202-.135-.875-.601-.875-.601Z"/>
        </svg>
        <label for="adresse">ADRESSE : </label></td>
        <input type="email" class="form-control" id="adresse" placeholder="Enter votre adresse" name="adresse"  />        
    </div>

    <div class="col-sm-4 col-md-4 col-lg-4">
        <label for="sexe">SEXE : </label>
        <div class="form-check">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-standing-dress" viewBox="0 0 16 16">
        <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m-.5 12.25V12h1v3.25a.75.75 0 0 0 1.5 0V12h1l-1-5v-.215a.285.285 0 0 1 .56-.078l.793 2.777a.711.711 0 1 0 1.364-.405l-1.065-3.461A3 3 0 0 0 8.784 3.5H7.216a3 3 0 0 0-2.868 2.118L3.283 9.079a.711.711 0 1 0 1.365.405l.793-2.777a.285.285 0 0 1 .56.078V7l-1 5h1v3.25a.75.75 0 0 0 1.5 0Z"/>
        </svg>
        <input type="radio" class="form-check-input" id="R1" name="sexe" value="femme" />
        <label class="form-check-label" for="femme">Femme</label>
    </div>

    <div class="form-check">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-standing" viewBox="0 0 16 16">
        <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M6 6.75v8.5a.75.75 0 0 0 1.5 0V10.5a.5.5 0 0 1 1 0v4.75a.75.75 0 0 0 1.5 0v-8.5a.25.25 0 1 1 .5 0v2.5a.75.75 0 0 0 1.5 0V6.5a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2.75a.75.75 0 0 0 1.5 0v-2.5a.25.25 0 0 1 .5 0"/>
        </svg>
        <input type="radio" class="form-check-input" id="R2" name="sexe" value="homme" requried/>
        <label class="form-check-label" for="homme" >Homme</label>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
        </svg>
        <label for="fonction">FONCTION :</label>
        <select class="form-select form-select-lg" id ="D1" name="D1"  >                                                                                                                                 >
            <option value="0">choisir une fonction</option>
            <option value="thecinicien">thecinicien</option>
            <option value="informaticienne">informaticienne</option>
            <option value="directeur general">directeur general</option>
            <option value="responsable">responsable</option>
            <option value="RH">RH</option>
        </select>
    </div>
    </span>

    <div class="mt-2">
        <button type="submit" class="btn btn-success" onclick='ajouter()'>Ajouter</button>
        <button type="reset" class="btn btn-success">Annuler</button>
    </div>

</div> 
</form>
</body>
</html>