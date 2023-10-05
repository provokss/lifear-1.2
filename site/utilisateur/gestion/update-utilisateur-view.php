<script src="../../lifear.js"></script>
<?php 
require '../../admin/database.php';
require '../../navbar.php';

// Vérifier si l'utilisateur est connecté et s'il a le rang 1, 2 et 3
if(isset($_SESSION['rank']) && ($_SESSION['rank'] == 1 || $_SESSION['rank'] == 2 || $_SESSION['rank'] == 3)) {
    // Afficher le contenu de la page
 } else {
    // Rediriger l'utilisateur vers une page d'erreur ou de connexion
    header('Location:../../pages/connecte_toi.php');
    exit();
 }
// Le code ci-dessous ne sera exécuté que si l'utilisateur est connecté et a le rang 1, 2 et 3

    if(!empty($_GET['utilisateur']))
    {
        $ID=$_GET['utilisateur'];
    }

    $db=Database::connect();
    $statement=$db->prepare("SELECT ID_utilisateur, email, mot_de_passe, prenom, nom, photo, rank
                            FROM utilisateurs WHERE ID_utilisateur=?");
    $statement->execute(array($ID));
    $utilisateur=$statement->fetch();

            echo '<div class="box">';
            echo '<form action="update-utilisateur.php?utilisateur='.$utilisateur['ID_utilisateur'].'" method="post" enctype="multipart/form-data">'; 
            echo '<span class="text-center">Modification</span>';
            echo '</select>';

            echo '<div class="input-container">';
            echo '<input type="email" name="email" value="'.$utilisateur['email'].'" required>';
            echo '<label>Email</label>';
            echo '</div>';

            echo '<div class="input-container">';
            echo '<input type="text" name="prenom" value="'.$utilisateur['prenom'].'" required>';
            echo '<label>Prénom</label>';
            echo '</div>';

            echo '<div class="input-container">';
            echo '<input type="text" name="nom" value="'.$utilisateur['nom'].'" required>';
            echo '<label>Nom</label>';
            echo '</div>';

            echo '<div class="input-container">';
            echo '<input type="password" name="mot_de_passe" required>';
            echo '<label>Mot de passe</label>';
            echo '</div>';
   
            echo '<div class="file-input-container">';         
            echo '<span>Photo de Profil :</span></br>'; 
            echo '<img id="imagePreview" src="../../image/utilisateur/'.$utilisateur['photo'].'" alt="Aperçu de l\'image" width = "100px" height ="100px""></br>';
            echo '<label for="fileInput" id="customFileLabel">Sélectionner un fichier</label>';
            echo '<input type="file" name="image" class="hidden" id="fileInput" class="hidden" required></br>';
            echo '</div>';              
            

            echo '<input type="hidden" name="rank" value="'.$utilisateur['rank'].'">';
            echo '<form action="update-utilisateur2.php" method="post">';
            // Autres champs de formulaire ici
            echo '<span class="order-btn" onclick="openConfirmation(' . $utilisateur['ID_utilisateur'] . ')">Modifier</span>';
            echo '</div>';
// Ajout de la fenêtre de confirmation de modification pour chaque utilisateur
echo '<div class="confirmation-popup" id="confirmation-' . $utilisateur['ID_utilisateur'] . '">';
echo '<div class="confirmation-form" id="popupForm">';
echo '<h2>Êtes-vous sûr de vouloir modifier cet utilisateur ?</h2>';
echo '<form action="update-utilisateur.php" class="confirmation-container" method="post">';
echo '<input type="hidden" name="id_utilisateur" value="' . $utilisateur['ID_utilisateur'] . '">';
echo '<input type="hidden" name="email_utilisateur" value="' . $utilisateur['email'] . '">';
echo '<input type="hidden" name="prenom_utilisateur" value="' . $utilisateur['prenom'] . '">';
echo '<input type="hidden" name="nom_utilisateur" value="' . $utilisateur['nom'] . '">';
echo '<input type="hidden" name="photo_utilisateur" value="' . $utilisateur['photo'] . '">';
echo '<button type="submit" class="confirmation-button-oui">Confirmer</button>';
// Utilisation de l'ID de l'utilisateur pour fermer la fenêtre de confirmation
echo '<button type="button" class="confirmation-button-non" onclick="closeConfirmation(' . $utilisateur['ID_utilisateur'] . ')">Non, annuler</button>';
echo '</div>';
echo '</div>';
echo '</form>';
$db=Database::connect();
?>
</body>
</html>