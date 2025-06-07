<?php 
session_start();
//include("includes/head.php");
include("includes/database.php");

//message d'erreur a mettre si email ou mot de passe n'est pas correct
$error = "mot de passe ou email incorrect!";

//echo("hey");  operation de test

if( isset($_POST['email']) && isset($_POST['password'] ) )
{
    if( !empty($_POST['email']) && !empty($_POST['password']) )
    {
        $email = strip_tags($_POST['email']);
        $password = $_POST['password'];

        try
        {
            $req = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $req->execute(['email' => $email]);
            $user = $req->fetch(PDO::FETCH_ASSOC);
                       
            //si user n'existe pas
            if( !$user )
            {
                header('Location:login.php?error=');
                exit();
            }
                //user existe - ok, verifions mot de passe :
                if( password_verify( $password, $user['mot_de_passe']) )
                {
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'nom' => $user['nom'],
                        'prenom' => $user['prenom'],
                        'email' => $user['email']
                    ];
                    $_SESSION['auth'] = true;
                    header('Location:index.php');
                    exit();
                } else {
                 header('Location:login.php?error=$error');
                    exit();
                }
            
        }catch(PDOException $e){
            echo "<script>alert(\"".$e->getMessage()."\")</script>";
        }

   }

}
else
{
    header('Location:login.php');
    $error = "mot de passe ou email incorrect!";
    exit();
}
?>