<?php
session_start();
if($_SESSION['visiteur']=='user')
{
?>
<form method='post' action='#' style="float: right;">
   <label for="profil"> Bonjour <?php echo $_SESSION['visiteur']; ?> </label> <input type='submit' name='deconnexion' value='Déconnexion'/>
</form>
<?php
    if (isset($_POST['deconnexion']))
    {
        session_destroy();
        header("location: accueil.php");
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Site User 2</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <h1>Bienvenue dans le site User 2</h1>
    <h2>Tu es user sinon tu n'aurais pas acces à ce site</h2>
    </body>
</html>
<?php
}
else
{
header("location: accueil.php");
}
?>
