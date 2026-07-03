<?php

declare(strict_types=1);

require_once __DIR__ . '/../repository/CommandeRepository.php';
require_once __DIR__ . '/../repository/DetailCommandeRepository.php';
require_once __DIR__ . '/../repository/ProduitRepository.php';
require_once __DIR__ . '/../model/DetailCommande.php';
require_once __DIR__ . '/../model/Commande.php';

class CommandeController
{
    private CommandeRepository $CommandeRepository;
    private DetailCommandeRepository $DetailCommandeRepository;

    public function __construct()
    {
        $this->CommandeRepository = new CommandeRepository();
        $this->DetailCommandeRepository = new DetailCommandeRepository();
    }

    //on ajoute un produit au panier en utilisant l'identifiant du produit passé en paramètre de la requête POST.  
    public function ajouterPanier(): void
    {
        $productId = (int) ($_POST['product_id'] ?? 0);

        if ($productId <= 0) {
            header('Location: index.php?route=accueil');
            exit;
        }
        //Si le panier n'existe pas encore dans la session, il est créé
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }

        if (!isset($_SESSION['panier'][$productId])) {
            $_SESSION['panier'][$productId] = 1;
        } else {
            //Si le produit est déjà présent dans le panier, sa quantité est incrémentée.
            $_SESSION['panier'][$productId]++;
        }
        //Enfin, l'utilisateur est redirigé vers la page d'accueil.
        header('Location: index.php?route=accueil');
        exit;
    }

    // Construit le détail du panier (produit, quantité, sous-total) à partir de la session
    private function construireLignesPanier(): array
    {
        $panier = $_SESSION['panier'] ?? [];
        $produitRepository = new ProduitRepository();
        $lignesPanier = [];

        foreach ($panier as $productId => $quantite) {
            $produit = $produitRepository->findById($productId);

            if ($produit === null) {
                continue;
            }

            $sousTotal = $produit->getPrix() * $quantite;

            $lignesPanier[] = [
                'produit'   => $produit,
                'quantite'  => $quantite,
                'sousTotal' => $sousTotal,
            ];
        }

        return $lignesPanier;
    }

    // Calcule le total à partir des lignes déjà construites
    public function calculTotal(array $lignesPanier): float
    {
        $sousTotaux = array_column($lignesPanier, 'sousTotal');
        $total = array_sum($sousTotaux);
        return $total;
    }

    // Affiche la page panier
    public function afficherPanier(): void
    {
        $lignesPanier = $this->construireLignesPanier();
        $total = $this->calculTotal($lignesPanier);

        require __DIR__ . '/../view/panier.php';
    }

    public function modifierQuantite(): void
    {
        $productId = (int) ($_POST['product_id'] ?? 0);
        $action = $_POST['action'] ?? '';

        //on vérifie que le produit existe dans le panier
        if (isset($_SESSION['panier'][$productId])) {
            if ($action === 'plus') {
                $_SESSION['panier'][$productId]++;
            } elseif ($action === 'moins') {
                $_SESSION['panier'][$productId]--;
                //si la quantité devient 0, on supprime le produit du panier
                if ($_SESSION['panier'][$productId] <= 0) {
                    unset($_SESSION['panier'][$productId]);
                }
            }
        }
        header('Location: index.php?route=panier');
        exit;
    }

    public function supprimerDuPanier(): void
    {
        $productID = (int) ($_POST['product_id'] ?? 0);

        if (isset($_SESSION['panier'][$productID])) {
            unset($_SESSION['panier'][$productID]);
        }
        header('Location: index.php?route=panier');
        exit;
    }

    public function viderPanier(): void
    {
        unset($_SESSION['panier']);
        header('Location: index.php?route=panier');
        exit;
    }

    public function validerCommande(): void
    {
        if (isset($_SESSION["user_id"])) {
            if (!empty($_SESSION['panier'])) {
                $lignesPanier = $this->construireLignesPanier();
                $total = $this->calculTotal($lignesPanier);

                $commande = $this->add((int)$_SESSION["user_id"], $total);
                
                foreach ($lignesPanier as $ligne) {
                    $detail = new DetailCommande (
                        0, //id remplacé par lastInsertId()
                        $commande->getId(), //id de la commande qu'on vient de créer
                        $ligne['produit']->getId(), //id du produit
                        $ligne['quantite'], //la quantité qui vient d'être commandée
                        $ligne['produit']->getPrix() //le prix actuel du produit au moment de la commande
                    );
                    $this->DetailCommandeRepository->create($detail);
                }

                unset($_SESSION['panier']);
                header('Location: index.php?route=historique');
             
            } else {
                header('Location: index.php?route=panier');
                exit;
            }
        } else {
            header('Location: index.php?route=login');
            exit;
        }
    }

    public function historique(): void
    {
        $id = (int) $_SESSION['user_id'];

        $listCommandes = $this->CommandeRepository->getOrdersByUserId($id);

        require __DIR__ . '/../view/historique.php';
    }

    public function add(int $userId, float $total): Commande
    {
        $dateDuJour = date("Y-m-d");
        $commande = new Commande(null, $userId, $dateDuJour, $total);
        return $this->CommandeRepository->addOrder($commande);
    }
}
