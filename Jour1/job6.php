<?php

class Personnage{

    private array $plateau;

    private int $x;
    private int $y;

    public function __construct(int $x = 0, int $y = 0, array $plateau = [
        [0, 0, 0],
        [0, 0, 0],
        [0, 0, 0]
    ]) {

        $this->x = $x;
        $this->y = $y;
        $this->plateau = $plateau;
    }

    public function gauche() {
        if($this->x > 0) {
            $this->x -= 1;
        }
    }

    public function droite() {
        if($this->x < count($this->plateau[0]) - 1) {
            $this->x += 1;
        }
    }

    public function bas(){
        if($this->y < count($this->plateau) - 1) {
            $this->y += 1;
        }
    }

    public function haut(){
        if($this->y > 0) {
            $this->y -= 1;
        }
    }

    public function position(){
        echo "(" . $this->x . ", " . $this->y . ")<br>";

    }
}

$personnage = new Personnage;
$personnage->position();
$personnage->gauche();
$personnage->position();
$personnage->droite();
$personnage->position();
$personnage->droite();
$personnage->position();
$personnage->haut();
$personnage->position();
$personnage->bas();
$personnage->position();
$personnage->gauche();
$personnage->position();
$personnage->bas();
$personnage->position();

?>