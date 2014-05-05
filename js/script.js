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

function saveCours(id){
    var date = document.getElementById('date').value;
    var matiere = document.getElementById('matiere'); //Le <select> matiere
    var id_matiere = matiere.options[matiere.selectedIndex].value; //La valeur de l'option choisie
    var promoOption = document.getElementById('promo'); //Le <select> promo
    var promo = promoOption.options[promoOption.selectedIndex].text; //Le texte de l'option choisie
    var contenu = document.getElementById('contenu').value;
    var travail = document.getElementById('travail').value;
    var dateButoir = document.getElementById('dateButoir').value;
    var sujet = document.getElementById('sujet').value;
    var id_interro = document.getElementById('interro').value;
    
    if(contenu==''){
        alert('Veuillez entrer le contenu du cours.');
        document.getElementById('contenu').focus();
        return;
    }
    
    if(dateButoir!=='' && travail==''){ //Si : date butoir précisée mais pas le travail
        alert('Veuillez préciser le travail à faire.');
        document.getElementById('travail').focus();
        return;
    }
    
    if(dateButoir=='' && travail!==''){ //Si : travail précisé mais pas de date butoir
        alert('Veuillez préciser la date butoir du travail à faire.');
        document.getElementById('dateButoir').focus();
        return;
    }
    
    if(document.getElementById('interro').checked && sujet=='') { //Si interro cochée mais pas de sujet
        alert('Veuillez entrer le sujet de l\'interrogation.');
        document.getElementById('sujet').focus();
        return;
    }
    
    if(document.getElementById('interro').checked){
        var interroChecked = '1'; //Case interro cochée
    } else {
        var interroChecked = '0'; //Case interro décochée
    }
    
    if(id==undefined){
        id='';
    }

    $.ajax({url: 'save.php',
            data:{
                date: date,
                id_matiere: id_matiere,
                promo: promo,
                contenu: contenu,
                travail: travail,
                dateButoir: dateButoir,
                sujet: sujet,
                id_cours: id,
                id_interro: id_interro,
                interroChecked: interroChecked
            },
            type: 'POST',
            success: function(response){
                if(response == "ajout ok"){
                    alert('Le cours a été ajouté à la liste.');
                    window.location.replace('accueil.php');
                } else if(response == "modif ok"){
                    alert('Le cours a été modifié.');
                    window.location.replace('search.php');
                } else {
                    alert('Echec de l\'opération.');
                    return;
                }
            }
    });
}

function saveUser(id){
    var typeVal = $('input[name=type]:checked').val();
    if(typeVal=='prof'){
        var type = '0';
    } else if(typeVal=='admin'){
        var type = '1';
    }
    var nom = document.getElementById('nomUser').value;
    var prenom = document.getElementById('prenomUser').value;
    var login = document.getElementById('loginUser').value;
    var password = document.getElementById('passwordUser').value;
    
    var matiereOption = document.getElementById('matiere'); //Le <select> matiere 1
    var matiereOption2 = document.getElementById('matiere2'); //Le <select> matiere 2
    var matiereOption3 = document.getElementById('matiere3'); //Le <select> matiere 3
    
    var matiereId = matiereOption.options[matiereOption.selectedIndex].val; //La valeur de l'option choisie du select 1
    var matiere2Id = matiereOption2.options[matiereOption2.selectedIndex].val; //La valeur de l'option choisie du select 2
    var matiere3Id = matiereOption3.options[matiereOption3.selectedIndex].val; //La valeur de 'option choisie du select 3
    
    var matiere = matiereOption.options[matiereOption.selectedIndex].text; //Le texte de l'option choisie du select 1
    
    if(matiere2Id!='0') {
        var matiere2 = matiereOption.options[matiereOption.selectedIndex].text; //Le texte de l'option choisie du select 2
    } else {
        var matiere2 = '';
    }
    
    if(matiere3Id!='0') {
        var matiere3 = matiereOption.options[matiereOption.selectedIndex].text; //Le texte de l'option choisie du select 3
    } else {
        var matiere3 = '';
    }
    
    if(matiereId=='0'){
        alert('Veuillez choisir la matière principale.');
        return;
    }
    
    if(id==undefined){
        id='';
    }
    
    $.ajax({url: 'saveUser.php',
            data:{
                type: type,
                nom: nom,
                prenom: prenom,
                login: login,
                password: password,
                id: id,
                matiere: matiere,
                matiere2: matiere2,
                matiere3: matiere3,
                matiereId: matiereId,
                matiere2Id: matiere2Id,
                matiere3Id: matiere3Id
            },
            type: 'POST',
            success: function(response){
                if(response == "ajout ok"){
                    alert('L\'utilisateur a été ajouté.');
                    window.location.replace('user.php');
                } else if(response=='modif ok'){
                    alert('L\'utilisateur a été modifié.');
                    window.location.replace('user.php');
                } else {
                    alert('Echec de l\'opération.');
                    return;
                }
            }
    });
}

function readonlySujet(){
    if(document.getElementById('interro').checked) {
            document.getElementById('sujet').readOnly = false;
        } else {
            document.getElementById('sujet').readOnly = true;
        }
}

function corrigerInterro(id){
    $.ajax({url: 'corrigerInterro.php',
            data:{
                id:id
            },
            type: 'POST',
            success: function(response){
                if(response == "ok"){
                    window.location.reload();
                }
            }
    });
}

function delCours(id){
    var areYouSure = confirm('Voulez-vous vraiment supprimer ce cours ?');
    
    if (areYouSure == true) {
        $.ajax({url: 'delCours.php',
            data:{
                id:id
            },
            type: 'POST',
            success: function(response){
                if(response == "ok"){
                    window.location = 'search.php';
                }
            }
        });
    } else {
        return;
    }
}

function delUser(id){
    var areYouSure = confirm('Voulez-vous vraiment supprimer cet utilisateur ?');
    
    if (areYouSure == true) {
        $.ajax({url: 'delUser.php',
            data:{
                id:id
            },
            type: 'POST',
            success: function(response){
                if(response == "ok"){
                    window.location = 'user.php';
                }
            }
        });
    } else {
        return;
    }
}

function filtre()
{
    var matiere = document.getElementById('Matiere');
    var promotion = document.getElementById('promotion');
    var professeur = document.getElementById('professeur');
    var matiereId = matiere.options[matiere.selectedIndex].value; 
    var promotionId = promotion.options[promotion.selectedIndex].value; 
    var professeurId = professeur.options[professeur.selectedIndex].value; 
    
    
    window.location.replace('search.php?matiereId='+matiereId+'&promotionId='+promotionId+'&professeurId='+professeurId+'');
//    alert('id de matiere : '+matiereId+' id de promotion : '+promotionId+' id de professeur : '+professeurId);
//     $.ajax({url: 'search.php',
//            data:{
//                matiereId:matiereId,
//                promotionId:promotionId,
//                professeurId:professeurId
//            },
//            type: 'GET',
//            dataType:'text',
//            success: function(){
//                {
//                    alert('ok');
//                }
//            }
//        });
}