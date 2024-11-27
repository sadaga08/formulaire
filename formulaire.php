<?php
try {
    // Vérification que les champs 'nom', 'prenom', 'email' et 'mobile' sont définis et non vides
    if (isset($_POST['Nom']) && !empty($_POST['Nom']) && 
        isset($_POST['prenom']) && !empty($_POST['prenom']) && 
        isset($_POST['email']) && !empty($_POST['email']) && 
        isset($_POST['mobile']) && !empty($_POST['mobile'])) {
        
        // Assigner les valeurs des champs 'nom', 'prenom', 'email', 'mobile' à des variables
        $user_nom = $_POST['Nom'];
        $user_prenom = $_POST['prenom'];
        $user_email = $_POST['email'];
        $user_mobile = $_POST['mobile'];
        
        // Fonction pour sécuriser les données entrantes
        function sécurisation($data){
            $data = trim($data);         
            $data = stripcslashes($data); 
            $data = htmlspecialchars($data);
            return $data; 
        }

        // Appliquer la fonction de sécurisation à chaque donnée venant de l'utilisateur
        $data_nom = sécurisation($_POST['Nom']);
        $data_prenom = sécurisation($_POST['prenom']);
        $data_email = sécurisation($_POST['email']);
        $data_mobile = sécurisation($_POST['mobile']);
        
        // Informations de connexion à la base de données
        $serveur = 'localhost';
        $login = 'root';
        $password = '';
        $connexion = new PDO("mysql:host=$serveur;dbname=test2", $login, $password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparer la requête d'insertion dans la table 'Visiteurs'
        $requete = $connexion->prepare("INSERT INTO Visiteurs (Nom, prenom, email, mobile) 
                                         VALUES (:Nom, :prenom, :email, :mobile)");

        // Lier les variables sécurisées aux paramètres de la requête
        $requete->bindParam(':Nom', $data_nom);
        $requete->bindParam(':prenom', $data_prenom);
        $requete->bindParam(':email', $data_email);
        $requete->bindParam(':mobile', $data_mobile);

        // Exécution de la requête
        $requete->execute();
        echo "Données insérées avec succès.";
        // selectionner les identifiants de nos utilisateurs avec la commande sélect
        $requete = $connexion->prepare("SELECT * FROM Visiteurs WHERE Nom = :nom AND Prenom = :prenom 
        AND email = :email AND mobile = :mobile");
        // Exécution de la requête sous forme de trableau array
        $requete -> execute([
            ':Nom' => $data_nom,
            ':prenom' => $data_prenom,
            ':email' => $data_email,
            ':mobile' => $data_mobile,
        ]);
        if ($requete ->row_coun() > 0 ){
             echo "l'utilisateur est bien connecter";
        }else{
            echo "l'utilisateur n'est pas connecter ";
        }

    }
} catch (Exception $e) {
    // Afficher l'erreur si une exception est levée
    echo "Il y a une erreur : " . $e->getMessage();
}
?>