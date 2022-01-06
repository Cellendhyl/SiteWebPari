<?php 

require("../Controler/isSetConnect.php");
require("connexionBDD.php");
require("../Models/PariUser.php");
require("../Models/DAOPariUser.php");

require("../Models/Parieur.class.php");
require("../Models/DAOParieur.class.php");

$capital = $_SESSION['CAPITAL'];
$idparieur = $_SESSION['ID'];
if(isSet($_POST['xxx'])&& isSet($_POST['pari'])&& isSet($_POST['idmatch'])){
    $somme =0;
    for ($i = 0; $i <count($_POST['xxx']);$i++){
        $idPari = $_POST['pari'][$i];
        $somme+= $_POST[$idPari];
    }
    if ($somme <= $capital){
        for ($i = 0; $i <count($_POST['xxx']);$i++){
            $gain = $_POST['xxx'][$i];
            $idPari = $_POST['pari'][$i];
            $montant = $_POST[$idPari];
            $idmatch= $_POST['idmatch'];
            $capital = $capital - $_POST[$idPari]; 
            $pUser = new PariUser();
            $pUser->create($montant,$gain,$idparieur,$idPari,$idmatch);
            $DAOpUser = new DAOPariUser($pUser);
            $DAOpUser->add();
        }
        $_SESSION['CAPITAL']=$capital;
        $reponse = $db->query('SELECT * FROM Parieur where id_parieur ='.$idparieur.'');
        $reponse->execute(); 
        while ($parieur = $reponse->fetch()) {
            $p = new Parieur();
            $p->create($parieur['nom'],$parieur['prenom'],$parieur['age'],$parieur['identifiant'],$parieur['mdp']);
            $p->setIdParieur($idparieur);
            $p->setCapital($capital);
            $DAOp = new DAOParieur($p);
            $DAOp->update();
        } 
    }
    else {
        echo 'capital insufisant <br>';
    }  
}
else {
    header("Location : ../View/accueil.php");
}





?>