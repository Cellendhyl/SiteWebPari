<?php
 require("../Controler/connexionBDD.php");
 require("../Models/Match.class.php");
$reponse = $db->query('SELECT * FROM Matchs where id_match = '.$_POST['match'].'');
$reponse->execute(); 
while ($match = $reponse->fetch())    //fetch() itérateur
{
    $m = new Match();
    $m->create($match['id_sport'],$match['equipe1'],$match['equipe2'],$match['date'],$match['cote']);
echo '<table>';
    echo '<thead>';
        echo '<tr>';
            echo '<th colspan="2">'.$m->__toString().'</th>';
        echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
        echo '<tr>';
            echo '<td colspan="2">'."Cote :"." ".$match['cote'].'</td>';
        echo '</tr>';
    echo '</tbody>';
echo '</table>';
}
?>

