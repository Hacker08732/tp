<?php
// cette page permet la modification des données d'un utilisateur existant
session_start();
if (!isset($_SESSION['auth']) || $_SESSION['auth']!==true) {
    header('Location: ../login.php');
    exit();
} 
//Toujours, on se connecte a la bdd, d'abord
require("database.php");

//Simplification de la declaration et initialisation des vars a une seul val
$success = $error="";

//depuis la balise a avec val = 'modifier' de afficher.php
if( isset($_GET["id"]) )
{
    if(!empty($_GET["id"]))
    {
        $id = strip_tags($_GET["id"]);
        $req = $pdo->prepare("SELECT * FROM users WHERE id=:id");
        $req->execute(["id" => $id ]);
        $user = $req->fetch(PDO::FETCH_ASSOC); 
    }
    else{
        header("Location: update.php");
        echo "Erreur!";
    }
}else{
    header("Location: ../users.php");
}

//Traitement du formulaire de modification
if( isset( $_POST["id"] ) && isset( $_POST["nom"] ) && isset( $_POST["prenom"] ) && isset( $_POST["email"] ) ){

    $id = strip_tags($_POST["id"]);
    $nom = strip_tags($_POST["nom"]);
    $prenom = strip_tags($_POST["prenom"]);
    $email = strip_tags($_POST["email"]);
        
        //Mise a jour des information dans la base de donnée
        $req = $pdo->prepare("UPDATE users SET nom=:nom, prenom=:prenom, email=:email WHERE id=:id");
        $stmt = $req->execute(["id"=> $id,"nom"=> $nom, "prenom" => $prenom, "email"=>$email]);

        if($stmt)
        {
            $success="Votre modification a ete bien effectue!";
            header("Location: ../users.php");
            echo $success;
        }else{
            header("Location: ../users.php");
            $error="Une erreur lors de la modification de vos donnees!";
            echo $error;
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
    <style>
        body {
            background: linear-gradient(135deg, #4f8cff 0%, #3358d1 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-card {
            background: #fff;
            border-radius: 1.2rem;
            box-shadow: 0 4px 32px rgba(80,120,200,0.13);
            padding: 2.5rem 2rem;
            max-width: 600px;
            width: 100%;
        }
        .register-card .form-control:focus {
            border-color: #4f8cff;
            box-shadow: 0 0 0 0.2rem rgba(79,140,255,.15);
        }
        .register-card .logo {
            width: 60px;
            height: 60px;
            background: #eaf1ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem auto;
            font-size: 2rem;
            color: #4f8cff;
        }
        .register-card .btn-primary {
            background: linear-gradient(90deg, #4f8cff 0%, #3358d1 100%);
            border: none;
        }
        .register-card .btn-primary:hover {
            background: linear-gradient(90deg, #3358d1 0%, #4f8cff 100%);
        }
        @media (max-width: 575.98px) {
            .register-card {
                padding: 2rem 1rem;
            }
        }
    </style><!---->
</head>
<body>
    <!-- <h1 class="text-primary">Hello World</h1> -->
    <div class="container">
        
        <div class="row justify-content-center">

            <div class="col-md-6 col-lg-7 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Modification</h1>
                    </div>
                    <div class="card-body">
                        <?php if(!empty($success)): ?>
                            <div class="row alert alert-success">
                                <span class="text-center">
                                    <?php echo $success ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($error)): ?>
                            <div class="row alert alert-danger">
                                <span class="text-center">
                                    <?php echo $error ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="" class="form-control">
                            <input type="hidden" name="id" value="<?php echo $user['id'] ?>" >

                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" name="nom" value="<?php echo $user['nom'] ?>" class ="form-control" required />
                                
                            </div>
                            
                            <div class="form-group">
                                <label for="prenom">Prenom :</label>
                                <input type="text" name="prenom" value="<?php echo $user['prenom'] ?>" class ="form-control" required />
                                
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="<?php echo $user['email'] ?>" class ="form-control" required />
                                
                            </div>

                            <input type="submit" class="btn btn-primary" value="Modifier" />
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../assets/js/bootstrap.js" type="text/javascript"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>