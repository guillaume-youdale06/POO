<?php

class Point{

    private int $x;
    private int $y;

    public function __construct(int $x = 0, int $y = 0) {
        $this->x = $x;
        $this->y = $y;
    }

    public function afficherLesPoints() {
        echo "(" . $this->x . ", " . $this->y . ")<br>";
    }

    public function afficherX() {
        echo $this->x . "<br>";
    }

    public function afficherY(){
        echo $this->y . "<br>";
    }

    public function changerX(int $e){
        $this->x = $e;
    }

    public function changerY(int $e){
        $this->y = $e;
    }
}

$unPoint = new Point();

$unPoint->afficherLesPoints();
$unPoint->afficherX();
$unPoint->afficherY();

$unPoint->changerX(4);
$unPoint->changerY(6);
$unPoint->afficherLesPoints();
$unPoint->afficherX();
$unPoint->afficherY();

?>