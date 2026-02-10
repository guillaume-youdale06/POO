<?php

class Commande{

    private int $numCommande;
    private array $listePlats;
    private string $status;

    public function __construct(int $numCommande, array $listePlats, string $status = "En cours"){

        $this->numCommande = $numCommande;
        $this->listePlats = $listePlats;
        $this->status = $status;
    }

    public function ajoutPlat(string $plat, float $prix) {
        $this->listePlats[$plat] = $prix;
    }

    public function annuler() {
        $this->status = "Annulée";
    }

    private function calculTotal() {
        return array_sum($this->listePlats);
    }

    public function calculTVA(float $taux= 0.2) {
        return $this->calculTotal() * $taux;
    }

    public function afficherCommande() {
        echo "Commande n°" . $this->numCommande . "<br>";

        foreach($this->listePlats as $plat => $prix) {
            echo "$plat : $prix €<br>";
        }

        echo "Status de la commande : " . $this->status . "<br>";
        echo "Total : " . $this->calculTotal() . "€<br>";
    }
}

$commande = new Commande(13542, ["Lasagne" => 13.90, "Coca Cola" => 3.40, "Tiramisu" => 5.90]);

$commande->afficherCommande();
echo "<br>";

echo $commande->calculTVA();

//echo $commande->calculTotal(); #erreur --> appelle méthode privée

$commande->ajoutPlat("Spritz", 4.50);
$commande->afficherCommande();
echo "<br>";

$commande->annuler();
$commande->afficherCommande();
echo "<br>";

?>