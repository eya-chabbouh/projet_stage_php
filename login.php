
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>
    <link rel="stylesheet" href="boo/css/bootstrap.css "/>
    <link rel="stylesheet" href="authen.css"/>
    <title>AUTHENTIFICATION</title>
    <style>
        .ajout-message{
            color:red;
            text-align:center;
        }
    </style>
    
    <script>
        function verifier() 
        {
            var login = document.getElementById('nom').value;
            var pass = document.getElementById('pass').value;
            console.log(login);
            console.log(pass);

            if (login.trim() === '') {alert('Votre login ne peut pas être vide.');return false;}
            
            if (login.length < 8 ) {alert('Le login doit être composé de 8 chiffres.');return false; }
           

            if (pass.trim() === '') {alert('Le mot de passe est requis.');return false;}
            
        }

    </script>
</head>
    
<body>
<form method="POST" action="login_code.php" >    
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 style="text-align:center;">AUTHENTIFICATION</h1><br>
                    <div class="container mt-5">
                    <div class="row justify-content-md-center">
                    <div class="col-md-6">
       
        <div class="form-group">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
        </svg>

        <label for="nom" class="form-label">login:</label></i>
        <input type="text" class="form-control" id="nom" placeholder="Enter votre login" name="nom"    />        
        </div>

        <div class="form-group">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
        </svg>

        <label for="pass" class="form-label">Mot de passe:</label>
            <input type="password" class="form-control" id="pass" placeholder="Enter votre password"  name="pass"  />        
        </div><br>    
  </div>

    <span id="">
        <div class="text-center">
            <button type="submit"  class="btn btn-success " onclick="verifier()" >Connexion</button>  
        </div>
    </span>

</form>

<?php
    if(isset($_GET['error']) && $_GET['error']==1){
        echo ' <p class = "ajout-message">utlisateur inexsistant</p>';
    }

    if(isset($_GET['error']) && $_GET['error']==2){
        echo ' <p class = "ajout-message">utlisateur bloque</p>';
    }

?>

</body>
</html>

