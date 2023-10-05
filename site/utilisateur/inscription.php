<?php require '../navbar.php';?>
<script src="../site/lifear.js"></script>
<div class="box">  
    <form action="inscription_utilisateur.php" enctype="multipart/form-data" method="post">    
        <span class="text-center">inscription</span>
        <div class="input-container">
            <input type="text" name="nom" required/>
            <label>nom</label>
        </div>
        <div class="input-container">
            <input type="text" name="prenom" required/>
            <label>prenom</label>
        </div>
        <div class="input-container">
            <input type="email" name="email" required/>
            <label>Email</label>
        </div> 
        <div class="input-container">
            <input type="password" name="mot_de_passe" required/>
            <label>mot de passe</label>
        </div>
        <label>photo de profil</label>
        <div class="file-input-container">
            <input type="file" name="image" id="fileInput" class="hidden" accept=".jpg , .png , .jpeg , .gif" required/>
            <label for="fileInput" id="customFileLabel">Sélectionner un fichier</label><br/><br/>
            <span id="fileName"></span>
        </div>
    <button type="submit" class="btn-input">s'incrire</button>
    </form>
</div>

<script>
window.onload = function() {
    document.getElementById('fileInput').addEventListener('change', function() {
        var fileName = this.files[0].name;
        var maxLength = 25; // Définir la longueur maximale du nom de fichier
        if (fileName.length > maxLength) {
            fileName = fileName.substring(0, maxLength) + '...'; // Raccourcir le nom si nécessaire
        }
        document.getElementById('fileName').textContent = fileName;
    });
}
</script>

</body>
</html>
