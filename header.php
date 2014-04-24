<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="css/style.css"/>
        <title><?php echo $titre; ?></title>
    </head> 
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">CTE</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->

            <form class="navbar-form navbar-right cache" role="search">
                <button type="submit" class="btn btn-default">Déconnection</button>
            </form>
        </li>
    </ul>
</div><!-- /.navbar-collapse -->
</nav>
<?php
if ($titre == 'connection') {
    echo 'Vous n\'ètes pas connecté'; 
} else {
    ?>
    <div class="bande-gauche">
        <div class="menu-gauche" >
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#">Nouveau</a></li>
                <li><a href="#">Rechercher</a></li>
            </ul>
        </div>
    </div>
<?php
}?>