<?php

require_once "../model/Bdd.php";


//Constructeur de l'utilisateur
function __construct($id, $prenom, $nom, $email) {

     $this->id = $id;
     $this->prenom = $prenom;
     $this->nom = $nom;
     $this->email = $email;
}

$bdd = new bdd();

$Nom = $bdd->getRequeteNonSecurise($id, $prenom, $nom, $email);

//$Nomuser = $bdd->getRequeteSecurise($nom);

?>