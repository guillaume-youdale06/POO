<?php

class Vehicule{

    private string $marque;
    private string $modele;
    private int $annee;
    private float $prix;

    public function __construct(string $marque, string $modele, int $annee, float $prix){

        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->prix = $prix;
    }

    public function informationVehicule() {
        echo "Marque : " . $this->marque . "<br>";
        echo "Modèle : " . $this->modele . "<br>";
        echo "Année : " . $this->annee . "<br>";
        echo "Prix : " . $this->prix . "<br>";
    }

    public function demarrer() {
        echo "Attention, je roule<br>";
    }

}

class Voiture extends Vehicule{

    private int $portes;

    public function __construct(string $marque, string $modele, int $annee, float $prix, int $portes = 4){

        parent::__construct($marque, $modele, $annee, $prix);
        $this->portes = $portes;
    }

    public function informationVehicule() {
        parent::informationVehicule();
        echo "Nombre de portes : " . $this->portes . "<br>";
    }

    public function demarrer() {
        echo "Attention, ma voiture roule<br>";
    }

}

class Moto extends Vehicule{
    private int $roue;

    public function __construct(string $marque, string $modele, int $annee, float $prix, int $roue=2){

        parent::__construct($marque, $modele, $annee, $prix);
        $this->roue = $roue;
    }

    public function informationVehicule() {
        parent::informationVehicule();
        echo "Nombre de roues : " . $this->roue . "<br>";
    }

    public function demarrer() {
        echo "Attention, ma moto roule<br>";
    }
}

$mercedes = new Voiture("Mercedes", "Classe A", 2020, 18500);
$mercedes->informationVehicule();

echo "<br>";

$yamaha = new Moto("Yamaha", "1200 Vmax", 1987, 4500, 2);
$yamaha->informationVehicule();

echo "<br>";

$mercedes->demarrer();
$yamaha->demarrer();

?>