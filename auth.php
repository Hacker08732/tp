<?php 
session_start();

include("includes/database.php");

//message d'erreur a mettre si email ou mot de passe n'est pas correct


//Vérifier si l'email et le mot de passe ont été bien envoyé via le formulaire
if( isset($_POST['email']) && isset($_POST['password'] ) )
{
    //Vérifier si les champs ne sont pas vides
    if( !empty($_POST['email']) && !empty($_POST['password']) )
    {
        $email = strip_tags($_POST['email']);
        $password = $_POST['password'];

        try
        {
            $req = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $req->execute(['email' => $email]);
            $user = $req->fetch(PDO::FETCH_ASSOC);
                       
            //vérifie l'existence de l'utilisateur
            if( !$user )
            {
                header('Location:login.php?error');
                exit();
            }else{
                //verifie si le mot de passe enter dans le formulaire corresponds à celui de la base de donnée
                if( password_verify( $password, $user['mot_de_passe']) )
                {
                    //création de la session utilisateur
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'nom' => $user['nom'],
                        'prenom' => $user['prenom'],
                        'email' => $user['email']
                    ];
                    $_SESSION['auth'] = true;
                    //si le mot de passe est correct, l'utilisateur est rediriger vers l'index 
                    header('Location:index.php');
                    exit();
                } else {
                    //sinon l'utilisateur est rediriger vers le login  
                 header('Location:login.php?error');
                    exit();
                }
            }
            
        }catch(PDOException $e){
            echo "<script>alert(\"".$e->getMessage()."\")</script>";
        }

   }

}
else
{
    // redirection en absence des champs
    header('Location:login.php');
    exit();
}
?>