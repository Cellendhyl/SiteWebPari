<?php 

if (isset($_POST['identifiant'])&&isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['mdp'])&&isset($_POST['age'])){


        extract($_POST);
        require("../Controler/connexionBDD.php");
        require("../Models/Parieur.class.php");
        require("../Models/DAOParieur.class.php");      
        $reponse = $db->prepare('SELECT * FROM Parieur where identifiant =:identifiant');
        $reponse->execute([
            ':identifiant' => $identifiant
        ]);   
        $result =  $reponse ->  rowCount();
        if ($result == 0)
        {
            $options = [
                'cost' => 12,
            ];
            $passwordHash = password_hash($mdp, PASSWORD_BCRYPT, $options); 
            $parieur = new Parieur(); 
            $parieur->create($nom,$prenom,$age,$identifiant,$passwordHash);
            $parieurDAO = new DAOParieur($parieur);
            $parieurDAO->add();
            header('Location:../view/accueil.php');   
        }
        else {
            echo "identifiant déja utilisé.";
        }
    }
    else {
        header('Location:../view/accueil.php');
    }
 
?>