<?php

class Livre{

    private string $titre;
    private string $auteur;
    private int $nbrPages;
    private bool $disponible;

    public function __construct(string $titre, string $auteur, int $nbrPages, bool $disponible = True){

        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->nbrPages = $nbrPages;
        $this->disponible = $disponible;
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

    public function verification(){
        if($this->disponible) {
            return True;
        } else {
            return False;
        }
    }

    public function emprunter(){
        if($this->verification()) {
            $this->disponible = False;
        } else {
            echo "Le livre n'est pas disponible !<br>";
        }
    }

    public function rendre(){
        if(!$this->verification()) {
            $this->disponible = True;
        } else {
            echo "Le livre n'est pas actuellement emprunté !<br>";
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

echo "<br>";

echo $livre->verification() ? "Le livre est disponible<br>" : "Le livre n'est pas disponible<br>";
$livre->emprunter();
echo $livre->verification() ? "Le livre est disponible<br>" : "Le livre n'est pas disponible<br>";
$livre->rendre();
echo $livre->verification() ? "Le livre est disponible<br>" : "Le livre n'est pas disponible<br>";
$livre->rendre();

?>