<?php
session_start();
if (!isset($_SESSION['auth']) || $_SESSION['auth']!==true) {
    header('Location: ../login.php');
    exit();
} 
include('database.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['titre']) && isset($_POST['description']) && isset($_FILES['image']) && ($_FILES['image']['error'] === 0)) {
        $titre = strip_tags(($_POST['titre']));
        $description = strip_tags(($_POST['description']));

            // Vérifier et créer le dossier s'il n'existe pas
        if (!is_dir('../uploads/')) {
            mkdir('../uploads/', 0777, true);
        }
    
            $nomTemporaire = $_FILES['image']['tmp_name']; 
            $nomFichier = basename($_FILES['image']['name']); 
            $cheminDestination = '../uploads/'.$nomFichier;// pour le stockage de l'image
            $cheminBDD = 'uploads/'.$nomFichier; // pour la base de données
            

            if (move_uploaded_file($nomTemporaire, $cheminDestination)) {
                $req = $pdo->prepare("INSERT INTO annonces(titre,description,image) VALUES (:titre, :description,:image)");
                $stmt = $req->execute([
                    "titre" => $titre,
                    "description" =>$description,
                    "image" =>$cheminBDD      
                ]);
                if($stmt){
                    header("Location: ../affichage_annonce.php");
                    exit();
                }else  echo "Erreur lors de l'upload.";
            } else {
                echo "Erreur lors de l'upload.";
            }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
}








?>