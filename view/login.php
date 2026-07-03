<?php require_once "../controller/UtilisateurController.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tp_boutique/view/css/login.css">
    <title>Login</title>
</head>

<body>
    <div class="bulle"><img class="b" src="/tp_boutique/view/css/images/bule.gif"></div>
    <main class="main">
        
        <div class="form_wrapper">
            <header class="header">
                <img class="image" src="/tp_boutique/view/css/images/cartshopp.gif" alt="logo en forme de panier de course qui bouge"></img>
                <h1>Connexion</h1>
            </header>
            <div class="wrapper">
                <form class="formulaire" action="../controller/UtilisateurController.php" method="POST" class="form">
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required />
                    </div>

                    <div>
                        <label for="password">Mot de passe</label>
                        <input type="text" name="password" id="password" required />
                    </div>

                    <div>
                        <input class="button-71" type="submit" value="Se connecter" />
                    </div>

                </form>
            </div>
            <p>Vous n'avez pas encore de compte ? <a href="/tp_boutique/view/register.php">S'inscrire ici</a></p>
            </div>
            
    </main>
    </div>







</body>

</html>