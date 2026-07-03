<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tp_boutique/view/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Istok+Web:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>ACCUEIL</title>
</head>

<body>

    <!-- //SERIEUX C LA SEULE PARTIE FUN DU TP -->

    <header class="header">
        <div class="header_wrapper">
            <div class="rainbow"><img class="rainbow_img" src="/tp_boutique/view/css/images/rainbow.gif"></div>
            <img class="logo" src="/tp_boutique/view/css/images/cartshopp.gif" alt="logo en forme de panier">
            <div class="header_title"><img src="/tp_boutique/view/css/images/text.gif" alt="titre en gif qui brille qui dit 'Shop ton truc'">
                <p>le meilleur site e-commerce</p><img src="/tp_boutique/view/css/images/banniere.gif" alt="bannière écrit 'made in france' dans un style skyblog">
            </div>

            <!-- // affichage de CONNECTER SI ONA  PAS DEJA UNE SESSION ACTIVE (JPP) -->


            <div class="cart">

                <svg class="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Pro v7.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2026 Fonticons, Inc.-->
                    <path d="M288 0c6.6 0 12.9 2.7 17.4 7.5l144 152 .5 .5 78.1 0c17.7 0 32 14.3 32 32 0 14.5-9.6 26.7-22.8 30.7L491.1 429.9c-6.5 29.3-32.5 50.1-62.5 50.1l-281.3 0c-30 0-56-20.8-62.5-50.1l-46-207.2c-13.2-3.9-22.8-16.2-22.8-30.7 0-17.7 14.3-32 32-32l78.1 0 .5-.5 144-152C275.1 2.7 281.4 0 288 0zm0 58.9L192.2 160 383.8 160 288 58.9zM208 264c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 13.3 10.7 24 24 24s24-10.7 24-24l0-112zm80-24c-13.3 0-24 10.7-24 24l0 112c0 13.3 10.7 24 24 24s24-10.7 24-24l0-112c0-13.3-10.7-24-24-24zm128 24c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 13.3 10.7 24 24 24s24-10.7 24-24l0-112z" />
                </svg>

                <button class="frutiger-button">
                    <div class="inner">
                        <div class="top-white"></div>

                        <?php if (!isset($_SESSION['user_id'])): ?>
                            <a href="/tp_boutique/view/login.php" class="text">Se connecter</a>
                        <?php else: ?>
                            <a href="logout.php" class="button_login">Se déconnecter</a>
                        <?php endif; ?>

                    </div>
                </button>
            </div>

        </div>
        <nav>
            <ul class="header_nav">
                <li>
                    <h1>LE SHOP</h1>
                </li>
                <li>
                    <h1>NOS PRODUITS</h1>
                </li>
                <li>
                    <h1>QUI SOMMES-NOUS</h1>
                </li>
                <li>
                    <h1>CONTACT</h1>
                </li>
            </ul>
        </nav>
    </header>
