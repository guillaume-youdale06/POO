<?php

class Personne{

    private string $nom;
    private string $prenom;

    public function __construct(string $nom = "Doe", string $prenom = "John") {
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    public function SePresenter() {
        echo "Je suis " . $this->prenom . " " . $this->nom . "<br>";
    }
}

$personne1 = new Personne();
$personne2 = new Personne("Dupont", "Jean");
$personne3 = new Personne("Youdale", "Guillaume");

$personne1->SePresenter();
$personne2->SePresenter();
$personne3->SePresenter();

?>