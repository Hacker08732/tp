<?php
// Cette page permet d'afficher les annonces
//démarrage de la session
session_start();
if (!isset($_SESSION['auth']) || $_SESSION['auth']!==true) {
    header('Location: login.php');
    exit();
}
include("includes/head.php"); 
include('includes/database.php');

//récupération des annonces depuis la base de donnée
$req = $pdo->query("SELECT * FROM annonces");
$images = $req->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="fr">
<body>
    <div class="col-md-3">
         <a href="insc_annonce.php" class="btn btn-primary">
            Enregister une annonce
        </a>
    </div>
    <div class="col-md- table-responsive" >
        <div class=" p-4 ">
            
            <table class="table table-bordered table-striped">
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Image</th>
                
            </tr>
            <?php foreach ($images as $image): ?>
            <tr>
                <td><?php echo $image["id"]; ?> <br>  </td> 
                <td><?php echo $image["titre"]; ?> <br>  </td>
                <td><?php echo $image["description"]; ?><br> </td>
                <td><img src="<?php echo $image["image"]; ?>" width="100"><br>  </td>
                <td>    
                    <a class="btn btn-primary btn_modif"  href="includes/update_annonce.php?id=<?php echo $image["id"];?>"><img src="assets/icons/pencil-square.svg" alt="icône de modification" ></a>
                    <a class="btn btn-danger btn_supp" href="includes/delete_annonce.php?id=<?php echo $image["id"];?>"><img src="assets/icons/trash3.svg" alt="icône de supression"></a>  
                </td>
            </tr>   
            <?php endforeach;?>  
            </table>
        </div>
    </div>
 <?php include("includes/footer.php"); ?>
 
</body>
</html>