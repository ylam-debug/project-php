<?php
$host = 'mysql';
$user = 'root';
$password = 'rootpassword';
$db = 'etudiants';

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];

$stmt = $conn->prepare("INSERT INTO etudiant (nom, prenom, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nom, $prenom, $email);
$stmt->execute();

echo "Étudiant inscrit avec succès!";
$stmt->close();
$conn->close();
?>
