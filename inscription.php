<?php
    require_once "pdo.php";

    // BORDEL DES CHEMINS DE IF/ELSE => pas certain en fait...
    if ( isset($_POST['submit']) ) {
        // les deux mdp sont similaires
        if ( isset($_POST['password']) && ($_POST['password'] === $_POST['passwordConfirm']) ) {
            // Vérifier si le login existe déjà
            $sql = "SELECT login FROM utilisateurs WHERE login = :log";
            // DEBUG query
            // echo "<p>$sql</p>\n";

            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':log' => $_POST['login']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // le login est déjà enregistré dans la DB
            if ( $_POST['login'] === $row['login'] ) {
                $errorMsg = "Attention: Le login existe déjà. Veuillez en choisir un autre.";

                // est-ce que cette ligne est indispensable ou même nuisible?
                // unset($row);
            }
            // nouveau login => rajout d'un utilisateur
            else {
                $sql = "INSERT INTO utilisateurs (login, prenom, nom, password, role) VALUES (:login, :prenom, :nom, :password, 0)";
                
                echo("<pre>\n" . $sql . "\n</pre>\n");
    
                // sanitizing input query
                $stmt = $pdo->prepare($sql);
    
                $stmt->execute(array
                    (':login' => $_POST['login'], 
                    ':prenom' => $_POST['prenom'], 
                    ':nom' => $_POST['nom'], 
                    ':password' => $_POST['password']));
                header('location: connexion.php');
            }
        }
        // les mdp sont différents
        else {
            $errorMsg = "Attention: Votre mot de passe et sa confirmation ne sont pas similaires.";
        }
    }

    $stmt = $pdo->query("SELECT * FROM utilisateurs");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // echo '$rows<br />';
    // echo '<pre>';
    // print_r($rows);
    // echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdn.concisecss.com/concise.min.css">
        <link rel="stylesheet" href="styles/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>inscription</title>
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
            <!-- <p>Pour vous inscrire, il vous suffit de remplir les champs suivants:</p> -->
            <?php 
                if (isset($errorMsg))
                    echo '<p class="error">' . $errorMsg . '</p>';
                else
                    echo "<p>Pour vous inscrire, il vous suffit de remplir les champs suivants:</p>";
            ?>
            <form action="inscription.php" method="POST">
                <label for="login">Login:</label>
                <input type="text" name="login" id="login" required><br />

                <label for="fName">Prenom:</label>
                <input type="text" name="prenom" id="fName" required><br />

                <label for="lName">Nom:</label>
                <input type="text" name="nom" id="lName" required><br />

                <label for="password">Mot de passe:</label>
                <input type="password" name="password" id="password" required><br />

                <label for="passwordConfirm">Confirmation du mot de passe:</label>
                <input type="password" name="passwordConfirm" required><br />

                <input type="submit" id="submitButton" name="submit" value="Inscription">
            </form>
        </main>
        <footer container class="siteFooter">
            <p>Guillaume Plantevin @ Coding School 2020, LaPlateforme_</p>
        </footer>    
    </body>
</html>