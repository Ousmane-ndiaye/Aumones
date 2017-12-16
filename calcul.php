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
        <title>Site User 1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <h1>Bienvenue dans le site User 1</h1>
    <h2>Tu es user sinon tu n'aurais pas acces à ce site</h2>
    <form action="#" method="post">
        <center><fieldset style="margin-top: 10%; background-color:moccasin; width: 350px;">
            <legend><h2>Calculatrice</h2></legend>
            Nombre 1 : <input type="text" name="login" style="float: right;" required/> <br/> <br/>
            Nombre 2 : <input type="password" name="password" style="float: right;" required/> <br/> <br/>
                 <input type="submit" name="connexion" value="Connexion" style="float: right;"/> <br/> <br/>
        </fieldset></center>
        </form>
    </body>
</html>
<?php
}
else
{
    header('location: accueil.php');
}
?>
