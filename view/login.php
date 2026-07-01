<?php require_once "./controller/UtilisateurController.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <main>
        <div class="wrapper">
            <form action="UtilisateurController.php" method="POST" class="form">
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required />
                </div>

                <div>
                    <label for="password">Mot de passe</label>
                    <input type="text" name="password" id="password" required />
                </div>

                <div>
                    <input type="submit" value="Se connecter" />
                </div>
                
            </form>
        </div>
        <div>

        </div>
    </main>







</body>

</html>