<?php 



?>

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
                        echo '<li><a href="../controllers/deconnect.php?action=deconnect">Déconnexion</a></li>';
                        echo '<li><a href="./profil.html?action=profil">profil</a></li>';
                        echo $_SESSION['pseudo'];

                    }
                    else{
                        echo '<li><a href="./inscription.html?action=inscription">Inscription</a></li>';
                        echo '<li><a href="./connect.html?action=connect">Connexion</a></li>';
                    }
                 ?>

                 </ul>
             </nav> 
    </header>
    <main class="main-background">
        <h1 id="carousel-title">BIENVENU DANS NOTRE BLOG ANIMALIER</h1>
 
        <div class="container-main">

        <div class="look-post">

            <?php foreach ($resultat as $key => $value){ ?>

                    <?php echo $value['message'] ?>

                <?php } ?>

        </div>
        <?php
            if(isset($_SESSION) && !empty($_SESSION)){
                echo '<form class="post" action="../controllers/profil.php?action=submitMessage" method="post">
                <textarea type="textarea" id="publication" name="publication" placeholder="Écrivez votre texte ici..."></textarea>
                <button type="submit" class="button-deconnexion">Publication</button>
                </form>';
            }
        ?>

        </div>
    </main>
 
</body>
<script src="../public/asset/script/script.js"></script>
</html>



