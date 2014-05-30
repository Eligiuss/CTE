<?php
    $titre='Importer des fichiers';
    include('header.php');
    include('connection_BDD.php');
?>
<script>
    $(document).ready(
    function(){
        $('input:file').change(
            function(){
                if ($(this).val()) {
                    $('input:submit').attr('disabled',false);
                    // or, as has been pointed out elsewhere:
                    // $('input:submit').removeAttr('disabled'); 
                } 
            }
            );
    });
</script>
<html>
    <div class="nouveau">
        <div class="milieuPage">
            <h2 class="text-center">Importer des fichiers</h2>
            <br/>
            <h5 align="center">Veuillez choisir un fichier au format .csv</h5>
            <h5 align="center">Le contenu de ce fichier sera ajouté à l'application et remplacera le contenu existant (opération irreversible !)</h5><br/>
            <form action="uploadFile.php" method="post" class="milieuPage" enctype="multipart/form-data">
                <select name="choix" class="form-control">
                    <option value="matieres">Liste de matières</option>
                    <option value="utilisateurs">Liste d'utilisateurs</option>
                    <option value="promos">Liste de promotions</option>
                </select><br/>
                <div style="position:relative; margin-left:42.5%;">
                    <a class='btn btn-default' href='javascript:;'>
                        Parcourir...
                        <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                    </a>
                    &nbsp;
                    <span class='label label-info' id="upload-file-info"></span>
                </div>
                <br/>
                <input type="submit" disabled class="btn btn-primary center-block" value="Envoyer" />
            </form>     
        </div>
    </div>
</html>