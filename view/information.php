<?php
if(isset($_POST['information'])){
 require("../Controler/connexionBDD.php");
$reponse = $db->query('SELECT * FROM Matchs where id_match = '.$_POST['match'].'');
$reponse->execute(); 
    while ($match = $reponse->fetch())    //fetch() itérateur
    {
    echo '<table>';
        echo '<thead>';
            echo '<tr>';
                echo '<th colspan="2">'.$match['equipe1']." vs ".$match['equipe2'].'</th>';
            echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
            echo '<tr>';
                echo '<td colspan="2">'."Cote victoire de ".$match['equipe1']." :"." ".$match['cotev1'].'</td>';
                echo '<td colspan="2">'."Cote victoire de ".$match['equipe2']." :"." ".$match['cotev2'].'</td>';
                echo '<td colspan="2">'."Cote match nul "." :"." ".$match['coteNul'].'</td>';
            echo '</tr>';
        echo '</tbody>';
    echo '</table>';
    }
}
?>

