<?php 

if (isset($_POST['identifiant'])&&isset($_POST['mdp'])){
    extract($_POST);
    require("../Controler/connexionBDD.php");
    $reponse = $db->prepare('SELECT * FROM Parieur where identifiant =:identifiant');
    $reponse->execute([
        ':identifiant' => $identifiant
    ]);   
    $result = $reponse->fetch();
    echo $identifiant.' et '. $result['identifiant'];
    $result =  $reponse ->  rowCount();
    echo $result;
    if ($result ==1){
        $hashpassword =  $result['mdp'];
        if(password_verify($mdp,$hashpassword)){
                session_start();
                $_SESSION['ID'] = $result['id_parieur'];
                $_SESSION["CONNECT"]="OK";
                $_SESSION["LOGIN"]= $identifiant;
                $_SESSION["CAPITAL"]=$result['capital'];
                
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