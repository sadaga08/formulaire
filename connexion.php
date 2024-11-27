<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>connexion en php</title>
</head>
<body>
   <form method="post" action="login.php">
    <div class="contenaire">
        <div class="label">
            <label for="label">se connecter</label>
        </div>
        <div class="email">
            <label for="email" id="email1">Email*</label>
            <input type="text" name="email" required="true" placeholder="saisir votre email" id="email2">
        </div>
        <label for="password" id="password1">Mot Passe*</label>
            <input type="text" name="password" required="true" placeholder="saisir un mot de passe" id="password2">
        </div> 
        </div>
        <label for="confimer" id="confirmer1">confimer*</label>
            <input type="text" name="password" required="true" placeholder="confirmer le mot de passe" id="confirmer2">
        </div> 
        <div>
            <input type="submit" name="envoyer" value="se connecter" id="submit">
        </div>
    </div>
   </form>
</body>
</html>