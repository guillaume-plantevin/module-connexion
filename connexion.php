<?php
    session_start();
    require_once "pdo.php";

    if ( isset($_POST['login']) && isset($_POST['password'])  ) {
        $sql = "SELECT login, prenom, nom, password, role FROM utilisateurs WHERE login = :log AND password = :pw";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':log' => $_POST['login'], ':pw' => $_POST['password']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( !$row )
            $errorMsg = 'Votre compte n\'existe pas ou vous avez fait une erreur dans la saisie de vos identifiants';
        else { 
            // faire le tour des infos de l'utilisateur dans la DB et les copier dans $_SESSION
            // DEBUG
            // echo '<pre>';
            // print_r($row);
            // echo '</pre>';
            foreach($row as $k=>$v) {
                $_SESSION[$k] = $v;
            } 
            header('location: profil.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="stylesheet" href="https://cdn.concisecss.com/concise.min.css">
        <link rel="stylesheet" href="styles/style_ullman.css">
        <link rel="stylesheet" href="styles/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
    </head>
    <body>
        <header container class="siteHeader">
            <div class="flex">
                <h1 column="4" class="logo">Jazz-Club "NU-Orleans"</h1>
                <nav column="8" class="nav">
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="connexion.php">connexion</a></li>
                        <li><a href="profil.php">Profil</a></li>
                        <li><a href="admin.php">Admin</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main container class="siteContent">
            <?php 
                if (isset($errorMsg))
                    echo '<p class="error">' . $errorMsg . '</p>';
            ?>
            <form action="" method="post">
                <label for="login">Login:</label>
                <input type="text" name="login" id="login"><br />
                
                <label for="password">Mot de passe:</label>
                <input type="password" name="password" id="password"><br />

                <input type="submit" id="submitButton" value="Valider">
            </form>

        </main>
        <footer container class="siteFooter">
            <p>Guillaume Plantevin @ Coding School 2020, LaPlateforme_</p>
        </footer>  
    </body>
</html>