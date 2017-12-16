<?php
session_start();
if($_SESSION['visiteur']=='admin')
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
    extract($_GET);
    echo'
    <form width="500" method="get" action="editeur.php">
        <center><fieldset >
        <legend>Modification</legend>
            code : <input type="text" name="code" value="'.$code.'" readonly/> <br/> <br/>
            nom :  <input type="text" name="nom" value="" placeholder="'.$nom.'" required/> <br/> <br/>
            age :  <input type="text" name="age" value="" placeholder="'.$age.'"required/> <br/> <br/>
                <input type="submit" name="valider" value="Valider"/>
        </fieldset></center>
    </form>
    ';
}
else
{
    header("location: accueil.php");
}
?>
