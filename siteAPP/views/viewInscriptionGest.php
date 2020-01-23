<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="views/CSS/CSSInscription.css">
    <title>1ère étape d'inscription</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>

<script>

    $(document).ready(function() {
        $("#etape2").hide();
        $("#etape3").hide();
    });

    function step2() {
        var nom = document.getElementById("nom").value;
        if (nom == "") {
            alert("Last name must be filled out!");
            return false;
        }

        var prenom = document.getElementById("prenom").value;
        if (prenom == "") {
            alert("Name must be filled out!");
            return false;
        }

        $("#etape1").hide();
        $("#etape2").show();
    }
    function backToStep1() {
        $("#etape1").show();
        $("#etape2").hide();
    }

    function step3() {

        var identifiant = document.getElementById("identifiant").value;
        /*if(!/^[A-Z]+$/.test(identifiant)){
            alert("Please only enter numeric characters only for your Age! (Allowed input:0-9)")
        }*/
        if (identifiant == "") {
            alert("identifiant must be filled out!");
            return false;
        }

        var identifiantConfirmer = document.getElementById("identifiantConfirmer").value;
        if (identifiantConfirmer != identifiant) {
            alert("identifientConfirmer ");
            return false;
        }

        var mot_de_passe = document.getElementById("mot_de_passe").value;
        if (mot_de_passe == "") {
            alert("mot_de_passe must be filled out!!!!!!!!!!!!!!!!!!!!!");
            return false;
        }

        if (mot_de_passe.length < 8 || mot_de_passe.length > 128) {
            alert("The password need to be between 8 and 128 characters!");
            return false;
        }


        var verifier_mot_de_passe = document.getElementById("verifier_mot_de_passe").value;
        if (verifier_mot_de_passe != mot_de_passe) {
            alert("verifier_mot_de_passe must be filled out!!!!!!!!!!!!!!!!!!!!!");
            return false;
        }
        $("#etape2").hide();
        $("#etape3").show();
    }
    function backToStep2() {
        $("#etape2").show();
        $("#etape3").hide();
    }




</script>


<form method="post" action="index.php?action=inscription_gest">

    <div class="etape1" id="etape1">
        <br/>
        <input placeholder="Nom : " type="text" name="nom" id="nom" required>
        <label for="nom"> </label>
        <br/> <br/>
        <input placeholder="Prénom : " type="text" name="prenom" id="prenom">
        <label for="prenom"></label>
        <br/> <br/>
        <input type="button" onclick="step2();">Continuer</input>
        <br/> <br/>
    </div>

    <div class="etape2" id="etape2">
        <br/>
        <input placeholder=" Identifiant : " type="email" name="identifiant" id="identifiant" required>
        <label for="identifiant"> </label>
        <br/> <br/>
        <input placeholder="Confirmer votre identifiant : " type="email" name="identifiantConfirmer" id="identifiantConfirmer">
        <label for="identifiantConfirmer"></label>
        <br/> <br/>
        <input placeholder=" Mot de passe (8 caractères minimum) : " type="password" name="motDePasse" id="mot_de_passe" minlength="8" required>
        <label for="Mot_de_passe"> </label>
        <br/> <br/>
        <input placeholder="Confirmer votre mot de passe : " type="password" name = "verifierMotDePasse" id = "verifier_mot_de_passe">
        <label for="verifier_mot_de_passe"></label>
        <br/> <br/>
        <input type="button" onclick="backToStep1();">Retour</input>
        <input type="button" onclick="step3();">Continuer</input>
        <br/> <br/>
    </div>

    <div class="etape3" id="etape3">
        <br/>
        <input placeholder=" Age : " type="age" name="age" id="age">
        <label for="age"> </label>
        <br/> <br/>
        <input placeholder="Poids en kilogramme : " type="poids" name="poids" id="poids">
        <label for="poids"></label>
        <br/> <br/>
        <input placeholder="Taille en mètre : " type="taille" name="taille" id="taille">
        <label for="taille"> </label>
        <br/> <br/>
        <input placeholder="Informations complémentaires : " type="infocompl" name = "infocompl" id = "infocompl">
        <label for="infocompl"></label>
        <br/> <br/>
        <button type="submit" name="Submit3">S'inscrire</button>
        <br/> <br/>
    </div>
</form>


<br/> <br/>

</body>
</html>