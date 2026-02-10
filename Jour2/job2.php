<?php

class Livre{

    private string $titre;
    private string $auteur;
    private int $nbrPages;

    public function __construct(string $titre, string $auteur, int $nbrPages){

        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->nbrPages = $nbrPages;
    }

    public function getTitre() {
        echo $this->titre . "<br>";
    }

    public function getAuteur() {
        echo $this->auteur . "<br>";
    }

    public function getNbrPages() {
        echo $this->nbrPages . "<br>";
    }

    public function setTitre(string $e) {
        $this->titre = $e;
    }

    public function setAuteur(string $e) {
        $this->auteur = $e;
    }

    public function setNbrPages(int $e) {
        if ($e > 0) {
            $this->nbrPages = $e;
        } else {
            echo "Erreur : Vous devez entrer un entier strictement positif !<br>";
        }
    }

}

$livre = new Livre("Le Rouge et le Noir", "Stendhal", 544);

$livre->getTitre();
$livre->getAuteur();
$livre->getNbrPages();

$livre->setTitre("Le meilleur des mondes");
$livre->setAuteur("Huxley");

$livre->setNbrPages(-12);
$livre->setNbrPages(0);
$livre->setNbrPages(389);

$livre->getTitre();
$livre->getAuteur();
$livre->getNbrPages();

?>