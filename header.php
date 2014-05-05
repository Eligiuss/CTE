<?php
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/style.css"/>
        <script src="js/jquery.js"></script>
        <script src="js/script.js"></script>
        <title><?php echo $titre; ?></title>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php
                if($titre !== 'Connexion') {
                    session_start();
                    echo '<li><a>Connecté en temps que : ' . $_SESSION['nom_user'] . ' ' . $_SESSION['prenom_user'].'</a></li>';
                    echo '<input type="button" class="btn btn-default" id="logout" value="Déconnexion" onclick="location.href=\'logout.php\'" />';
                }
            ?>
        </ul>
</nav>
<?php
    if ($titre == 'Connexion') {
        echo '&nbspVous n\'êtes pas connecté.'; 
    } else {
?>
    <div class="bande-gauche">
        <div class="menu-gauche" >
            <ul class="nav nav-pills nav-stacked">
                <h5 class="titreSection">COURS</h5>
                <li <?php if ($_SERVER['PHP_SELF'] == "/CTE/accueil.php") echo "class='active'"; ?>><a href="accueil.php">Nouveau</a></li> <!--Si la page actuelle est 'accueil.php', on ajoute la classe 'active' à l'élément-->
                <li <?php if (($_SERVER['PHP_SELF'] == "/CTE/search.php") || ($_SERVER['PHP_SELF'] == "/CTE/modifCours.php")) echo "class='active'"; ?>><a href="search.php">Rechercher</a></li>
                <li <?php if ($_SERVER['PHP_SELF'] == "/CTE/interro.php") echo "class='active'"; ?>><a href="interro.php">Interrogations</a></li>
                <li <?php if ($_SERVER['PHP_SELF'] == "/CTE/syllabus.php") echo "class='active'"; ?>><a href="syllabus.php">Syllabus</a></li>
                <br/><br/><br/>
                
                <?php
                    if($_SESSION['type']=='1'){ //SECTION VISIBLE UNIQUEMENT PAR LES ADMINS
                ?>
                        <h5 class="titreSection">ADMINISTRATION</h5>
                        <li <?php if (($_SERVER['PHP_SELF'] == "/CTE/user.php") || ($_SERVER['PHP_SELF'] == "/CTE/addUser.php") || ($_SERVER['PHP_SELF'] == "/CTE/modifUser.php")) echo "class='active'"; ?>><a href="user.php">Gestion des utilisateurs</a></li>
                        <li <?php if ($_SERVER['PHP_SELF'] == "/CTE/historique.php") echo "class='active'"; ?>><a href="historique.php">Historique</a></li>
                        <br/>
                <?php
                    } //FIN SECTION ADMIN
                ?>
            </ul>
        </div>
    </div>
<?php
}?>