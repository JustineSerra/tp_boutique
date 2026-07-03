<?php include_once __DIR__ . "/layout/header.php";
?>

<!-- //LE FOR EACH DE MERDE faut pas faire attention au undefined $produit c un bug-->
<div class="card_wrapper">
    <?php foreach ($produits as $produit): ?>

        <div class="card">
            <h2 class="title"><?= htmlspecialchars($produit->getNom()) ?></h2>

            <div class="price">
                <?= number_format($produit->getPrix(), 2, ',', ' ') ?><p>€</p>
            </div>

            <p><?= htmlspecialchars($produit->getDescription()) ?></p>

            <a class="cart-button"
                href="view/panier.php?id=<?= $produit->getId() ?>">
                Ajouter au panier
            </a>
        </div>

    <?php endforeach; ?>
</div>
</div>









<?php include_once __DIR__ . "/layout/footer.php";
?>