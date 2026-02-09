<?php

class Operation{

    private int $nombre1;
    private int $nombre2;

    public function __construct(int $nombre1 = 1, int $nombre2 = 1) {
        $this->nombre1 = $nombre1;
        $this->nombre2 = $nombre2;
    }

    public function getNombre() {
        echo "Le nombre 1 : " . $this->nombre1 . "<br>
              Le nombre 2 : " . $this->nombre2;
    }

    public function addition(){
        echo "L'addition des deux nombres : " . $this->nombre1 + $this->nombre2;
    }
}

$operation = new Operation();
$operation->addition();

?>