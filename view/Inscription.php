<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style2.css"> 
        <link rel="stylesheet" href="../css/all.min.css">
        <script defer src="../Controler/app.js"></script>
        <title>Document</title>
    </head> 
    <body>
<section class="top-page">
        <header class="header">
            <nav class="nav">
                <li><a href="map.php"><i class="far fa-compass"></i></a></li>
                <li><a href="accueil.php"><i class="fas fa-home"></i></a></li>
                

                
        </header>

<div class="form">
    <h1>S'incrire en tant que Parieur</h1>
    <div class="social-media">
      <p><i class="fab fa-google"></i></p>
      <p><i class="fab fa-youtube"></i></p>
      <p><i class="fab fa-facebook-f"></i></p>
      <p><i class="fab fa-twitter"></i></p>
    </div>

    <div class="inputs">
      
        <form method="post" action="../Controler/ValidationInscription.php" id="inscri">
            <input type="text" name="nom" id="nom" placeholder="Votre nom" required ></br>
            <input type="text" name="prenom" id="prenom" placeholder="Votre prenom" required ></br>
            <input type="text" name="age" id="age" placeholder="Votre age" required></br>
            <input type="text" minlength="5" name="identifiant" id="identifiant" placeholder="Entrez unidentifiant 5 caractères" required></br><div id ="result"></div>
            <input type=password minlength="5" name="mdp" id="mdp" placeholder="Entrez un mot de passe d'au moins 5 caractères" required></br>
            <p>Question et Réponse secrète<p><br>
            <select name = "question" id = "question">
                <option value="Le nom de votre chat ?">Le nom de votre chat</option>
                <option value="Le nom de votre ville ?">Le nom de votre ville</option>
                <option value="Le nom de votre rue ?">Le nom de votre rue</option>
                <option value="Votre 1er voiture ?">1er voiture"</option>
                <option value="Votre 1er animal de compagnie ?">Votre 1er animal de compagnie</option>
                <option value="La couleur de vos yeux ?">La couleur de vos yeux</option>
            </select>
            <input type=password name="reponse" id="reponse" placeholder="Votre réponse" required  ><br/>
            <button type="submit" name="send" value="S'inscrire !">S'inscrire !</button>
        </form>
</div>

</div>
    
</section>
</body>
    <script src="../Controler/inscription.js"></script>
</html>