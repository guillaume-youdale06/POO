<?php

class Rectangle{

    private float $longueur;
    private float $largeur;

    public function __construct(float $longueur=1, float $largeur=1){

        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    public function perimetre() {
        return $this->longueur * 2 + $this->largeur * 2;
    }

    public function surface() {
        return $this->longueur * $this->largeur;
    }

    public function getLongueur() {
        return $this->longueur;
    }

    public function getLargeur() {
        return $this->largeur;
    }

    public function setLongueur(float $e) {
        $this->longueur = $e;
    }

    public function setLargeur(float $e) {
        $this->largeur = $e;
    }

}

class Parallelepipede extends Rectangle{

    private float $hauteur;

    public function __construct(float $longueur=1, float $largeur=1, float $hauteur = 1){

        parent::__construct($longueur, $largeur);
        $this->hauteur = $hauteur;
    }

    public function getHauteur() {
        return $this->hauteur;
    }

    public function setHauteur(float $e) {
        $this->hauteur = $e;
    }

    public function volume() {
        return $this->getLongueur() * $this->getLargeur() * $this->getHauteur();
    }

}

$rectangle = new Rectangle();

$rectangle->getLongueur();
$rectangle->getLargeur();

$rectangle->setLongueur(6);
$rectangle->setLargeur(4);

$rectangle->getLongueur();
$rectangle->getLargeur();

echo "Perimetre : " . $rectangle->perimetre() . "<br>";
echo "Surface : " . $rectangle->surface() . "<br>";

$parallelepipede = new Parallelepipede();

$parallelepipede->getLongueur();
$parallelepipede->getLargeur();
$parallelepipede->getHauteur();

$parallelepipede->setHauteur(2);
echo "Volume : " . $parallelepipede->volume() . "<br>";
$parallelepipede->setLongueur(7);
echo "Volume : " . $parallelepipede->volume() . "<br>";

?>