<?php
// Déclaration des variables pour la connexion à la base de données
$serveur = "localhost"; // Nom du serveur
$login = "root";        // Identifiant utilisateur MySQL
$password = "";         // Mot de passe utilisateur MySQL

// Variables pour stocker les valeurs à insérer
$nom = "";              // Nom
$prenom = "";           // Prénom
$email = "";            // Email
$mobile = "";           // Mobile
$sexe="";               //sexe
try {
    // Connexion à la base de données avec PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=test2", $login, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Modification de la table pour ajouter le champ "mobile" (exécute une seule fois si le champ n'existe pas déjà)
    $connexion->exec("ALTER TABLE Visiteurs ADD sexe VARCHAR(15)");

    // Préparation de la requête SQL avec des paramètres nommés
    $requete = $connexion->prepare("INSERT INTO Visiteurs (nom, prenom, email, mobile,sexe) 
    VALUES (:nom, :prenom, :email, :mobile,:sexe)");

    // Liaison des paramètres avec les variables
    $requete->bindParam(':nom', $nom);         // Liaison de :nom avec $nom
    $requete->bindParam(':prenom', $prenom);   // Liaison de :prenom avec $prenom
    $requete->bindParam(':email', $email);     // Liaison de :email avec $email
    $requete->bindParam(':mobile', $mobile);   // Liaison de :mobile avec $mobile
    $requete->bindParam(':sexe', $sexe);   // Liaison de :mobile avec $sexe

    // Attribution de valeurs aux variables
    $nom = "ibou";                         // Valeur du champ nom
    $prenom = "sorry";                     // Valeur du champ prénom
    $email = "sorry.ibou@gmail.com";       // Valeur du champ email
    $mobile = "779889888";                 // Valeur du champ mobile
    $sexe = "homme";                 // Valeur du champ sexe

    // Exécution de la requête préparée
    $requete->execute(); // Insère les données dans la base de données

    // Message en cas de succès
    echo "Données insérées avec succès dans la table Visiteurs.";
} catch (PDOException $e) {
    // Gestion des erreurs : affiche un message d'erreur en cas de problème
    echo "Erreur : " . $e->getMessage();
}





/*$nom = $prenom = $email = $mobile = "";
function securisation($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  return $data;
}
$nom = securisation($_POST["name"]);
$prenom = securisation($_POST["prenom"]);
$email  = securisation($_POST["email"]);
$mobile = securisation($_POST["mobile"]);

echo "ton nom est  :".$nom ."<br>";
echo "ton prenom est  :".$prenom ."<br>";
echo "ton email  est  :".$email."<br>";
echo "ton mobile  est  :".$mobile ."<br>";
?>
<?php  
 session_start();
 echo $_SESSION["nom"]= "Diallo" ."<br>";
 echo $_SESSION["prenom"]= "Sadaga Mouhamadou" ."<br>";
 echo$_SESSION["email"]= "diallopapy75@gmail.com" ."<br>";
 echo  $_SESSION["mobile"]= "771379329" ."<br>";
?>*/
    