<?php
session_start(); 
        require("../Controler/isSetConnect.php");
        require("../Controler/connexionBDD.php");
        require("../Models/Match.class.php");
        $reponse = $db->query('SELECT * FROM Matchs where id_match =1');
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
                echo '<td>Cote victoire de '.$match['equipe1'].':</td>';
                echo '<td><input type="button" onclick="getValue(this.value,this.id)" class ="paris" name="button1"  id="1" value='.$match['cotev1'].'></td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>Cote victoire de '.$match['equipe2'].':</td>';
                echo '<td><input type="button" onclick="getValue(this.value,this.id)" class ="paris" name="button2"  id="2" value='.$match['cotev2'].'></td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>Cote match nul :</td>';
                echo '<td><input type="button" onclick="getValue(this.value,this.id)" class ="paris" name="button3"  id="3" value='.$match['coteNul'].'></td>';
            echo '</tr>';
        echo '</tbody>';
    echo '</table>';
    }
}     
?>
<div id="res"></div>
<form method="post" action="test.php" id="ez">
</form>
<script src="../Controler/info.js"></script>

