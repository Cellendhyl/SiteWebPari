<?php


include("../Models/Match.class.php");
include("../Models/DAOMatch.class.php");


// Football
$fm1 = new Match();
$fm1->create(1,'Barça','Real','31-12-2021',4,2,1);
$fm2 = new Match();
$fm2->create(1,'PSG','OM','01-01-2022',3,1,6);
$fm3 = new Match();
$fm3->create(1,'FC Nantes','Rennes','04-01-2022',4,2,1);

// BasketBall
$bm1 = new Match();
$bm1->create(2,'Lakers','Nets','14-01-2022',4,2,1);
$bm2 = new Match();
$bm2->create(2,'Pacers','Warriors','17-01-2022',3,1,6);
$bm3 = new Match();
$bm3->create(2,'Bulls','Cavs','01-01-2022',4,2,1);

// HandBall
$hm1 = new Match();
$hm1->create(3,'France','Espagne','05-01-2022',4,2,1);
$hm2 = new Match();
$hm2->create(3,'Portugal','Russie','07-01-2022',3,1,6);
$hm3 = new Match();
$hm3->create(3,'Angleterre','Allemagne','15-01-2022',4,2,1);


$sql = $db->prepare("INSERT INTO Matchs (equipe1,equipe2,date,vainqueur,cotev1,cotev2,coteNul,score,fini,id_sport) VALUES(:equipe1,:equipe2,:date,:vainqueur,:cotev1,:cotev2,:coteNul,:score,:fini,:id_sport)");
$res = $sql -> execute([
            ':equipe1'=> $fm1->get_e1(), 
            ':equipe2'=>$fm1->get_e2(),
            ':date'=>$fm1->get_date(),
            ':vainqueur'=>$fm1->get_vainqueur(),
            ':cotev1'=>$fm1->get_cotev1(),
            ':cotev2'=>$fm1->get_cotev2(),
            ':coteNul'=>$fm1->get_coteNul(),
            ':score'=>$fm1->get_score(),
            ':fini'=>$fm1->get_fini(),
            ':id_sport'=>$fm1->get_idSport()
            ]);

$sql = $db->prepare("INSERT INTO Matchs (equipe1,equipe2,date,vainqueur,cotev1,cotev2,coteNul,score,fini,id_sport) VALUES(:equipe1,:equipe2,:date,:vainqueur,:cotev1,:cotev2,:coteNul,:score,:fini,:id_sport)");
$res = $sql -> execute([
            ':equipe1'=> $fm2->get_e1(), 
            ':equipe2'=>$fm2->get_e2(),
            ':date'=>$fm2->get_date(),
            ':vainqueur'=>$fm2->get_vainqueur(),
            ':cotev1'=>$fm2->get_cotev1(),
            ':cotev2'=>$fm2->get_cotev2(),
            ':coteNul'=>$fm2->get_coteNul(),
            ':score'=>$fm2->get_score(),
            ':fini'=>$fm2->get_fini(),
            ':id_sport'=>$fm2->get_idSport()
            ]);

$sql = $db->prepare("INSERT INTO Matchs (equipe1,equipe2,date,vainqueur,cotev1,cotev2,coteNul,score,fini,id_sport) VALUES(:equipe1,:equipe2,:date,:vainqueur,:cotev1,:cotev2,:coteNul,:score,:fini,:id_sport)");
$res = $sql -> execute([
            ':equipe1'=> $fm3->get_e1(), 
            ':equipe2'=>$fm3->get_e2(),
            ':date'=>$fm3->get_date(),
            ':vainqueur'=>$fm3->get_vainqueur(),
            ':cotev1'=>$fm3->get_cotev1(),
            ':cotev2'=>$fm3->get_cotev2(),
            ':coteNul'=>$fm3->get_coteNul(),
            ':score'=>$fm3->get_score(),
            ':fini'=>$fm3->get_fini(),
            ':id_sport'=>$fm3->get_idSport()
            ]);

$sql = $db->prepare("INSERT INTO Matchs (equipe1,equipe2,date,vainqueur,cotev1,cotev2,coteNul,score,fini,id_sport) VALUES(:equipe1,:equipe2,:date,:vainqueur,:cotev1,:cotev2,:coteNul,:score,:fini,:id_sport)");
$res = $sql -> execute([
            ':equipe1'=> $hm1->get_e1(), 
            ':equipe2'=>$hm1->get_e2(),
            ':date'=>$hm1->get_date(),
            ':vainqueur'=>$hm1->get_vainqueur(),
            ':cotev1'=>$hm1->get_cotev1(),
            ':cotev2'=>$hm1->get_cotev2(),
            ':coteNul'=>$hm1->get_coteNul(),
            ':score'=>$hm1->get_score(),
            ':fini'=>$hm1->get_fini(),
            ':id_sport'=>$hm1->get_idSport()
            ]);

