<?php 
 require("isSetConnectAdmin.php");
require("connexionBDD.php");
if (isset($_POST['identifiant'])&&isset($_POST['mdp'])){


    extract($_POST);
   
    require("../Models/Admin.class.php");
    require("../Models/DAOAdmin.class.php");   
 
    $reponse = $db->prepare('SELECT * FROM Admin where identifiant =:identifiant');
    $reponse->execute([
        ':identifiant' => $identifiant
    ]);   
    $result =  $reponse ->  rowCount();
    if ($result == 0)
    {
        $admin = new Admin(); 
        $admin->create($identifiant,$mdp);
        $adminDAO = new DAOAdmin($admin);
        $adminDAO->add(); 
        echo 'creation du compte avec succès'; 
    }
    else {
        echo "identifiant déja utilisé.";
    }
}
if (isset($_POST['identifiant'])&&isset($_POST['mdp'])){


    extract($_POST);
   
    require("../Models/Sport.class.php");
    require("../Models/DAOSport.class.php");   
 
    $reponse = $db->prepare('SELECT * FROM Sport where nom =:nom');
    $reponse->execute([
        ':nom' => $nomSport
    ]);   
    $result =  $reponse ->  rowCount();
    if ($result == 0)
    {
        $sport = new Admin(); 
        $sport->create($nomSport);
        $sportDAO = new DAOSport($sport);
        $sportDAO->add(); 
        echo 'creation du sport avec succès !'; 
    }
    else {
        echo "Sport déja existant ";
    }
}
else if (isset($_POST['matchFini'])){
    require("../Models/Match.class.php");
    require("../Models/DAOMatch.class.php");   
    if ($_POST['matchEnCours']!="init"){
        $match = new Match();
        $match->create(1,"","","",0,0,0);
        $match->set_id_match($_POST['matchFini']);
        $matchDAO = new DAOMatch($match);
        $matchDAO->delete();
    }
    else {
        echo 'aucun match choisi';
    }
  
}
else if (isset($_POST['matchEnCours'])){
        require("../Models/Match.class.php");
        if ($_POST['matchEnCours']!="init"){
            $reponse = $db->query('SELECT * FROM Matchs where id_match = '.$_POST['matchEnCours']);
            $reponse->execute(); 
            $match = $reponse->fetch();
           echo'<form method="post" action="../Controler/admin.php" id="fini">';
                echo'<input type="radio" id="match" name="match" value="'.$match['equipe1'].'" checked> ';
                echo'<label for="match"> équipe '.$match['equipe1'].' vainqueur</label></br>';
                echo'<input type="radio" id="match" name="match" value="'.$match['equipe2'].'" checked> ';
                echo'<label for="match"> équipe '.$match['equipe2'].' vainqueur</label></br>';
                echo'<input type="radio" id="match" name="match" value="" checked> ';
                echo'<label for="match">Egalité</label></br>';
                echo'<input id="id" name="id" type="hidden" value="'.$_POST['matchEnCours'].'"></input>';
                echo '<input type="text" name="score" placeholder="Score du match"  required/></td></br>';
                echo '<input type="submit" value="valide" name="valider" placeholder=""/>';
            echo'</form>';
        }
        else {
            echo 'aucun match choisi';
        }
       

}

else if (isset($_POST['match'])&& isset($_POST['score'])){
    require("../Models/Match.class.php");
    require("../Models/DAOMatch.class.php"); 
    $match = new Match();
    $match->create(1,"","","",0,0,0);
    $match->set_id_match($_POST['id']);
    $matchDAO = new DAOMatch($match);
    $matchDAO->fini($_POST['match'],$_POST['score']);
    header('Location:../view/admin.php?div="le match est fini"') ;
}
else if(isset($_POST['sport'])&& isset($_POST['equipe1'])&&isset($_POST['equipe2'])&& isset($_POST['date'])&&isset($_POST['coteEquipe1'])&& isset($_POST['coteEquipe2'])&&isset($_POST['coteNul'])){
    extract($_POST);
    require("../Models/Match.class.php");
    require("../Models/DAOMatch.class.php"); 
    $match = new Match();
    $match->create($sport,$equipe1,$equipe2,$date,$coteEquipe1,$coteEquipe2,$coteNul);
    $matchDAO = new DAOMatch($match);
    $matchDAO->add();
    echo 'Le match est ajouté avec succès !';
}
else {
    header('Location:../view/accueil.php');
}

?>