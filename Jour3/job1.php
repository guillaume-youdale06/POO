<?php

class Personne{

    protected int $age;

    public function __construct(int $age=14){

        $this->age = $age;
    }

    public function afficherAge() {
        echo $this->age . "<br>";
    }

    public function bonjour() {
        echo "Hello<br>";
    }

    public function modifierAge(int $e) {
        $this->age = $e;
    }

}

class Eleve extends Personne{

    public function allerEnCours() {
        echo "Je vais en cours<br>";
    }

    public function afficherAge() {
        echo "J'ai " . $this->age . " ans.";
    }

}

class Professeur{
    private string $matiereEnseignee;

    public function __construct(string $matiereEnseignee){

        $this->matiereEnseignee = $matiereEnseignee;
    }

    public function enseigner() {
        echo "Le cours va commencer<br>";
    }

}

$personne = new Personne();
$eleve = new Eleve();

$eleve->afficherAge();

?>