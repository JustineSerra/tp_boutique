<?php 

require_once __DIR__ . '/../repository/CommandeRepository.php';
require_once __DIR__ . '/../model/Commande.php';

class CommandeController {
    private CommandeRepository $commandeRepository;

    public function __construct() {
        $this->commandeRepository = new CommandeRepository();
    }

    public function historique(int $userId): void {
        $listCommandes = $this->commandeRepository->getOrdersByUserId($userId);
        
        require __DIR__ . '/../view/historique.php';
    }

    public function add(int $userId, int $total): bool {
        $dateDuJour=date("Y-m-d");
        $commande = new Commande(null, $userId, $dateDuJour, $total);
        return $this->commandeRepository->addOrder($commande);
    }
}