<?php
    $titre = 'Accueil';
    include('header.php');
    include('connection_BDD.php');
?>

<div class="nouveau">
    <div id="formNouveau">
        <h2 class="text-center">Nouveau cours</h2>
        </br>
        
        <div class="form-group">
            <label for="date">Date</label>
            <input class="form-control" id="date" value="<?php echo date('d/m/Y'); ?>">
        </div>
        
        <div class="form-group">
            <label for="matiere">Matière</label>
            <select id="matiere" class="form-control">
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
            <label for="promo">Promotion</label>
            <select id="promo" class="form-control">
                <?php
                    $SQL = "SELECT ID,nom FROM promo";
                    $rs=$cnx->query($SQL);

                    while($info=$rs->fetch_object()){
                        echo '<option value="'.$info->ID.'">'.$info->nom.'</option>';
                    }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="contenu">Contenu du cours</label>
            <textarea id="contenu" class="form-control"></textarea>
        </div>
     
        <div class="form-group">
           <label for="travail">Travail donné</label>
            <textarea id="travail" class="form-control"></textarea>
        </div>
        
        <div class="form-group">
            <label>Interrogation</label>
            <div class="form-control">
                <b class="ie1"> Interrogation en cours : <input type="checkbox"  /></b><b class="ie2">Interrogation corrigée en cours : <select></select></b>
            </div>
        </div>
        
        <button type="button" onclick="save()" class="btn btn-default">Sauvegarder</button>
    </div>
</div>

</body>
</html>