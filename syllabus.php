<?php
    $titre = 'Syllabus';
    include('header.php');
    include('connection_BDD.php');
    
    if(!isset($_SESSION["ID"])){
        header('Location: index.php');
    }
?>

<div class="nouveau">
    <div class="milieuPage">
        <h2 class="text-center">Visualiser les syllabus</h2>
        </br>
        <label for="matiere">Matière</label>
        <select id="matiereSyllabus" class="form-control">
            <option value="0">Choisissez une matière...</option>
            <?php
                include 'Connection_BDD.php';

                $SQL = "SELECT ID,nom FROM matiere";
                $rs=$cnx->query($SQL);

                while($info=$rs->fetch_object()){
                    echo '<option value="'.$info->nom.'">'.$info->nom.'</option>';
                }
            ?>
        </select>
    </div>
    <br/>
    <div class="milieuPage">
        <input type="button" class="btn btn-primary btn-lg center-block" value="Visualiser" onclick="syllabus()" />
    </div>
</div>

    


