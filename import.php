<?php
    $titre='Importer des fichiers';
    include('header.php');
    include('connection_BDD.php');
?>
<html>
    <div class="nouveau">
        <div class="milieuPage">
            <h2 class="text-center">Importer des fichiers</h2>
            <br/>
            <form action="uploadFile.php" method="post" class="milieuPage" enctype="multipart/form-data">
                <div style="position:relative; margin-left:42.5%;">
                    <a class='btn btn-default' href='javascript:;'>
                        Parcourir...
                        <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                    </a>
                    &nbsp;
                    <span class='label label-info' id="upload-file-info"></span>
                </div>
                <br/>
                <input type="submit" class="btn btn-primary center-block" value="Envoyer" />
            </form>     
        </div>
    </div>
</html>