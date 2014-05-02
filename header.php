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
        <script src="js/jquery.js"></script>
        <script src="js/script.js"></script>
        <title><?php echo $titre; ?></title>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
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
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a><?php
                    if($titre !== 'Connexion') {
                    session_start();
                    echo 'Connecter en temps que :' . $_SESSION['nom_user'] . ' ' . $_SESSION['prenom_user'];}
                ?></a>
                </li>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php
                if($titre !== 'Connexion') {
                    echo '<input type="button" class="btn btn-default" id="logout" value="Déconnexion" onclick="location.href=\'logout.php\'" />';
                }
            ?>
        </ul>
</nav>
<?php
    if ($titre == 'Connexion') {
        echo 'Vous n\'êtes pas connecté'; 
    } else {
?>
    <div class="bande-gauche">
        <div class="menu-gauche" >
            <ul class="nav nav-pills nav-stacked">
                <h4 class="titreSection">COURS</h4>
                <li <?php if ($_SERVER['PHP_SELF'] == "/CTE/accueil.php") echo "class='active'"; ?>><a href="accueil.php">Nouveau</a></li>
                <li <?php if ($_SERVER['PHP_SELF'] == "/CTE/search.php") echo "class='active'"; ?>><a href="search.php">Rechercher</a></li>
                <li <?php if ($_SERVER['PHP_SELF'] == "/CTE/syllabus.php") echo "class='active'"; ?>><a href="syllabus.php">Syllabus</a></li>
                <br/><br/><br/>
                
                <h4 class="titreSection">ADMINISTRATION</h4>
                <li <?php if ($_SERVER['PHP_SELF'] == "/CTE/user.php") echo "class='active'"; ?>><a href="user.php">Gestion des utilisateurs</a></li>
                <li <?php if ($_SERVER['PHP_SELF'] == "/CTE/historique.php") echo "class='active'"; ?>><a href="historique.php">Historique</a></li>
                <br/>
            </ul>
        </div>
    </div>
<?php
}?>