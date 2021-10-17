<?php 

class InjectionTest extends \PHPUnit\Framework\TestCase
{
    public function test_unNomUnique_trouverUtilisateur_devraitRetournerLeLclient()
    {
        $bdd = new Model\Bdd();
        $Nomuser = new Controller\Nom('pluchart');
        $this->assertEquals(1,'Ligne de commande pour savoir si $Nomuser contitent le nom pluchart','il doit contenir le nom pluchart');
    }

    public function test_doublonDeNom_trouverParNom_devraitRetournerLesDeuxClients(){

        $bdd = new Model\Bdd();
        $Nomuser = new Controller\Nom('test');
        $this->assertEquals(2,'Ligne de commande pour savoir si $Nomuser contitent deux fois le nom test','il doit contenir deux fois le nom test');
    }

    public function test_aucunNom_trouverParNom_devraitRetournerZeroClient()
    {
        $bdd = new Model\Bdd();
        $Nomuser = new Controller\Nom('patrick');
        $this->assertEquals(0,'Ligne de commande pour savoir si $Nomueser contitent le nom patrick','il ne doit avoir aucun utilisateur patrick');
    }

    public function test_injection_trouverparnom_devraitrenvoyerZeroClient(){

        $bdd = new Model\Bdd();
        $Nomuser = new Controller\Nom("Pirate or '1' = '1'");
        $this->assertEquals(0,'Ligne de commande pour savoir si $Nomuser contitent le nom patrick','injection à réussi');
    }
}