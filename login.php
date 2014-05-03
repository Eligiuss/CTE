<?php 
    if( (isset($_POST['email'])) && (isset($_POST['mdp'])) ) {
        $login = $_POST['email'];
        $mdp = $_POST['mdp'];
    } else {
        exit;
    }
    
    include 'Connection_BDD.php';
    
    $SQL = "SELECT * FROM utilisateur WHERE login= '".$login."' ";
    $rs=$cnx->query($SQL);
    
    while($info=$rs->fetch_object()) {
        if(($info->login == $login) && ($info->password == $mdp)) {
            session_start();
            $_SESSION['login'] = $_POST['email'];
            $_SESSION['password'] = $_POST['mdp'];
            $_SESSION['ID'] = $info->ID;
            $_SESSION['type'] = $info->type;
            $_SESSION['nom_user']= $info->nom;
            $_SESSION['prenom_user']= $info->prenom;
            echo 'ok';
        } else {
            echo 'non';
            exit;
        }
    }   
?>