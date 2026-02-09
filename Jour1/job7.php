<?php

class Cercle{

    private float $rayon;

    public function __construct(float $rayon = 1){

        $this->rayon = $rayon;
    }

    public function changerRayon(float $nvRayon) {
        $this->rayon = $nvRayon;
    }

    public function afficherInfos() {
        echo "Rayon : " . $this->rayon . "<br>";
        echo "Circonférence " . $this->circonference() . "<br>";
        echo "Aire : " . $this->aire() . "<br>";
        echo "Diamètre : ". $this->diametre() . "<br>";
    }

    public function diametre(){
        return $this->rayon * 2;
    }

    public function aire(){
        return pi() * $this->rayon * $this->rayon;
    }

    public function circonference(){
        return pi() * $this->diametre();

    }
}

$cercle1 = new Cercle(4);
$cercle2 = new Cercle(7);

$cercle1->afficherInfos();
echo "<br>";
$cercle2->afficherInfos();

?>