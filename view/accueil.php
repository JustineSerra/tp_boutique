<?php include_once __DIR__ . "/layout/header.php";
?>

<!-- //LE FOR EACH DE MERDE faut pas faire attention au undefined $produit c un bug-->

<?php foreach ($produits as $produit): ?>

    <?= htmlspecialchars($produit->getNom()) ?>
    <?= number_format($produit->getPrix(), 2, ',','') ?>
    <?= htmlspecialchars($produit->getDescription()); ?>
<?php endforeach; ?>