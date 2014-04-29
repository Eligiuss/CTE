<?php
    $titre = 'Connexion';
    include 'header.php';
?>
<html>
    <body>
        <div class="center-block form-start" >
            <form class="form-horizontal" role="form">
                <h2 class="titre-start">Connexion</h2>
                </br>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Mot de passe</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Mot de passe">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Se souvenir de moi
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="button" class="btn btn-default" onclick="login()" value="Connexion">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
