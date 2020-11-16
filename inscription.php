<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="styles/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>inscription</title>
    </head>
    <body>
        <form action="connexion.php" method="POST">
            <label for="login">Login:</label>
            <input type="text" name="login" id="login"><br />

            <label for="fName">Prenom:</label>
            <input type="text" name="prenom" id="fName"><br />

            <label for="lName">Nom:</label>
            <input type="text" name="nom" id="lName"><br />

            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password"><br />

            <label for="passwordConfirm">Confirmation du mot de passe:</label>
            <input type="password" name="passwordConfirm"><br />
            <button type="submit" name="submit" value="Inscription"></button>
        </form>
    </body>
</html>

<!-- 
    Le formulaire doit contenir l’ensemble des champs présents dans la table
    “utilisateurs” (sauf “id”) + une confirmation de mot de passe. Dès qu’un
    utilisateur remplit ce formulaire, les données sont insérées dans la base de
    données et l’utilisateur est redirigé vers la page de connexion
 -->