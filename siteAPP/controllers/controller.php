<?php
require "modeles/database_connexion.php";
require "modeles/model.php";

function seeHome()
{
    see_header();
    require "views/viewHome.php";
    require "views/template/footer.php";
}

function seeConnexion()
{
    see_header();
    switch ($_SESSION["role"]) {
        case "gest" :
            require "views/viewAccueilGestionnaire.php";
            break;
        case "admin" :
            require "views/viewAccueilAdmin.php";
            break;
        case "user" :
            require "views/viewResultatsUtilisateur.php";
        default :
            require "views/viewConnexion.php";
            break;
    }
    require "views/template/footer.php";
}

function seeMotDePasseOublie()
{
    see_header();
    require "views/viewMotDePasseOublie.php";
    require "views/template/footer.php";
}

function seeContact()
{
    see_header();
    require "views/viewContact.php";
    require "views/template/footer.php";
}

function seeForum()
{
    see_header();
    require "views/viewForum.php";
    require "views/template/footer.php";
}

function erreurConnexion()
{
    see_header();
    require "views/viewConnexion.php";
    echo "Cette combinaison adresse mail et mot de passe est incorrecte";
    require "views/template/footer.php";
}

function mentions()
{
    see_header();
    require "views/viewMentions.php";
    require "views/template/footer.php";
}

function connexion()
{
    if ($_POST["identifiant"] && $_POST["mot_de_passe"]) {
        $identifiant = htmlspecialchars($_POST["identifiant"]);
        $mot_de_passe = htmlspecialchars($_POST["mot_de_passe"]);
        $mail = checkIn($identifiant, $mot_de_passe);
        if ($mail[0] == $identifiant) {
            $id = getID($identifiant);
            $role = getRole($identifiant);
            $_SESSION["inscriptionID"] = $id[0];
            $_SESSION["role"] = $role[0];
            seeConnexion();
        } else {
            erreurConnexion();
        }
    } else {
        erreurConnexion();
    }
}

function see_donnees_utilisateur()
{
    see_header();
    require "views/viewResultatsAdmin.php";
    require "views/template/footer.php";

}

function see_inscrire_gestionnaire()
{
    see_header();
    require "views/viewInscriptionGest.php";
    require "views/template/footer.php";

}

function see_supprimer_gestionnaire()
{
    see_header();
    require "views/viewSupprimerGestionnaire.php";
    require "views/template/footer.php";

}

function see_inscrire_nouvel_utilisateur()
{
    see_header();
    require "views/viewInscriptionUtilisateur.php";
    require "views/template/footer.php";

}

function see_supprimer_utilisateur()
{
    see_header();
    require "views/viewSupprimerUtilisateur.php";
    require "views/template/footer.php";
}

function see_user_data()
{
    see_header();
    require "views/viewResultatsUtilisateur.php";
    require "views/template/footer.php";
}

function see_header()
{
    switch ($_SESSION["role"]) {
        case "admin" :
            require "views/template/headerAdmin.php";
            break;
        case "gest" :
            require "views/template/headerGest.php";
            break;
        case "user":
            require "views/template/headerUtilisateur.php";
            break;
        default :
            require "views/template/header.php";
    }
}

function supprimer_utilisateur()
{
    if (isset($_POST["numero"])) {
        $numero = htmlspecialchars($_POST["numero"]);
        $reponse = getUserByNumero($numero);
        $request = deleteUserByNumero($numero);
        //$bdd->query($request);
        if ($request == FALSE) {
            $Color = "white";
            echo '<center>' . '<div style="Color:' . $Color . '">' . 'Echec de la requête.<br />';
        } else {
            $Color = "white";
            echo '<center>' . '<div style="Color:' . $Color . '">' . $reponse['nom'] . ' ' . $reponse['nom'] . ' a bien été supprimé' . '</div>';
        }
    } else {
        see_supprimer_utilisateur();
    }
}

function supprimer_gestionnaire()
{
    if (isset($_POST["numero"])) {
        $numero = htmlspecialchars($_POST["numero"]);
        $reponse = getUserByNumero($numero);
        $request = deleteUserByNumero($numero);
        //$bdd->query($request);
        if ($request == FALSE) {
            $Color = "white";
            echo '<center>' . '<div style="Color:' . $Color . '">' . 'Echec de la requête.<br />';
        } else {
            $Color = "white";
            echo '<center>' . '<div style="Color:' . $Color . '">' . $reponse['nom'] . ' ' . $reponse['nom'] . ' a bien été supprimé' . '</div>';
        }
    } else {
        see_supprimer_utilisateur();
    }
}

function inscription_utilisateur()
{
    if (isset($_POST['Submit3'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $identifiant = $_POST['identifiant'];
        $identifiantConfirmer = $_POST['identifiantConfirmer'];
        $motDePasse = $_POST['motDePasse'];
        $verifierMotDePasse = $_POST['verifierMotDePasse'];
        $age = $_POST['age'];
        $poids = $_POST['poids'];
        $taille = $_POST['taille'];
        $infocompl = $_POST['infocompl'];
        $role = "user";
        inscriptionUtilisateur($nom, $prenom, $identifiant, $motDePasse, $age, $poids, $taille, $infocompl, $role);
        seeConnexion();
    } else {
        see_inscrire_nouvel_utilisateur();
    }
}

function inscription_gest()
{
    if (isset($_POST['Submit3'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $identifiant = $_POST['identifiant'];
        $identifiantConfirmer = $_POST['identifiantConfirmer'];
        $motDePasse = $_POST['motDePasse'];
        $verifierMotDePasse = $_POST['verifierMotDePasse'];
        $age = $_POST['age'];
        $poids = $_POST['poids'];
        $taille = $_POST['taille'];
        $infocompl = $_POST['infocompl'];
        $role = "gest";
        inscriptionUtilisateur($nom, $prenom, $identifiant, $motDePasse, $age, $poids, $taille, $infocompl, $role);
        seeConnexion();
    } else {
        see_inscription_gest();
    }
}

function see_test()
{
    see_header();
    require "views/pageTest/viewPageTest1.php";
    require "views/template/footer.php";
}

function see_historique()
{
    see_header();
    require "views/pageTest/viewHistorique.php";
    require "views/template/footer.php";
}

