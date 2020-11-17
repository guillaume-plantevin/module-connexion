<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Login:</label>
        <input type="text" name="login" id="login"><br />

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password"><br />
    </form>

    
    
</body>
</html>
<!-- 
    Le formulaire doit avoir deux inputs : “login” et “password”. Lorsque le
    formulaire est validé, s’il existe un utilisateur en bdd correspondant à ces
    informations, alors l’utilisateur est considéré comme connecté et une (ou
    plusieurs) variables de session sont créées.
 -->