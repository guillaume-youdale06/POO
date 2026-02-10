<?php

class Rectangle{

    private float $longueur;
    private float $largeur;

    public function __construct(float $longueur, float $largeur){

        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    public function getLongueur() {
        echo $this->longueur . "<br>";
    }

    public function getLargeur() {
        echo $this->largeur . "<br>";
    }

    public function setLargeur(float $e) {
        $this->largeur = $e;
    }

    public function setLongueur(float $e) {
        $this->longueur = $e;
    }

}

$rectangle = new Rectangle(10, 5);

$rectangle->getLongueur();
$rectangle->getLargeur();

$rectangle->setLongueur(15);
$rectangle->setLargeur(3);

$rectangle->getLongueur();
$rectangle->getLargeur();

?>