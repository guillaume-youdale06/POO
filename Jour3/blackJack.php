<?php

session_start();

class Jeu{

    private array $paquet;
    private Joueur $joueur1;
    private Joueur $joueur2;

    public function __construct(?Joueur $joueur1 = null, ?Joueur $joueur2 = null){


        $couleurConst = ["Piques", "Coeur", "Carreaux", "Trefle"];

        foreach($couleurConst as $laCouleur){
            for($i=1; $i <= 13; $i++) {
                $this->paquet[] = new Carte($i, $laCouleur);
            }
        }
        shuffle($this->paquet);

        $this->joueur1 = $joueur1 ?? new Joueur();
        $this->joueur2 = $joueur2 ?? new Joueur();
    }

    public function getJoueur1(){
        return $this->joueur1;
    }

    public function getJoueur2(){
        return $this->joueur2;
    }

    public function piocher(Joueur $joueur){

        $carte = array_pop($this->paquet);
        
        if($carte) {
            $joueur->getMainJoueur()->ajouterCarte($carte);
            return $carte;
        }
        return null;
    }

    public function verification(Joueur $joueur){
        if($joueur->getMainJoueur()->compterPoints() > 21) {
            return "Perdu";
        }

        if($joueur->getMainJoueur()->compterPoints() == 21) {
            return "BlackJack";
        }

        else {
            return "Continuer";
        }
    }

    public function afficherMain(){
        echo "Votre main : " . $this->joueur1->getMainJoueur()->afficherMain() . "<br>";
        echo "Main du croupier : " . $this->joueur2->getMainJoueur()->afficherMain() . "<br>";
    }

    public function afficherPoints(){
        echo "Vos points : " . $this->joueur1->getMainJoueur()->compterPoints() . "<br>";
        echo "Points du croupier : " . $this->joueur2->getMainJoueur()->compterPoints() . "<br>";
    }
}

class Carte{

    private int $valeur;
    private string $couleur;

    public function __construct(int $valeur, string $couleur){

        $this->valeur = $valeur;
        $this->couleur = $couleur;
    }
    
    public function getValeur(){
        if($this->valeur > 10){
            return 10;
        }
        if($this->valeur == 1) {
            return 11;
        }
        return $this->valeur;
    }

    public function getCouleur() {
        return $this->couleur;
    }

}

class Joueur{

    private string $nom;
    private Main $main;
    
    public function __construct(string $nom = "Joueur"){

        $this->nom = $nom;
        $this->main = new Main();
    }

    public function getNomJoueur(){
        return $this->nom;
    }

    public function getMainJoueur(){
        return $this->main;
    }
}

class Main{
    private array $main = [];

    public function getMain(){
        return $this->main;
    }

    public function ajouterCarte(Carte $carte){
        $this->main[] = $carte;
    }

    public function compterPoints() {
        $compt = 0;

        foreach($this->main as $carte) {
            $compt += $carte->getValeur();
        }

        return $compt;
    }

    public function afficherMain() {
        $txt = "";
        foreach($this->main as $carte) {
            $txt .= "(" . $carte->getValeur() . ", " . $carte->getCouleur() . ") ";
        }
        return $txt;
    }

}

function lancementPartie(){

    if(!isset($_SESSION["jeu"])){

        $joueur1 = new Joueur("Joueur");
        $joueur2 = new Joueur("Croupier");

        $jeu = new Jeu($joueur1, $joueur2);

        $jeu->piocher($joueur1);
        $jeu->piocher($joueur1);
        $jeu->piocher($joueur2);
        $jeu->piocher($joueur2);

        $_SESSION["jeu"] = $jeu;
    }

    $jeu = $_SESSION["jeu"];

    if(isset($_POST["piocher"])) {

        $jeu->piocher($jeu->getJoueur1());

        if($jeu->verification($jeu->getJoueur1()) == "Perdu") {
            $jeu->afficherMain();
            $jeu->afficherPoints();
            $_SESSION["fin_partie"] = true;
            echo "Vous avez perdu !";
            unset($_SESSION["jeu"]);
            return;
        }
    }

    if(isset($_POST["passer"])) {

        if($jeu->getJoueur2()->getMainJoueur()->compterPoints() < 17 || $jeu->getJoueur1()->getMainJoueur()->compterPoints() > $jeu->getJoueur2()->getMainJoueur()->compterPoints()){
            $jeu->piocher($jeu->getJoueur2());

            if($jeu->verification($jeu->getJoueur2()) == "Perdu"){
                $jeu->afficherMain();
                $jeu->afficherPoints();
                $_SESSION["fin_partie"] = true;
                echo "Vous avez gagné !";
                unset($_SESSION["jeu"]);
                return;
            }
        }
        elseif($jeu->getJoueur1()->getMainJoueur()->compterPoints() > $jeu->getJoueur2()->getMainJoueur()->compterPoints()) {
            $jeu->afficherMain();
            $jeu->afficherPoints();
            $_SESSION["fin_partie"] = true;
            echo "Vous avez gagné !";
            unset($_SESSION["jeu"]);
            return;
        }

        else {
            $jeu->afficherMain();
            $jeu->afficherPoints();
            $_SESSION["fin_partie"] = true;
            echo "Vous avez perdu !";
            unset($_SESSION["jeu"]);
            return;
        }
    }

    $_SESSION["jeu"] = $jeu;

    $jeu->afficherMain();
    $jeu->afficherPoints();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlackJack</title>
</head>
<body>

    <?php if(!isset($_POST["envoyer"]) && !isset($_SESSION["jeu"])) {?>

    <form action="" method="post">
        <label for="nom">Votre nom :</label><br>
        <input type="text" name="nom"><br>
        <button type="submit" name="envoyer">Lancer la partie !</button>
    </form>

    <?php } else {

        if(isset($_POST["envoyer"])){
            $_SESSION["nom"] = htmlspecialchars($_POST["nom"]);
        }
        echo "Bonjour " . $_SESSION["nom"] . "<br>La partie peut démarrer !<br>";
        lancementPartie();
    ?>
        <form action="" method="post">
            <?php
                if(!isset($_SESSION["fin_partie"])) {
                    echo "<button type='submit' name='piocher'>Piocher</button>";
                    echo "<button type='submit' name='passer'>Passer</button>";
                }

                else {
                    echo "<button type='submit' name='rejouer'>Rejouer</button>";
                    unset($_SESSION["fin_partie"]);
                }
            ?>
        </form>
    
    <?php } ?>

</body>
</html>