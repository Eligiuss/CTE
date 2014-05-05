<?php
    $titre = 'Accueil';
    include('header.php');
    include('connection_BDD.php');
    
    if(!isset($_SESSION["ID"])){
        header('Location: index.php');
    }
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
       
        <div id="matieres">
            <div class="form-group">
                <label for="matiere">Matière(s)</label>
                <select id="matiere" class="form-control">
                    <option value="0">Choisissez une matière...</option>
                    <?php
                        include 'Connection_BDD.php';

                        $SQL = "SELECT ID,nom FROM matiere
                                ORDER BY nom ASC";
                        $rs=$cnx->query($SQL);

                        while($info=$rs->fetch_object()){
                            echo '<option value="'.$info->ID.'">'.$info->nom.'</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <select id="matiere2" class="form-control">
                    <option value="0">Matière 2...</option>
                    <?php
                        $SQL = "SELECT ID,nom FROM matiere
                                ORDER BY nom ASC";
                        $rs=$cnx->query($SQL);

                        while($info=$rs->fetch_object()){
                            echo '<option value="'.$info->ID.'">'.$info->nom.'</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <select id="matiere3" class="form-control">
                    <option value="0">Matière 3...</option>
                    <?php
                        $SQL = "SELECT ID,nom FROM matiere
                                ORDER BY nom ASC";
                        $rs=$cnx->query($SQL);

                        while($info=$rs->fetch_object()){
                            echo '<option value="'.$info->ID.'">'.$info->nom.'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        
        
        <button type="button" onclick="saveUser()" class="btn btn-success btn-lg">Sauvegarder</button>
        <button type="button" onclick="window.location='user.php'" class="btn btn-default btn-lg">Annuler</button>
    </div>
</div>

</body>
</html>