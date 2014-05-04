<?php
    $titre = 'Accueil';
    include('header.php');
    include('connection_BDD.php');
?>

<div class="nouveau">
    <div class="milieuPage">
        <h2 class="text-center">Nouveau cours</h2>
        </br>
        
        <div class="form-group">
            <label for="date">Date</label>
            <input class="form-control" id="date" placeholder="jj/mm/aaaa" value="<?php echo date('d/m/Y'); ?>">
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
        
        <hr/>
            <div class="form-group">
               <label for="travail">Travail donné</label>
               <textarea id="travail" class="form-control" placeholder="Travail à faire..."></textarea>
            </div>
            <input type="text" id="dateButoir" placeholder="Date butoir... (jj/mm/aaaa)" class="form-control" />
        <hr/>
        
        
        <div class="form-group">
            <label>Interrogation <input type="checkbox" onclick="readonlySujet()" id="interro"/></label>
            <input type="text" class="form-control" readonly id="sujet" placeholder="Sujet..." />
        </div>
        
        <button type="button" onclick="saveCours()" class="btn btn-default">Sauvegarder</button>
    </div>
</div>

</body>
</html>