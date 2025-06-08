
<?php
 // register.php : Page d'inscription Bootstrap moderne et responsive
 //Cette page permet aux utilisateurs de créer un nouveau compte
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - MonApp</title>
    <!-- Bootstrap 5 -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="assets/icons/bootstrap-icons.css" rel="stylesheet">
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
    </style>
</head>
<body>
   <!--   -->
    <div class="register-card shadow" id="divForm">
        <div class="logo mb-3">
            <i class="bi bi-person-plus-fill"></i>
        </div>
        <h2 class="text-center mb-4">Créer un compte</h2>
        <form method="post" action="includes/register_action.php" id="monForm">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom" required>
                </div>
                <small></small>
            </div>
             <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prénom" required>
                </div>
                <small></small>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Votre e-mail" required>
                </div>
                <small style="background-color: red"></small>
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
            <button type="submit" class="btn btn-primary w-100 mb-2" id="btn_ins">S'inscrire</button>
        </form>
        <div class="text-center mt-3">
            <span class="text-muted small">Déjà un compte ?</span>
            <a href="login.php" class="small text-primary">Se connecter</a>
        </div>
    </div>
   
<script>
    //Récupération de tout les éléments du DOM()
const form = document.getElementById("monForm");
const nom = document.getElementById("nom");
const prenom = document.getElementById("prenom");
const email = document.getElementById("email");
const infoNom = nom.parentElement.parentElement.querySelector("small");
const infoPrenom = prenom.parentElement.parentElement.querySelector("small");
const infoEmail = email.parentElement.parentElement.querySelector("small");

//Ecouteur d'évernement pour la soumission du formulaire
form.addEventListener("submit", function(e){
    let valid = true;
    //Réénitialisation des messages d'erreurs
    infoNom.textContent = "";
    infoPrenom.textContent = "";
    infoEmail.textContent = "";
    
    //Le nom ne doit pas contenir de chiffre
    if(/\d/.test(nom.value)){
        infoNom.textContent = "Le nom ne doit pas contenir de chiffre";
        valid = false;
    }
    
    //Le prenom ne doit pas contenir de chiffre
    if(/\d/.test(prenom.value)){
        infoPrenom.textContent = "Le prénom ne doit pas contenir de chiffre";
        valid = false;
    }

    //L'email doit respecter son format
    if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)){
        infoEmail.textContent = "Adresse email invalide";
        valid = false;
    }
    //Enpêche l'envoi du formulaire si les validations précédentes échouent
    if(!valid) e.preventDefault();
});

    /*let formulaire = document.getElementById(divForm); 
    formulaire.addEventListener()
    formulaire.innerHTML = `<form method="post" action="includes/register_action.php">
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
            <button type="submit" class="btn btn-primary w-100 mb-2">S'inscrire</button>
        </form> `;*/
  </script>
</body>
</html>
