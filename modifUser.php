<?php
    $titre='Modifier un utilisateur';
    include('header.php');
    include('connection_BDD.php');
    
    $SQL = "SELECT * FROM utilisateur
            WHERE ID = '".$_GET["id"]."' ";
    $rs=$cnx->query($SQL);
    
    while($info=$rs->fetch_object()) {
        $type = $info->type;
        $nom = $info->nom;
        $prenom= $info->prenom;
        $login = $info->login;
        $password = $info->password;
    }
?>

<div class="nouveau">
    <div class="milieuPage">
        <h2 class="text-center">Modifier un utilisateur</h2>
        </br>
        
        <div class="form-group">
            <label>Type</label><br/>
            <?php
                if($type=='1'){
                    echo'
                        <input type="radio" name="type" value="prof"> Professeur
                        <input type="radio" name="type" value="admin" checked style="margin-left:2em"> Administrateur';
                } else if ($type=='0'){
                    echo'
                        <input type="radio" name="type" value="prof" checked> Professeur
                        <input type="radio" name="type" value="admin" style="margin-left:2em"> Administrateur';
                }
            ?>
            <hr/>
        </div>
        
        <div class="form-group">
            <label for="contenu">Nom</label>
            <input type="text" value="<?php echo $nom; ?>" id="nomUser" class="form-control"/>
        </div>
     
        <div class="form-group">
            <label for="contenu">Prénom</label>
            <input type="text" value="<?php echo $prenom; ?>" id="prenomUser" class="form-control"/>
        </div>
        
        <div class="form-group">
            <label for="contenu">Nom d'utilisateur</label>
            <input type="text" value="<?php echo $login; ?>" id="loginUser" class="form-control"/>
        </div>
        
        <div class="form-group">
            <label for="contenu">Mot de passe</label>
            <input type="text" value="<?php echo $password; ?>" id="passwordUser" class="form-control"/>
        </div>
        
        <div class="form-group">
            <label for="matiere">Matière(s)</label>
            <select id="matiere" class="form-control">
                <option value="0">Choisissez une matière...</option>
                <?php
                    include 'Connection_BDD.php';
                    
                    $SQL = "SELECT ID,nom FROM matiere";
                    $rs=$cnx->query($SQL);

                    while($info=$rs->fetch_object()){
                        echo '<option value="'.$info->ID.'">'.$info->nom.'</option>';
                    }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <select id="matiere" class="form-control">
                <option value="0">Matière 2...</option>
                <?php
                    $SQL = "SELECT ID,nom FROM matiere";
                    $rs=$cnx->query($SQL);

                    while($info=$rs->fetch_object()){
                        echo '<option value="'.$info->ID.'">'.$info->nom.'</option>';
                    }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <select id="matiere" class="form-control">
                <option value="0">Matière 3...</option>
                <?php
                    $SQL = "SELECT ID,nom FROM matiere";
                    $rs=$cnx->query($SQL);

                    while($info=$rs->fetch_object()){
                        echo '<option value="'.$info->ID.'">'.$info->nom.'</option>';
                    }
                ?>
            </select>
        </div>
        
        <button type="button" onclick="saveUser(<?php echo $_GET["id"]; ?>)" class="btn btn-success btn-lg">Sauvegarder</button>
        <button type="button" onclick="window.location='user.php'" class="btn btn-default btn-lg">Annuler</button>
        <button type="button" onclick="delUser(<?php echo $_GET["id"]; ?>)" class="btn btn-danger btn-lg" style="float:right;">Supprimer</button>
    </div>
</div>

</body>
</html> 
    

