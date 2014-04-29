<?php 
    if( (isset($_POST['email'])) && (isset($_POST['mdp'])) ) {
        $login = $_POST['email'];
        $mdp = $_POST['mdp'];
    } else {
        exit;
    }
    
    $hote='127.0.0.1';
    $user='root';
    $passwd='';
    $database='cte';
    $cnx=new mysqli($hote,$user,$passwd,$database);
    
    $SQL = "SELECT * FROM utilisateur WHERE login= '".$login."' ";
    $rs=$cnx->query($SQL);
    
    while($info=$rs->fetch_object()) {
        if(($info->login == $login) && ($info->password == $mdp)) {
            session_start();
            $_SESSION['login'] = $_POST['email'];
            $_SESSION['password'] = $_POST['mdp'];
            $_SESSION['ID'] = $info->ID;
            echo 'ok';
        } else {
            echo 'non';
            exit;
        }
    }   
?>