function login(){
    var email = document.getElementById('inputEmail3').value;
    var mdp = document.getElementById('inputPassword3').value;

    if (email == ''){
            alert('Veuillez entrer votre adresse email !');
            return false;
    }

    if (mdp == ''){
            alert('Veuillez entrer votre mot de passe !');
            return false;
    }

    $.ajax({url: 'login.php',
            data: {email: email, mdp : mdp},
            type: 'POST',
            success: function(response){
                if(response == "ok"){
                    window.location.replace('accueil.php');
                } else {
                    alert('Identifiants de connexion incorrects');
                    document.getElementById('inputPassword3').value = '';
                    return;
                }
            }
    })
}