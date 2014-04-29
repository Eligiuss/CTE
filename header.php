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
        <script src="js/script.js"></script>
        <script src="js/jquery.js"></script>
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
            <?php
                if($titre !== 'Connexion') {
                    echo '<input type="button" class="btn btn-default" id="logout" value="Déconnexion" onclick="location.href=\'logout.php\'" />';
                }
            ?>
        </li>
    </ul>
</div><!-- /.navbar-collapse -->
</nav>
<?php
if ($titre == 'Connexion') {
    echo 'Vous n\'êtes pas connecté'; 
} else {
    ?>
    <div class="bande-gauche">
        <div class="menu-gauche" >
            <ul class="nav nav-pills nav-stacked">
                <?php
                    if($active=="index"){
                        echo '<li class="active"><a href="accueil.php">Nouveau</a></li>
                              <li><a href="search.php">Rechercher</a></li>
                              <li><a href="syllabus.php">Syllabus</a></li>';
                    } else if ($active=="search") {
                        echo '<li><a href="accueil.php">Nouveau</a></li>
                              <li class="active"><a href="search.php">Rechercher</a></li>
                              <li><a href="syllabus.php">Syllabus</a></li>';
                    } else if ($active=="syllabus") {
                        echo '<li><a href="accueil.php">Nouveau</a></li>
                              <li><a href="search.php">Rechercher</a></li>
                              <li class="active"><a href="syllabus.php">Syllabus</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
<?php
}?>