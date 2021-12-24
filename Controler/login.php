<?php 

if (isset($_POST['identifiant'])&&isset($_POST['mdp'])){
    

    extract($_POST);
    require("../Controler/connexionBDD.php");
    $reponse = $db->prepare('SELECT * FROM Parieur where identifiant =:identifiant');
    $reponse->execute([
        ':identifiant' => $identifiant
    ]);   
    $result = $reponse->fetch();
    $hashpassword =  $result['mdp'];
    if($result && password_verify($mdp,$hashpassword)){
            session_start();
            $_SESSION['ID'] = $result['id'];
            $_SESSION["CONNECT"]="OK";
            $_SESSION["LOGIN"]= $login;
            header('Location:accueilUser.php'); 
    }
    else {
        $erreur= "Erreur de login/mot de passe";
        header('Location:accueil.php?erreur= '.$erreur.' ');
    }
}
 ?>