<?php
    $titre='Modifier un utilisateur';
    include('header.php');
    include('connection_BDD.php');
    
    if(!isset($_SESSION["ID"])){
        header('Location: index.php');
    }
    
    $SQL = "SELECT * FROM utilisateur
            WHERE ID = '".$_GET["id"]."' ";
    $rs=$cnx->query($SQL);
    
    while($info=$rs->fetch_object()) {
        $type = $info->type;
        $nom = $info->nom;
        $prenom= $info->prenom;
        $login = $info->login;
        $password = $info->password;
        $type = $info->type;
    }
    $id_prof = $_SESSION["ID"];
?>

<input type="hidden" id="prof" value="<?php echo $id_prof; ?>" />

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
        

        <div id="matieres">
            <div class="form-group">
                <label for="matiere">Matière(s)</label>
                <select id="matiere" class="form-control">
                    <option value="0">Choisissez une matière...</option>
                    <?php
                        include 'Connection_BDD.php';

                        $SQL = "SELECT m.ID,m.nom,e.userID FROM matiere m
                                INNER JOIN enseigne e ON m.ID = e.matiereID
                                WHERE e.userID='".$_GET["id"]."'
                                ORDER BY nom ASC
                                LIMIT 0,1";
                        $rs=$cnx->query($SQL);

                        while($info=$rs->fetch_object()){
                            $id = $info->ID;
                            echo '<option selected="selected" value="'.$info->ID.'">'.$info->nom.'</option>';
                        }

                        $SQL2 = "SELECT ID,nom FROM matiere
                                 WHERE ID != '".$id."' ";
                        $rs2=$cnx->query($SQL2);

                        while($info=$rs2->fetch_object()){
                            echo '<option value="'.$info->ID.'">'.$info->nom.'</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <select id="matiere2" class="form-control">
                    <option value="0">Matière 2...</option>
                    <?php
                        $SQL = "SELECT m.ID,m.nom,e.userID FROM matiere m
                                INNER JOIN enseigne e ON m.ID = e.matiereID
                                WHERE e.userID='".$_GET["id"]."'
                                ORDER BY nom ASC
                                LIMIT 1,1";
                        $rs=$cnx->query($SQL);

                        while($info=$rs->fetch_object()){
                            $id = $info->ID;
                            echo '<option selected="selected" value="'.$info->ID.'">'.$info->nom.'</option>';
                        }

                        $SQL2 = "SELECT ID,nom FROM matiere
                                 WHERE ID != '".$id."' ";
                        $rs2=$cnx->query($SQL2);

                        while($info=$rs2->fetch_object()){
                            echo '<option value="'.$info->ID.'">'.$info->nom.'</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <select id="matiere3" class="form-control">
                    <option value="0">Matière 3...</option>
                    <?php
                        $SQL = "SELECT m.ID,m.nom,e.userID FROM matiere m
                                INNER JOIN enseigne e ON m.ID = e.matiereID
                                WHERE e.userID='".$_GET["id"]."'
                                ORDER BY nom ASC
                                LIMIT 2,1";
                        $rs=$cnx->query($SQL);

                        while($info=$rs->fetch_object()){
                            $id = $info->ID;
                            echo '<option selected="selected" value="'.$info->ID.'">'.$info->nom.'</option>';
                        }

                        $SQL2 = "SELECT ID,nom FROM matiere
                                 WHERE ID != '".$id."' ";
                        $rs2=$cnx->query($SQL2);

                        while($info=$rs2->fetch_object()){
                            echo '<option value="'.$info->ID.'">'.$info->nom.'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        
        <button type="button" onclick="saveUser(<?php echo $_GET["id"]; ?>)" class="btn btn-success btn-lg">Sauvegarder</button>
        <button type="button" onclick="window.location='user.php'" class="btn btn-default btn-lg">Annuler</button>
        <button type="button" onclick="delUser(<?php echo $_GET["id"]; ?>)" class="btn btn-danger btn-lg" style="float:right;">Supprimer</button>
    </div>
</div>

</body>
</html> 
    

