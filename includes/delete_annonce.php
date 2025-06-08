<?php
//vérification de l'authentification
session_start();
if (!isset($_SESSION['auth']) || $_SESSION['auth']!==true) {
    header('Location: ../login.php');
    exit();
} 
require("database.php");
if( isset($_GET["id"]) )
{
    if(!empty($_GET["id"]))
    {
        $id = strip_tags($_GET["id"]);
        $req = $pdo->prepare("DELETE FROM annonces WHERE id=:id");
        $stmt = $req->execute(['id'=> $id]);
        
        if($stmt)
        {
            header("Location: ../affichage_annonce.php");
        }
        else{
            echo "Erreur!";
        }
    }else{
         header("Location: ../affichage_annonce.php");
    }
}else{
     header("Location: ../affichage_annonce.php");
}
?>