<?php
    $titre='Modifier un cours';
    include('header.php');
    include('connection_BDD.php');
    
    $SQL = "SELECT * FROM cours
            WHERE ID = '".$_GET["id"]."' ";
    $rs=$cnx->query($SQL);
    
    while($info=$rs->fetch_object()) {
        $date = $info->date;
        $contenu = $info->contenu;
        $travail = $info->travail;
        $dateButoir = $info->date_butoir;
        $promo = $info->promo;
        $id_matiere = $info->id_matiere;
        $id_interro = $info->id_interro;
    }
    
    $SQL2 = "SELECT nom FROM matiere
             WHERE ID = '".$id_matiere."' ";
    $rs2=$cnx->query($SQL2);
    
    while($info=$rs2->fetch_object()) {
        $matiere = $info->nom;
    }
    
    $SQL3 = "SELECT ID FROM promo
             WHERE nom = '".$promo."' ";
    $rs3=$cnx->query($SQL3);
    
    while($info=$rs3->fetch_object()) {
        $id_promo = $info->ID;
    }
    
    $SQL4 = "SELECT libelle FROM interro
             WHERE ID = '".$id_interro."' ";
    $rs4=$cnx->query($SQL4);
    
    if($rs4->num_rows=='0'){
        $sujet="";
    }
    
    while($info=$rs4->fetch_object()) {
        $sujet = $info->libelle;
    }
?>



<div class="nouveau">
    <div class="milieuPage">
        <h2 class="text-center">Modifier un cours</h2>
        </br>
        
        <div class="form-group">
            <label for="date">Date</label>
            <?php
                    echo '<input class="form-control" id="date" value="'.$date.'">';
            ?>
        </div>
        
        <div class="form-group">
            <label for="matiere">Matière</label>
            <select id="matiere" class="form-control">
                <?php
                    include 'Connection_BDD.php';
                    
                    $SQL4 = "SELECT ID,nom FROM matiere
                             WHERE ID != '".$id_matiere."' ";
                    $rs4=$cnx->query($SQL4);
                    
                    echo '  <option value="'.$id_matiere.'">'.$matiere.'</option>';

                    while($info=$rs4->fetch_object()){
                        echo '<option value="'.$info->ID.'">'.$info->nom.'</option>';
                    }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="promo">Promotion</label>
            <select id="promo" class="form-control">
                <?php
                    $SQL5 = "SELECT ID,nom FROM promo
                             WHERE nom !='".$promo."'; ";
                    $rs5=$cnx->query($SQL5);
                    
                    echo '  <option value="'.$id_promo.'">'.$promo.'</option>';
                    
                    while($info=$rs5->fetch_object()){
                        echo '<option value="'.$info->ID.'">'.$info->nom.'</option>';
                    }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="contenu">Contenu du cours</label>
            <textarea id="contenu" class="form-control"><?php echo $contenu; ?></textarea>
        </div>
     
        <hr/>
            <div class="form-group">
               <label for="travail">Travail donné</label>
               <textarea id="travail" class="form-control" placeholder="Travail à faire..."><?php echo $travail; ?></textarea>
            </div>
            <input type="text" id="dateButoir" value="<?php echo $dateButoir; ?>" placeholder="Date butoir... (jj/mm/aaaa)" class="form-control" />
        <hr/>
        
        
        <div class="form-group">
            <label>Interrogation <input type="checkbox" value="<?php echo $id_interro; ?>" onclick="readonlySujet()" id="interro" <?php if($sujet!=='') echo 'checked'; ?>/></label>
            <input type="text" class="form-control" value="<?php echo $sujet; ?>" <?php if($sujet=='') echo 'readonly'; ?> id="sujet" placeholder="Sujet..." />
        </div>
        
        <button type="button" onclick="saveCours(<?php echo $_GET["id"] ?>)" class="btn btn-success btn-lg">Sauvegarder</button>
        <button type="button" onclick="window.location='search.php'" class="btn btn-default btn-lg">Annuler</button>
        <button type="button" onclick="delCours(<?php echo $_GET["id"] ?>)" class="btn btn-danger btn-lg" style="float:right">Supprimer</button>
    </div>
</div>

</body>
</html> 
    

