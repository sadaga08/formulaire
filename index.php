<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="php.css">
    <title>formulaire de php</title>
</head>
<body>
   <form method="post" action="formulaire.php">
    <div class="contenaire">
        <div class="label">
            <label for="label">se connecter</label>
        </div>
        <div class="firstName">
            <label for="firstName" id="nom1">Nom*</label>
            <input type="text" name="Nom" required="true" placeholder="saisir votre Nom" id="nom2">
        </div>
        <div class="lastName">
            <label for="lastName" id="prenom1">Prénom*</label>
            <input type="text" name="prenom" required="true" placeholder="saisir votre prénom" id="prenom2">
        </div>
        <div class="email">
            <label for="email" id="email1">Email*</label>
            <input type="text" name="email" required="true" placeholder="saisir votre email" id="email2">
        </div>
        <div class="mobile">
            <label for="mobile" id="mobile1">Mobile*</label>
            <input type="text" name="mobile" required="true" placeholder="saisir votre numéro mobile" id="mobile2">
        </div>
        <div class="genre">
            <label for="genre" id="genre">Genre</label>
            <label for="homme">Homme</label>
            <input type="radio" name="genre" value="homme" id="homme">
            <label for="femme">Femme</label>
            <input type="radio" name="genre" value="femme" id="femme">
        </div>
        <div>
            <input type="submit" name="envoyer" value="se connecter" id="submit">
        </div>
    </div>
   </form>
</body>
</html>
