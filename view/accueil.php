<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
    </head>
    <body>

<?php
require("../Controler/connexionBDD.php");
//include("menu.php");

echo " Afficher les sport :";
$reponse = $db->query('SELECT * FROM Sport');
$reponse->execute();

echo "<nav class=menu>";  
while ($sport = $reponse->fetch())    //fetch() itérateur
{
    echo "<ul>";
    echo '<li><a href="'.$sport['id_sport'].'">'.$sport['nom'].'</a></li>';
    echo "</ul>";
}
echo "</nav>";

$reponse->closeCursor();        //fermeture du curseur d'analyse des resultats

echo "<br>";  //&nbsp;

?>


</body>

</html>

