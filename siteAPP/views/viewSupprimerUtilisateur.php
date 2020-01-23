<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="views/CSS/CSSSupprimerUtilisateur.css">
    <title>SuppUtil</title>
</head>
<body>


<h3>Supprimer un utilisateur :</h3>

<br>
<br>
<br>
    <form action="index.php?action=supprimer_utilisateur" method="post">
        <p>Entrez un numéro d'utilisateur à supprimer :

            <input name="numero"/>
            <input type="submit" value="Supprimer"/>
        </p>
    </form>
</body>
</html>
