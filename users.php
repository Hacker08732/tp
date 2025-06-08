<?php
//Démarrage de la session pour gérer l'authentification
session_start();
//Vérification si l'utilisateur est connecté
if (!isset($_SESSION['auth']) || $_SESSION['auth']!==true) {
    //redirection vers la page login s'il n'est pas connecté
    header('Location: login.php');
    exit();//Arêt de l'exécution du script
}
include("includes/head.php"); 
include('includes/database.php');
//Récupération de tout les utilisateurs depuis la base de données 
$req = $pdo->query("SELECT * FROM users");
$users = $req->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<body>
    <div id="mon_div">
   
   <div class="row justify-content-end mt-5">
        <div class="col-md-3">
            <a href="register.php" class="btn btn-primary">
                Enregister un utilisateur
            </a>
        </div>
    </div>
    <div class="col-md- table-responsive" >
        <div class=" p-4 ">
            <h2></h2>
                <table class="table table-bordered table-striped">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user["id"]; ?> <br>  </td> 
                        <td><?php echo $user["nom"]; ?> <br>  </td>
                        <td><?php echo $user["prenom"]; ?><br> </td>
                        <td><?php echo $user["email"]; ?><br>  </td>
                        <td>    
                          <a class="btn btn-primary btn_modif"href="includes/update.php?id=<?php echo $user["id"];?>"><img src="assets/icons/pencil-square.svg" alt="icône de modification" ></a>
                          <a class="btn btn-danger btn_supp"href="includes/delete.php?id=<?php echo $user["id"];?>" ><img src="assets/icons/trash3.svg" alt="icône de supression" ></a> 
                        </td>
                    </tr>   
                        <?php endforeach; ?>  
            </table>
        </div>
    </div>
</div>    
<?php include("includes/footer.php"); ?>
 










<script>/*
const btn_modif = document.querySelectorAll(".btn_modif");
const btn_supp = document.querySelectorAll(".btn_supp");
const mon_div = document.getElementById("mon_div");


btn_modif.forEach(btn => {
    btn.addEventListener("click", function(){
        mon_div.textContent = "Bien";
    });
});
    <form method="post" action="">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prénom" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Votre e-mail" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="mot_de_passe" class="form-label">Mot de passe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="password_confirm" class="form-label">Confirmer le mot de passe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirmez le mot de passe" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2">Modifier</button>
        </form> 
    });*/

</script>
  
</body>
</html>
   