 <?php
 //démarrage de la session
 session_start();
include("includes/head.php"); ?>
                    <div class="col-md-4">
                        <div class="card p-4 text-center">
                            <a href="users.php" class="nav-link <?php echo ($currentPage === 'users.php') ? 'active' : ''; ?>">
                                <i class="bi bi-people display-5 text-primary mb-2"></i>
                            </a>
                            <h5>Utilisateurs</h5>
                            <p class="mb-0">Gérez vos utilisateurs facilement.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-4 text-center">
                            <a href="affichage_annonce.php" class="nav-link <?php echo ($currentPage === 'affichage_annonce.php') ? 'active' : ''; ?>">
                               <i class="bi bi-image display-5 text-success mb-2"></i> 
                            </a>
                            <h5>Annonces</h5>
                            <p class="mb-0">Gérer vos annonces.</p>
                        </div>
                    </div>
                   <!--<div class="col-md-4">
                        <div class="card p-4 text-center">
                            <i class="bi bi-gear display-5 text-warning mb-2"></i>
                            <h5>Paramètres</h5>
                            <p class="mb-0">Personnalisez votre expérience.</p>
                        </div> -->
                    </div>
                </div>
<?php include("includes/footer.php"); ?>
