<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/asset/css/style.css">
    <title>Mon Centre Animalier</title>
</head>
<body>
    <header>
    <a class="logo-container">
      <img src="../public/asset/logo.jpeg" class="logo" alt="logo_centre">
         </a>
             <nav>
                 <ul class="nav-list">
                 
                 <?php 
                    if(isset($_SESSION) && !empty($_SESSION)){
                        echo '<li><a href="./inscription.html?action=inscription">Inscription</a></li>';
                        echo '<li><a href="./connect.html?action=connect">Connexion</a></li>';
                    }
                    else{
                        echo '<li class="deconnect"><a href="./deconnect.html?action=deconnect">Déconnexion</a></li>';
                        echo '<li><a href="./profil.html?action=profil">profil</a></li>';
                    }
                 ?>

                 </ul>
             </nav> 
    </header>
    <main class="main-background">
        <h1 id="carousel-title">BIENVENU DANS NOTRE BLOG ANIMALIER</h1>
    </main>
 
</body>
<script src="../public/asset/script/script.js"></script>
</html>



