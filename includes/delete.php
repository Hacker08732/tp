<?php
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
        $req = $pdo->prepare("DELETE FROM users WHERE id=:id");
        $stmt = $req->execute(['id'=> $id]);
        
        if($stmt)
        {
            header("Location: ../users.php");
        }
        else{
            echo "Erreur!";
        }
    }else{
         header("Location: ../users.php");
    }
}else{
     header("Location: ../users.php");
}
?>