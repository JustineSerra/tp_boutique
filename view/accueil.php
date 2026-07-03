<?php include_once __DIR__ . "/layout/header.php";
?>

<!-- //LE FOR EACH DE MERDE faut pas faire attention au undefined $produit c un bug-->
<div class="card_wrapper">
    <?php foreach ($produits as $produit): ?>

        <div class="card">
            <h2 class="title"><?= htmlspecialchars($produit->getNom()) ?></h2>

    <?= htmlspecialchars($produit->getNom()) ?>
    <?= number_format($produit->getPrix(), 2, ',','') ?>
    <?= htmlspecialchars($produit->getDescription()); ?>
<?php endforeach; ?>
