<?php 
//cette page traite les données de l'inscription
include('database.php');
//démarrage de la session
session_start();
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
   $nom = strip_tags(($_POST['nom']));
   $prenom = strip_tags(($_POST['prenom']));
   $email = strip_tags(($_POST['email']));
   $mot_de_passe = password_hash($_POST['mot_de_passe'],PASSWORD_DEFAULT);

   $req = $pdo->prepare("INSERT INTO users(nom,prenom,email,mot_de_passe) VALUES (:nom,:prenom,:email,:mot_de_passe)");
   $stmt = $req->execute([
        "nom" => $nom,
        "prenom" =>$prenom,
        "email" =>$email,
        "mot_de_passe" =>$mot_de_passe
   ]);
    if($stmt) {
        // Récupérer l'utilisateur nouvellement créé, par exemple avec lastInsertId()
        $id = $pdo->lastInsertId();
        $req = $pdo->prepare("SELECT * FROM users WHERE id = :id");
        $req->execute(["id" => $id]);
        $user = $req->fetch(PDO::FETCH_ASSOC);

        // Enregistre les infos en session
        $_SESSION['user'] = [
           'id' => $user['id'],
           'nom' => $user['nom'],
           'prenom' => $user['prenom'],
           'email' => $user['email']
        ];
        $_SESSION['auth'] = true;

        header("Location: ../index.php");
        exit();
    } else {
        // En cas d'erreur, redirige vers la page d'inscription ou affiche un message
        header("Location: ../register.php?cet utilisateur n'existe pas");
        exit();
    }
}else {
    header("Location:../register.php");
    exit();
}

 
?>