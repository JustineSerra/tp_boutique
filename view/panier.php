<?php include_once __DIR__ . "/layout/header.php";
?>

<div class="panier_wrapper">
    <img src="/tp_boutique/view/css/images/cart1.gif">
    <div>
        <p>panier:</p>
    </div>
    <a class="cart-button-buy"
        href="">
        Acheter le panier
    </a>


</div>

<?php foreach ($lignesPanier as $ligne): ?>
            <div><?= htmlspecialchars($ligne["produit"]->getNom()) ?></div>
<div><?= $ligne["quantite"]?></div>
            <div>
                <?= number_format($ligne["sousTotal"]->getPrix(), 2, ',', ' ') ?><p>€</p>
            </div>



<?php include_once __DIR__ . "/layout/footer.php"; ?>