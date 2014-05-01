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
    });
}

function save(){
    var date = document.getElementById('date').value;
    var matiere = document.getElementById('matiere'); //Le <select> matiere
    var id_matiere = matiere.options[matiere.selectedIndex].value; //La valeur de l'option choisie
    var promoOption = document.getElementById('promo'); //Le <select> promo
    var promo = promoOption.options[promoOption.selectedIndex].text; //Le texte de l'option choisie
    var contenu = document.getElementById('contenu').value;
    var travail = document.getElementById('travail').value;
    
    if(contenu==''){
        alert('Veuillez entrer le contenu du cours.');
        document.getElementById('contenu').focus();
        return;
    }
    
    $.ajax({url: 'save.php',
            data:{
                date: date,
                id_matiere: id_matiere,
                promo: promo,
                contenu: contenu,
                travail: travail
            },
            type: 'POST',
            success: function(response){
                if(response == "ok"){
                    alert('Le cours a été ajouté à la liste.');
                    window.location.replace('accueil.php');
                } else {
                    alert('La création du cours a échoué.');
                    return;
                }
            }
    });
}

function modif(id_cours){
    var date = document.getElementById('date').value;
    var matiere = document.getElementById('matiere'); //Le <select> matiere
    var id_matiere = matiere.options[matiere.selectedIndex].value; //La valeur de l'option choisie
    var promoOption = document.getElementById('promo'); //Le <select> promo
    var promo = promoOption.options[promoOption.selectedIndex].text; //Le texte de l'option choisie
    var contenu = document.getElementById('contenu').value;
    var travail = document.getElementById('travail').value;
    
    if(contenu==''){
        alert('Veuillez entrer le contenu du cours.');
        document.getElementById('contenu').focus();
        return;
    }
    
    $.ajax({url: 'modif.php',
            data:{
                date: date,
                id_matiere: id_matiere,
                id_cours: id_cours,
                promo: promo,
                contenu: contenu,
                travail: travail
            },
            type: 'POST',
            success: function(response){
                if(response == "ok"){
                    alert('Le cours a été modifié.');
                    window.location.replace('search.php');
                } else {
                    alert('La modification du cours a échoué.');
                    return;
                }
            }
    });
}

function addUser(){
    alert("test");
}