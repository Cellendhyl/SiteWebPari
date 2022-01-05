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
$fm4 = new Match();
$fm4->create(1,'Lille','Lyon','25-11-2021',3,1,6);
$DAOm = new DAOMatch($fm1);
$DAOm->add();
$DAOm->setMatch($fm2);
$DAOm->add();
$DAOm->setMatch($fm3);
$DAOm->add();
$DAOm->setMatch($fm4);
$DAOm->add();

// BasketBall
$bm1 = new Match();
$bm1->create(2,'Lakers','Nets','14-01-2022',4,2,1);
$bm2 = new Match();
$bm2->create(2,'Pacers','Warriors','17-01-2022',3,1,6);
$bm3 = new Match();
$bm3->create(2,'Bulls','Cavs','01-01-2022',4,2,1);
$bm4 = new Match();
$bm4->create(2,'Sixers','Nuggets','01-01-2022',3,1,6);
$DAOm2 = new DAOMatch($bm1);
$DAOm2->add();
$DAOm2->setMatch($bm2);
$DAOm2->add();
$DAOm2->setMatch($bm3);
$DAOm2->add();
$DAOm2->setMatch($bm4);
$DAOm2->add();

// HandBall
$hm1 = new Match();
$hm1->create(3,'France','Espagne','05-01-2022',4,2,1);
$hm2 = new Match();
$hm2->create(3,'Portugal','Russie','07-01-2022',3,1,6);
$hm3 = new Match();
$hm3->create(3,'Angleterre','Allemagne','15-01-2022',4,2,1);
$hm4 = new Match();
$hm4->create(3,'Italie','SUede','11-01-2022',3,1,6);
$DAOm3 = new DAOMatch($hm1);
$DAOm3->add();
$DAOm3->setMatch($hm2);
$DAOm3->add();
$DAOm3->setMatch($hm3);
$DAOm3->add();
$DAOm3->setMatch($hm4);
$DAOm3->add();

$sql = $debco->prepare("INSERT INTO Matchs (equipe1,equipe2,date,vainqueur,cotev1,cotev2,coteNul,score,id_sport) VALUES(:equipe1,:equipe2,:date,:vainqueur,:cotev1,:cotev2,:coteNul,:score,:id_sport)");
$res = $sql -> execute([
            ':equipe1'=> $fm1->get_e1(), 
            ':equipe2'=>$fm1->get_e2(),
            ':date'=>$fm1->get_date(),
            ':vainqueur'=>$fm1->get_vainqueur(),
            ':cotev1'=>$fm1->get_cotev1(),
            ':cotev2'=>$fm1->get_cotev2(),
            ':coteNul'=>$fm1->get_coteNul(),
            ':score'=>$fm1->get_score(),
            ':id_sport'=>$fm1->get_idSport()
            ]);
                
?>