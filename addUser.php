<?php
    $titre = 'Accueil';
    include('header.php');
    include('connection_BDD.php');
?>

<div class="nouveau">
    <div class="milieuPage">
        <h2 class="text-center">Nouvel utilisateur</h2>
        </br>
        
        <div class="form-group">
            <label>Type</label><br/>
            <input type="radio" name="type" value="prof" checked> Professeur
            <input type="radio" name="type" value="admin" style="margin-left:2em"> Administrateur
            <hr/>
        </div>
        
        <div class="form-group">
            <label for="contenu">Nom</label>
            <input type="text" id="nomUser" class="form-control"/>
        </div>
     
        <div class="form-group">
            <label for="contenu">Prénom</label>
            <input type="text" id="prenomUser" class="form-control"/>
        </div>
        
        <div class="form-group">
            <label for="contenu">Nom d'utilisateur</label>
            <input type="text" id="loginUser" class="form-control"/>
        </div>
        
        <div class="form-group">
            <label for="contenu">Mot de passe</label>
            <input type="text" id="passwordUser" class="form-control"/>
        </div>
        
        <button type="button" onclick="saveUser()" class="btn btn-default">Sauvegarder</button>
        <button type="button" onclick="window.location='user.php'" class="btn btn-default">Annuler</button>
    </div>
</div>

</body>
</html>