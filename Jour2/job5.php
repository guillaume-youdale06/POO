<?php

class Voiture{

    private string $marque;
    private string $modele;
    private int $annee;
    private float $kilometrage;
    private bool $en_marche;
    private float $reservoir;

    public function __construct(string $marque, string $modele, int $annee, float $kilometrage = 0, bool $en_marche = False, float $reservoir = 50){

        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->kilometrage = $kilometrage;
        $this->en_marche = $en_marche;
        $this->reservoir = $reservoir;
    }

    public function getMarque() {
        return $this->marque;
    }

    public function getModele() {
        return $this->modele;
    }

    public function getAnnee() {
        return $this->annee;
    }

    public function getKilometrage() {
        return $this->kilometrage;
    }

    public function getEnMarche() {
        return $this->en_marche;
    }

    public function setMarque(string $e) {
        $this->marque = $e;
    }

    public function setModele(string $e) {
        $this->modele = $e;
    }

    public function setAnnee(int $e) {
        $this->annee = $e;
    }

    public function setKilometrage(float $e) {
        $this->kilometrage = $e;
    }

    public function setReservoir(float $e) {
        $this->reservoir = $e;
    }

    private function verifier_plein() {
        return $this->reservoir;
    }

    public function demarrer() {
        if($this->verifier_plein() > 5) {
            $this->en_marche = True;
            echo "La voiture démarre !<br>";
        } else {
            echo "Pas assez d'essence !<br>";
        }
    }

    public function arreter() {
        $this->en_marche = False;
        echo "La voiture s'arrête !<br>";
    }
}

$voiture = new Voiture("Audi", "Audi Q5", 2026);

$voiture->demarrer();
$voiture->arreter();

$voiture = new Voiture("Audi", "Audi Q5", 2026, 0, False, 3);

$voiture->demarrer();

?>