$sql = $db->prepare("INSERT INTO Matchs (equipe1,equipe2,date,vainqueur,cotev1,cotev2,coteNul,score,fini,id_sport) VALUES(:equipe1,:equipe2,:date,:vainqueur,:cotev1,:cotev2,:coteNul,:score,:fini,:id_sport)");
$res = $sql -> execute([
            ':equipe1'=> $hm2->get_e1(), 
            ':equipe2'=>$hm2->get_e2(),
            ':date'=>$hm2->get_date(),
            ':vainqueur'=>$hm2->get_vainqueur(),
            ':cotev1'=>$hm2->get_cotev1(),
            ':cotev2'=>$hm2->get_cotev2(),
            ':coteNul'=>$hm2->get_coteNul(),
            ':score'=>$hm2->get_score(),
            ':fini'=>$hm2->get_fini(),
            ':id_sport'=>$hm2->get_idSport()
            ]);

$sql = $db->prepare("INSERT INTO Matchs (equipe1,equipe2,date,vainqueur,cotev1,cotev2,coteNul,score,fini,id_sport) VALUES(:equipe1,:equipe2,:date,:vainqueur,:cotev1,:cotev2,:coteNul,:score,:fini,:id_sport)");
$res = $sql -> execute([
            ':equipe1'=> $hm3->get_e1(), 
            ':equipe2'=>$hm3->get_e2(),
            ':date'=>$hm3->get_date(),
            ':vainqueur'=>$hm3->get_vainqueur(),
            ':cotev1'=>$hm3->get_cotev1(),
            ':cotev2'=>$hm3->get_cotev2(),
            ':coteNul'=>$hm3->get_coteNul(),
            ':score'=>$hm3->get_score(),
            ':fini'=>$hm3->get_fini(),
            ':id_sport'=>$hm3->get_idSport()
            ]);

$sql = $db->prepare("INSERT INTO Matchs (equipe1,equipe2,date,vainqueur,cotev1,cotev2,coteNul,score,fini,id_sport) VALUES(:equipe1,:equipe2,:date,:vainqueur,:cotev1,:cotev2,:coteNul,:score,:fini,:id_sport)");
$res = $sql -> execute([
            ':equipe1'=> $bm1->get_e1(), 
            ':equipe2'=>$bm1->get_e2(),
            ':date'=>$bm1->get_date(),
            ':vainqueur'=>$bm1->get_vainqueur(),
            ':cotev1'=>$bm1->get_cotev1(),
            ':cotev2'=>$bm1->get_cotev2(),
            ':coteNul'=>$bm1->get_coteNul(),
            ':score'=>$bm1->get_score(),
            ':fini'=>$bm1->get_fini(),
            ':id_sport'=>$bm1->get_idSport()
            ]);

$sql = $db->prepare("INSERT INTO Matchs (equipe1,equipe2,date,vainqueur,cotev1,cotev2,coteNul,score,fini,id_sport) VALUES(:equipe1,:equipe2,:date,:vainqueur,:cotev1,:cotev2,:coteNul,:score,:fini,:id_sport)");
$res = $sql -> execute([
            ':equipe1'=> $bm2->get_e1(), 
            ':equipe2'=>$bm2->get_e2(),
            ':date'=>$bm2->get_date(),
            ':vainqueur'=>$bm2->get_vainqueur(),
            ':cotev1'=>$bm2->get_cotev1(),
            ':cotev2'=>$bm2->get_cotev2(),
            ':coteNul'=>$bm2->get_coteNul(),
            ':score'=>$bm2->get_score(),
            ':fini'=>$bm2->get_fini(),
            ':id_sport'=>$bm2->get_idSport()
            ]);

$sql = $db->prepare("INSERT INTO Matchs (equipe1,equipe2,date,vainqueur,cotev1,cotev2,coteNul,score,fini,id_sport) VALUES(:equipe1,:equipe2,:date,:vainqueur,:cotev1,:cotev2,:coteNul,:score,:fini,:id_sport)");
$res = $sql -> execute([
            ':equipe1'=> $bm3->get_e1(), 
            ':equipe2'=>$bm3->get_e2(),
            ':date'=>$bm3->get_date(),
            ':vainqueur'=>$bm3->get_vainqueur(),
            ':cotev1'=>$bm3->get_cotev1(),
            ':cotev2'=>$bm3->get_cotev2(),
            ':coteNul'=>$bm3->get_coteNul(),
            ':score'=>$bm3->get_score(),
            ':fini'=>$bm3->get_fini(),
            ':id_sport'=>$bm3->get_idSport()
            ]);
                
?>