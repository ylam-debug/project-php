<?php
// Connexion à la base de données
$mysqli = new mysqli("mysql", "root", "rootpassword", "etudiants");

// Vérifier la connexion
if ($mysqli->connect_errno) {
    die("Échec de la connexion : " . $mysqli->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$email = $_POST['email'] ?? '';

// Requête d'insertion
$sql = "INSERT INTO etudiant (nom, prenom, email) VALUES (?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $nom, $prenom, $email);

if ($stmt->execute()) {
    echo "<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <title>Inscription réussie</title>
        <meta http-equiv='refresh' content='3; url=index.html'>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f8ff;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .message {
                background: #d4edda;
                color: #155724;
                padding: 20px 30px;
                border: 1px solid #c3e6cb;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class='message'>
            <h2>Inscription réussie !</h2>
            <p>Redirection vers le formulaire dans 3 secondes...</p>
        </div>
    </body>
    </html>";
} else {
    echo "Erreur : " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
