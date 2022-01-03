<?php
session_start(); 
if (isset($_SESSION["CONNECT"])) {
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
                echo '<td>'<."Cote victoire de ".$match['equipe1']." :"." ".$match['cotev1'].'</td>';
                echo '<td colspan="2">'."Cote victoire de ".$match['equipe2']." :"." ".$match['cotev2'].'</td>';
                echo '<td colspan="2">'."Cote match nul "." :"." ".$match['coteNul'].'</td>';
            echo '</tr>';
        echo '</tbody>';
    echo '</table>';
    }
}
?>
<?php
        require("Controler/connexionBDD.php");
        require("Models/Match.class.php");
        $reponse = $db->query('SELECT * FROM Matchs where id_match =1');
        $reponse->execute(); 
        while ($match = $reponse->fetch())    //fetch() itérateur
        {
            echo '<input type="button" onclick="getValue(this.value,this.id)" class ="paris" name="button1"  id="1" value='.$match['cotev1'].'>';
            echo '<input type="button" onclick="getValue(this.value,this.id)" class ="paris" name="button2"  id="2" value='.$match['cotev2'].'>';
            echo '<input type="button" onclick="getValue(this.value,this.id)" class ="paris" name="button3"  id="3" value='.$match['coteNul'].'>';
        }
       
?>

<div id="res"></div>
<script src="../Controler/info.js"></script>

