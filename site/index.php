<?php require 'navbar.php';?>
<script src="lifear.js"></script>
<p>
    <center class="texte">
            <h3>
                Bienvenue sur Lifear, le meilleur site de vente d'appareils respiratoires.</br>
                Si vous rencontrez des problèmes, ne vous en faites pas, nous sommes là pour vous ! </br>
                Si vous rencontrez des problèmes sur le site, allez dans l'onglet "info" et contactez-nous ! <br/>
                Nous ne sommes peut-être pas nombreux, mais nous sommes rapides.<br/>
  
<?php
    try{
        $pdoConnect = new PDO("mysql:host=localhost;dbname=TFA provins dhoryan 4info","root","");
    }
    catch (PDOException $ex) {
        echo $ex->getMessage();
    exit();
    }
    $pdoQuery = "SELECT * FROM article";
    $pdoResult = $pdoConnect->query($pdoQuery);
    $pdoRowCount = $pdoResult->rowCount();
        echo "Nous avons $pdoRowCount articles sur notre site.<br/> ";
?> 
    </center>
</p>
<img src="image/accueil.gif" alt="poumons" onclick="cacher()">
