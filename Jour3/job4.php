<?php

class Forme{

    public function aire() {
        return 0;
    }

}

class Rectangle extends Forme{

    private float $largeur;
    private float $hauteur;

    public function __construct(float $largeur=1, float $hauteur=1){

        $this->largeur = $largeur;
        $this->hauteur = $hauteur;
    }

    public function aire() {
        return $this->getLargeur() * $this->getHauteur();
    }

    public function getLargeur() {
        return $this->largeur;
    }

    public function getHauteur() {
        return $this->hauteur;
    }

    public function setLargeur(float $e) {
        $this->largeur = $e;
    }

    public function setHauteur(float $e) {
        $this->hauteur = $e;
    }

}

$rectangle = new Rectangle();

echo "Largeur : " . $rectangle->getLargeur() . "<br>";
echo "Hauteur : " . $rectangle->getHauteur() . "<br>";

$rectangle->setLargeur(6);
$rectangle->setHauteur(4);

echo "Largeur : " . $rectangle->getLargeur() . "<br>";
echo "Hauteur : " . $rectangle->getHauteur() . "<br>";

echo "Aire : " . $rectangle->aire() . "<br>";

?>