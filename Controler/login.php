<?php 

if (isset($_POST['identifiant'])&&isset($_POST['mdp'])){
    extract($_POST);
    if()
    require("../Controler/connexionBDD.php");
    include("../Models/Match.class.php");
    include("../Models/DAOMatch.class.php");
    include("../Models/Parieur.class.php");
    include("../Models/DAOParieur.class.php");
    include("../Models/PariUser.php");
    include("../Models/DAOPariUser.php");
    $reponse = $db->prepare('SELECT * FROM Parieur where identifiant =:identifiant');
    $reponse->execute([
        ':identifiant' => $identifiant
    ]);   
    $result = $reponse->fetch();
    $taille =  $reponse ->  rowCount();
    if ($taille ==1){
        $hashpassword =  $result['mdp'];
        if(password_verify($mdp,$hashpassword)){
            session_start();
            $_SESSION['ID'] = $result['id_parieur'];
            $_SESSION["CONNECT"]="OK";
            $_SESSION["LOGIN"]= $identifiant;
            $p= new Parieur();
            $p->create($result['nom'],$result['prenom'],$result['age'],$identifiant,$hashpassword);
            $p->setCapital($result['capital']);
            $p->setIdParieur($result['id_parieur']);
            $res= $db->prepare('SELECT * FROM PariUser where id_parieur =:id_parieur');
            $res->execute([
                ':id_parieur' => $result['id_parieur']
            ]); 
           
            while ($pariUser= $res->fetch())    //fetch() itérateur
            {
                $pari = new PariUser();
                $pari->create($pariUser['montant'],$pariUser['gain'],$pariUser['id_parieur'],$pariUser['id_pari'],$pariUser['id_match']);
                $pari->setIdPariUser($pariUser['id_pariUser']);
                $DaoPari = new DAOPariUser($pari);
                if ($DaoPari->ValidationPari($p)==true) {
                    $DaoPari->delete();
                } 
            }
            $reponse = $db->prepare('SELECT * FROM Parieur where identifiant =:identifiant');
            $reponse->execute([
                ':identifiant' => $identifiant
            ]);
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