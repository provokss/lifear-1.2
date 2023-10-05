<?php
session_start();
ob_start();
?>
<script>
    function myFunction() {
        var x = document.getElementById("myNavbar");
        if (x.className === "navbar") {
            x.className += " responsive";
        } else {
            x.className = "navbar";
        }
    }
</script>
<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <title>lifear</title>
    <link rel="stylesheet" href="../../../../../TFA dhoryan provins 4info/site/lifear.css">
    <link rel="icon" href="../../../../../../TFA dhoryan provins 4info/site/image/lifear.png">

</head>
<body>
<div class="navbar" id="myNavbar">
<div class="text_navbar">
<a href="../../../../../TFA dhoryan provins 4info/site/index.php" class="logo">Lifear</a>
        <a href="../../../../../TFA dhoryan provins 4info/site/pages/articles.php">boutique</a>

        <?php
        if (isset($_SESSION['ID_utilisateur']) && $_SESSION['rank'] == 1) {
            echo '<a href="../../../../../TFA dhoryan provins 4info/site/admin\A-M-S-V\index.php">Articles panel</a>
                    <a href="../../../../../TFA dhoryan provins 4info/site\utilisateur\gestion\index.php">Utilisateurs panel</a>';
        } elseif (isset($_SESSION['ID_utilisateur']) && $_SESSION['rank'] == 2) {
            echo '<a href="../../../../../TFA dhoryan provins 4info/site/admin\A-M-S-V\index.php">Articles panel</a>';
        }
        if (isset($_SESSION['ID_utilisateur']) && $_SESSION['rank'] == 1) {
            echo '<a href="../../../../../TFA dhoryan provins 4info/site/pages/messages/index.php">message panel</a>';
        }
        if (isset($_SESSION['ID_utilisateur'])) {
            echo '<a href="../../../../TFA dhoryan provins 4info/site/utilisateur/deconnection.php">Profil</a>';
        } else {
            echo '<a href="../../../../../TFA dhoryan provins 4info/site/utilisateur/Connection.php">Connexion</a>';
        }

        if (isset($_SESSION['ID_utilisateur'])) {
            echo '<a href="../../../../TFA dhoryan provins 4info/site/panier/index.php">Panier</a>';
        }
        ?>

        <a href="../../../../../TFA dhoryan provins 4info/site/pages/information.php">Contact</a>
        <a class="icon" onclick="myFunction()">
            <div class="fermer">
                <div class="barre"></div>
                <div class="barre"></div>
                <div class="barre"></div>
                <div class="barre"></div>
            </div>
        </a>
</div>
</div>
<br/><br/><br/><br/><br/>