<?php
    session_start();
    require_once "pdo.php";

    $stmt = $pdo->query("SELECT * FROM utilisateurs");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // cacher inscription et connexion
    if (isset($_SESSION['login'])) 
        $invisible = true;
    else
        $invisible = false;

    // Si l'utilisateur n'a pas le statut/role 1
    if ($_SESSION['role'] != 1)
        $errorMsg = "Cette page n'est visible que par l'administrateur.";

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="stylesheet" href="https://cdn.concisecss.com/concise.min.css">
        <link rel="stylesheet" href="styles/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administration</title>
    </head>
    <body>
        <header container class="siteHeader">
            <div class="flex">
                <h1 column="4" class="logo">Jazz-Club "NU-Orleans"</h1>
                <nav column="8" class="nav">
                    <ul>
                        <li><a href="index.php">Index</a></li>
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
            <p>Voici la liste des utilisateurs du site:</p>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Login</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Password</th>
                        <th>role</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- recuperation des datas dans un associative array -->
                    <?php
                        foreach ( $rows as $row ) {
                            echo "<tr><td>";
                            echo($row['id']);
                            echo("</td><td>");
                            echo($row['login']);
                            echo("</td><td>");
                            echo($row['prenom']);
                            echo("</td><td>");
                            echo($row['nom']);
                            echo("</td><td>");
                            echo($row['password']);
                            echo("</td><td>");
                            if ($row['role'] == 1)
                                echo 'administrateur (' . $row['role'] . ')';
                            else
                                echo 'utilisateur (' . $row['role'] . ')';
                            echo("</td></tr>\n");
                        }
                    ?>
                </tbody>
            </table>
            <!-- fin du else -->
            <?php endif;?>
        </main>
        <footer container class="siteFooter">
            <p>Guillaume Plantevin @ Coding School 2020, LaPlateforme_</p>
        </footer>    
    </body>
</html>