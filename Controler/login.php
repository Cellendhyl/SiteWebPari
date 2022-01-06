<?php 

if (isset($_POST['identifiant'])&&isset($_POST['mdp'])){
    extract($_POST);
    require("../Controler/connexionBDD.php");
    $reponse = $db->prepare('SELECT * FROM Parieur where identifiant =:identifiant');
    $reponse->execute([
        ':identifiant' => $identifiant
    ]);   
    $result = $reponse->fetch();
    $taille =  $reponse ->  rowCount();
    if ($taille ==1){
        $hashpassword =  $result['mdp'];
        echo password_verify($mdp,$hashpassword);
        echo 'et '. $hashpassword.' et ' . $mdp;
        if(password_verify($mdp,$hashpassword)){
                session_start();
                $_SESSION['ID'] = $result['id_parieur'];
                $_SESSION["CONNECT"]="OK";
                $_SESSION["LOGIN"]= $identifiant;
                $_SESSION["CAPITAL"]=$result['capital'];
                echo password_verify($mdp,$hashpassword);
                echo 'et '. $hashpassword.' et ' . $mdp;
        }
        else {  
            echo "Erreur de login/mot de passe";
        }
    }
    else {
        echo "aucun compte trouvé";
    }
   
}
 ?>