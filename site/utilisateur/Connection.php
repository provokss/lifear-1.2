<?php require '../navbar.php';?>

            <!-- formulaire de connection -->

<br/>    
    <div class="box">  
        <form action="connection_utilisateur.php" method="post" >   
        <span class="text-center">Connexion</span>
            <div class="input-container">
                <input type="email" name="email" required/>
                <label>Email</label>
            </div>
            <div class="input-container">
                <input type="password" name="password" required/>
                <label>mot de passe</label>
            </div>
            <button type="submit" class="btn-input">Connexion</button>
        </form>
        <a href="inscription.php" class="order-btn">Inscription</a>
    </div>
    </body>
</html>



