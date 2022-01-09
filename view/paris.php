<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style2.css"> 
        <link rel="stylesheet" href="../css/all.min.css">
        <script defer src="../js/app.js"></script>
        <title>Document</title>
    </head> 
    <body>
    
    <section class="top-page">

        <header class="header">
            <nav class="nav">
                <li><a href="accueil.php"><i class="fas fa-home"></i></a></li>
                <li><a href=../Controler/deconnexion.php?afaire=deconnexion><i class="fas fa-door-open"></i></a></li>
            </nav>
        </header>

        <div class="header-bottom">
            <a class="button" href="Recherche.php">RECHERCHER</a>
        </div>
    </section>

<?php
        require("../Controler/isSetConnect.php");
        require("../Controler/connexionBDD.php");
        require("../Models/Match.class.php");
        $reponse = $db->query('SELECT * FROM Matchs where id_match ='.$_POST['match'].'');
        $reponse->execute();
        $reponse2 = $db->query('SELECT * FROM PariPossible ');
        $reponse2->execute();  
        $match = $reponse->fetch();
        echo '<table>';
        echo '<thead>';
            echo '<tr>';
                echo '<th colspan="2">'.$match['equipe1']." vs ".$match['equipe2'].'</th>';
            echo '</tr>';
            echo '<tr>';
                echo '<th colspan="2">vous avez un capital de :'.$_SESSION['CAPITAL'].'</th>';
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
         
            while($pari = $reponse2->fetch()){
                if($pari['id_pari']>3){
                echo '<tr>';
                    echo '<td>'.$pari['description'].' :</td>';
                    echo '<td><input type="button" onclick="getValue(this.value,this.id)" class ="paris" name="button3"  id='.$pari['id_pari'].' value='.$pari['cote'].'></td>';
                echo '</tr>';
                }
            }
        echo '</tbody>';
    echo '</table>';
       
?>


<form method="post" class="pari" action="../Controler/validationParis.php" id="ez">
<?php
    echo '<input id="idmatch" name="idmatch" type="hidden" value='.$_POST['match'].'></input>';
?>
</form>
<div id="res"></div>
</body>
<script src="../js/pari.js"></script>
</html>

