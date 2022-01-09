<?php
 /*
include("Models/PariPossible.class.php");
include("Models/DAOPariPossible.class.php");


$PariPossible= new PariPossible();
$PariPossible->create(1,"gagne",2);
$PariPossibleDAO = new DAOPari($PariPossible);
$PariPossibleDAO->add()
 
*/

    include 'Controler/define.php';

    try {
       $db = new PDO("mysql:host=" . PDO_HOST . ";"."dbname=" . PDO_DBBASE, PDO_USER, PDO_PW);
       $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch(PDOExcepetion $e){
       echo $e;
   }
   $q = $db-> query("SELECT * FROM Matchs ");
  

   $reponse = $db->query('SELECT * FROM Matchs WHERE fini=1');
   $reponse->execute();     
   echo "<div class='listsport'>";
   echo "<h4>SPORTS</h4>";
   ?>
   <form method="post" action="../Controler/supprimer.php" id="listPari">
            <select  name="pari" id="pari">     
            <option value="init">--Liste des Matchs finis--</option>
                <?php
   while ($match = $reponse->fetch())    //fetch() itérateur
   {
        echo $match['id_match']; 
        $reponse2 = $db->query('SELECT * FROM PariUser WHERE id_match ='.$match['id_match']);
        $reponse2->execute();   
        if ($reponse2->rowCount()==0){
            echo '<option value="'.$match['id_match'].'">'.$match['equipe1'].' vs '.$match['equipe2'].'</option>'; 
        }
   }
    ?>
     </select >     
     <button type="submit" id="supprimer" name="supprimer" value="supprimer">Supprimer le match</button>
        
        </form>
    
     <button type="submit" id="supprimer" name="supprimer" value="supprimer">Supprimer le match</button>
        
        </form>
       
        <div id ="result"></div>
    </section>
    <section>
    <form method="post" action="../Controler/modifier.php" id="listMatchEnCours">
            <select  name="matchEnCours" id="matchEnCours">     
            <option value="init">--Liste des Matchs en cours--</option>
                <?php
                  $reponse2 = $db->query('SELECT * FROM Matchs WHERE fini=0');
                  $reponse2->execute();   
   while ($match = $reponse2->fetch())    //fetch() itérateur
   {
            echo '<option value="'.$match['id_match'].'">'.$match['equipe1'].' vs '.$match['equipe2'].'</option>'; 
        }
   
    ?>
     <button type="submit" id="modifier" name="modifier" value="modifier">modifier le match</button>
     </form>
    </section>
        <div id ="result"></div>

