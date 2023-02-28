<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>

<body style="background: antiquewhite">
    <div style="color: olivedrab" ><?php echo 'Bienvenue !'; ?></div>

    <button><a href="create.php">Ajouter une randonnée</a></button>

    <button><a href="read.php">liste des randonnées</a></button>

<form action="logout.php" method="post">
        <button type="submit" name="button">Se déconnecter</button>

</form>

</body>
</html>


