<?php

class Produit{

    private float $prixHT;
    private string $nom;
    private float $TVA;

    public function __construct(float $prixHT = 1, string $nom = "", float $TVA = 0.2){

        $this->prixHT = $prixHT;
        $this->nom = $nom;
        $this->TVA = $TVA;
    }

    public function CalculerPrixTTC() {
        return $this->prixHT + ($this->prixHT * $this->TVA);
    }

    public function afficher() {
        return "Nom du Produit : " . $this->nom . "<br>" .
               "Prix Produit : " . $this->CalculerPrixTTC(). "<br>" .
               "Prix Produit (HT) : " . $this->prixHT. "<br>" .
               "TVA : " . $this->TVA . "<br>";
    }

    public function changeNom($nvNom){
        $this->nom = $nvNom;
    }

    public function changePrix($nvPrix){
        $this->prixHT = $nvPrix;
    }
}

$stylo = new Produit(0.90, "stylo");
$cahier = new Produit(3.55, "cahier");
$ordinateur = new Produit(1438, "ordinateur");

echo $stylo->afficher();
echo $cahier->afficher();
echo $ordinateur->afficher();

$stylo->changeNom("crayon");
$cahier->changeNom("bouquin");
$ordinateur->changeNom("PC");

$stylo->changePrix(0.80);
$cahier->changePrix(4.15);
$ordinateur->changePrix(1980);

echo $stylo->afficher();
echo $cahier->afficher();
echo $ordinateur->afficher();


?>