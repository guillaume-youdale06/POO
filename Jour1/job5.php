<?php

class Animal{

    private int $age;
    private string $prenom;

    public function __construct(int $age = 0, string $prenom = "") {
        $this->age = $age;
        $this->prenom = $prenom;
    }

    public function afficherAge() {
        echo "L'age de l'animal : " . $this->age . " ans<br>";
    }

    public function vieillir(){
        $this->age += 1;
    }

    public function nommer(string $prenom){
        $this->prenom = $prenom;
        echo "L'animal se nomme " . $this->prenom;
    }
}

$animal = new Animal();
$animal->afficherAge();
$animal->vieillir();
$animal->afficherAge();
$animal->nommer("Zèbre");

?>