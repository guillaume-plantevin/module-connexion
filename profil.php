<?php
    session_start();

    // echo '<pre>';
    // print_r($_SESSION);
    // echo '</pre>';

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    if ( isset($_SESSION['login']) )
        $invisible = true;
    else {
        $invisible = false;
        $errorMsg = "Cette page vous permettra de changer vos données personnelles, merci de vous connecter tout d'abord.";
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="stylesheet" href="https://cdn.concisecss.com/concise.min.css">
        <link rel="stylesheet" href="styles/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil</title>
    </head>
    <body>
        <header container class="siteHeader">
            <div class="flex">
                <h1 column="4" class="logo">Jazz-Club "NU-Orleans"</h1>
                <nav column="8" class="nav">
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <?php 
                            if (!$invisible) {
                                echo '<li><a href="inscription.php">Inscription</a></li>';
                                echo '<li><a href="connexion.php">connexion</a></li>';
                            }
                        ?>
                        <li><a href="profil.php">Profil</a></li>
                        <li><a href="admin.php">Admin</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main container class="siteContent">
            <?php 
                if (isset($errorMsg)):
                    echo '<p class="error">' . $errorMsg . '</p>';
                else:
            ?>
                <h4>Bienvenue parmis nous, <?= '<span style="text-transform:capitalize">' . $_SESSION['prenom'] . '</span>';?></h4>
            <p>Si vous souhaitez mettre à jour vos informations personnelles, 
                il vous suffit de changer celles fournies ci-dessous.
            </p>
            <form action="connexion.php" method="POST">
                <label for="login">Login:</label>
                <input type="text" name="login" id="login" value=<?=$_SESSION['login'];?>><br />

                <label for="fName">Prenom:</label>
                <input type="text" name="prenom" id="fName" value=<?=$_SESSION['prenom'];?>><br />

                <label for="lName">Nom:</label>
                <input type="text" name="nom" id="lName" value=<?=$_SESSION['nom'];?>><br />

                <label for="password">Mot de passe:</label>
                <input type="text" name="password" id="password" value=<?=$_SESSION['password'];?>><br />

                <input type="submit" id="submitButton" value="Valider">
                
            </form>
            <?php endif;?>
        </main>
        <footer container class="siteFooter">
            <p>Guillaume Plantevin @ Coding School 2020, LaPlateforme_</p>
        </footer>    
    </body>
</html>

<!-- 
    Cette page possède un formulaire permettant à l’utilisateur de modifier ses
    informations. Ce formulaire est par défaut pré-rempli avec les informations
    qui sont actuellement stockées en base de données.

    RECUPERER PAR DB ET NON PAR POST!!!!!
 -->