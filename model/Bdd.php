<?php
    
    class Bdd{
    
            // Constructeur pour la connexion à la bdd
            function __construct(){
            //essay de connexion a bdd
            try{
                $this->bdd = new PDO("mysql:dbname=bddinjection;host:127.0.0.1","root","POKEMON17");
                echo 'connexion ok ';
            }
            catch(PDOException $e){
                echo $e->getmessage();
            }
                }
            
            //getter
            function getBdd(){
                return $this->bdd;
            }

    //requête qui peut provoquer une injection sql
    //car il n'y a pas de verification n'y de préparation de requete 
    //il execute directement la requete
    function getRequeteNonSecurise($nom){
    $sql = ("select ID_User, Prenom, Nom, Email from user u where Nom = '%s'. $nom");
    $sth = $bdd->query($sql);
    return $sth;
    }

    function getRequeteSecurise($id, $prenom, $nom, $email){
    //requête qui serra meilleur et plus sécurisé 
    // il y a une verification et un préparation de la requete
    $sql = "select ID_User, Prenom, Nom, Email from user u where Nom = ?";
    //préparation de la requete
    $req = $bdd->prepare($sql);
    //verifcation de la requete
    $result = $req->execute(array(':ID_User' => $id, 
                                  ':Prenom' => $prenom,
                                  ':Nom' => $nom,
                                  'Email' => $email));
    return $req->fetch();
    }
}
?>
    