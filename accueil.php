<?php
    $titre = 'Accueil';
    $active='index';
    include 'header.php';
?>

<div class="nouveau">
    <form role="form">
        <h2 class="text-center">Nouveau</h2>
        </br>
        <div class="form-group">
            <label for="exampleInputEmail1">Date</label>
            <input type="email" class="form-control" id="exampleInputEmail1" readonly value="<?php echo date('d/m/Y'); ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Matière</label>
            <select class="form-control"><?php ?></select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Contenu du cours    </label>
            <textarea class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">IE   </label>
            <div class="form-control">
                <b class="ie1"> Interrogation en cours : <input type="checkbox"  /></b><b class="ie2">Interrogation corrigée en cours : <select></select></b>
            </div>
        </div>
        <button type="submit" class="btn btn-default">Sauvegarder</button>
    </form>
</div>

</body>
</html>