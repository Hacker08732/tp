 <?php
 include("includes/database.php");
  $email = strip_tags($_POST['email']);
  $password = $_POST['password'];

        try
        {
            $req = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $req->execute(['email' => $email]);
            $user = $req->fetch(PDO::FETCH_ASSOC);
            
                //user existe - ok, verifions mot de passe :
if (!$user) {
    echo"OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOHHHH";
}else{
    if( password_verify( $password, $user['mot_de_passe']) ) {
    echo"OOOOOOOOOOOOEEEEEEEEEEEEEEEEEEEEEEEEEEEOOOOOOOOHHHH";
} else {
    // Pour déboguer, afficher les deux valeurs (à enlever en production)
    echo "Mot de passe fourni: " . $password . "<br>";
    echo "Hash stocké: " . $user['mot_de_passe'] . "<br>";
    exit();
}}
        }catch(PDOException $e){
            echo "<script>alert(\"".$e->getMessage()."\")</script>";
        }

 ?>