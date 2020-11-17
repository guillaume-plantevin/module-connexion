<?php

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil</title>
    </head>
    <body>
        <p>Si vous souhaitez mettre a jour vos informations personnelles, 
            il vous suffit de changer les informations fournis dans le formulaire.
        </p>
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
        </form>
        
    </body>
</html>

<!-- 
    Cette page possède un formulaire permettant à l’utilisateur de modifier ses
    informations. Ce formulaire est par défaut pré-rempli avec les informations
    qui sont actuellement stockées en base de données.
 -->