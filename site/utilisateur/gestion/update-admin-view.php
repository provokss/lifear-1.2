<?php require '../../navbar.php';?>

<script src="../../lifear.js"></script>
                    </br>
<?php

// Vérifier si l'utilisateur est connecté et s'il a le rang 1
if(isset($_SESSION['rank']) && ($_SESSION['rank'] == 1)) {
    // Afficher le contenu de la page
 } else {
    // Rediriger l'utilisateur vers une page d'erreur ou de connexion
    header('Location:../../pages/erreur.php');
    exit();
 }
// Le code ci-dessous ne sera exécuté que si l'utilisateur est connecté et a le rang 1

?>
<center class="cadre">
<?php
    require '../../admin/database.php';
    if (!empty($_GET['utilisateur'])) {
        $ID = $_GET['utilisateur'];
    }

    $db = Database::connect();
    $statement = $db->prepare("SELECT ID_utilisateur, email, mot_de_passe, prenom, nom, photo, rank FROM utilisateurs WHERE ID_utilisateur=?");
    $statement->execute(array($ID));
    $utilisateur = $statement->fetch();

    echo '<div class="box">';
    echo '<form action="update-admin.php?utilisateur='.$utilisateur['ID_utilisateur'].'" method="post" enctype="multipart/form-data">'; 
            echo '<span class="text-center">Modification</span>';

            echo '<div class="input-container">';
            echo '<span> Rank :</span>';
            echo '<select type="text" name="rank" size="1">';
            echo '<option value="3" '.(($utilisateur['rank'] == 3) ? 'selected="selected"' : '').'> Utilisateur </option>';
            echo '<option value="2" '.(($utilisateur['rank'] == 2) ? 'selected="selected"' : '').'> admin </option>';
            echo '<option value="1" '.(($utilisateur['rank'] == 1) ? 'selected="selected"' : '').'> super-admin </option>';
            echo '<option value="4" '.(($utilisateur['rank'] == 4) ? 'selected="selected"' : '').'> banni </option>';
            echo '</select>';
            echo '</div>';

            echo '<div class="input-container">';
            echo '<input type="email" name="email" value="'.$utilisateur['email'].'" required><br/>';
            echo '<label>Email :</label>';
            echo '</div>';

            echo '<div class="input-container">';
            echo '<input type="text" name="prenom" value="'.$utilisateur['prenom'].'" required><br/>';
            echo '<label>Prénom :</label>';
            echo '</div>';

            echo '<div class="input-container">';
            echo '<input type="text" name="nom" value="'.$utilisateur['nom'].'" required><br/>';
            echo '<label>Nom :</label>';
            echo '</div>';

            echo '<div class="input-container">';
            echo '<input type="password" name="mot_de_passe" required><br/>';
            echo '<label>Mot de passe :</label>';
            echo '</div>';

            echo '<span>Photo de Profil :</span>'; 
            echo '<div class="input-container">';
            echo '<img src="../../image/utilisateur/'.$utilisateur['photo'].'" width="100" height="100" alt="photo de profil" > </img>';
            echo '</div>';

            echo '<span>Nouvelle photo de Profil :</span>'; 
            echo '<div class="file-input-container">';
            echo '<label for="fileInput" id="customFileLabel">Sélectionner un fichier</label>';
            echo '<input type="file" name="image" class="hidden" id="fileInput" required></br>';
            echo '<span id="fileName"></span>';            
            echo '</div>';     

            echo '<form action="update-admin.php" method="post">';
            echo '<input type="hidden" name="id_utilisateur" value="' . $utilisateur['ID_utilisateur'] . '">';
            // Autres champs de formulaire ici
            echo '<span class="order-btn" onclick="openConfirmation(' . $utilisateur['ID_utilisateur'] . ')">Modifier</span>';
            
            // Ajout de la fenêtre de confirmation de modification pour chaque utilisateur
            echo '<div class="confirmation-popup" id="confirmation-' . $utilisateur['ID_utilisateur'] . '">';
            echo '<div class="confirmation-form" id="popupForm">';
            echo '<h2>Êtes-vous sûr de vouloir modifier cet utilisateur ?</h2>';
            echo '<form action="update-utilisateur.php" class="confirmation-container" method="post">';
            echo '<input type="hidden" name="id_utilisateur" value="' . $utilisateur['ID_utilisateur'] . '">';
            echo '<input type="hidden" name="email" value="' . $utilisateur['email'] . '">';
            echo '<input type="hidden" name="prenom" value="' . $utilisateur['prenom'] . '">';
            echo '<input type="hidden" name="nom" value="' . $utilisateur['nom'] . '">';
            echo '<input type="hidden" name="photo" value="' . $utilisateur['photo'] . '">';
            echo '<button type="submit" class="confirmation-button-oui">Confirmer</button>';
            echo '';
            // Utilisation de l'ID de l'utilisateur pour fermer la fenêtre de confirmation
            echo '<button type="button" class="confirmation-button-non" onclick="closeConfirmation(' . $utilisateur['ID_utilisateur'] . ')">Non, annuler</button>';
            echo '</div>';
            echo '</div>';
            echo '</form>';
?>

</center>
    </body>
</html>