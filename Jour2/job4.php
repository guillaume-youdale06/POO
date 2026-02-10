<?php

class Student{

    private string $nom;
    private string $prenom;
    private int $numEtudiant;
    private float $credits;
    private string $level;

    public function __construct(string $nom, string $prenom, int $numEtudiant, float $credits = 0){

        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->numEtudiant = $numEtudiant;
        $this->credits = $credits;
        $this->level = $this->studentEval();
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getNumEtudiant() {
        return $this->numEtudiant;
    }

    public function getCredits() {
        return $this->credits;
    }

    public function getLevel() {
        return $this->level;
    }

    public function add_credits(float $e) {
        if($e > 0) {
            $this->credits += $e;
            $this->level = $this->studentEval();
        } else {
            echo "Le nombre de crédits à ajouter doit être strictement positif !<br>";
        }
    }

    private function studentEval(){
        if($this->getCredits() > 89) {
            return "Excellent";
        }

        elseif($this->getCredits() > 79) {
            return "Très bien";
        }

        elseif($this->getCredits() > 69) {
            return "Bien";
        }

        elseif($this->getCredits() > 59) {
            return "Passable";
        } 
        
        else {
            return "Insuffisant";
        }
    }

    public function studentInfo() {
        echo "Nom = " . $this->getNom() . "<br>";
        echo "Prénom = " . $this->getPrenom() . "<br>";
        echo "Id = " . $this->getNumEtudiant() . "<br>";
        echo "Niveau = " . $this->getLevel() . "<br>";
    }


}

$john = new Student("Doe", "John", 145);

$john->add_credits(-12);
$john->add_credits(0);

echo $john->getCredits() . "<br>";

$john->add_credits(16);
$john->add_credits(22);
$john->add_credits(4);

echo $john->getCredits() . "<br>";

$john->studentInfo();
$john->add_credits(18);
echo $john->getCredits() . "<br>";
$john->studentInfo();
$john->add_credits(14);
echo $john->getCredits() . "<br>";
$john->studentInfo();
$john->add_credits(10);
echo $john->getCredits() . "<br>";
$john->studentInfo();
$john->add_credits(8);
echo $john->getCredits() . "<br>";
$john->studentInfo();
$john->add_credits(13);
echo $john->getCredits() . "<br>";
$john->studentInfo();


?>