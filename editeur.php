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
    $liste_perso = array(array(001,'Ndiaye', 23), array(002, 'Gomis', 22), array(003, 'Lam', 20), array(004, 'Gueye', 24), array(005, 'Diop', 26));
    if(isset($_GET['valider']))
    {
        extract($_GET);
        if($age<=0 || $age>100)
        {
        echo'L\'age que avez n\'est pas correcte. Svp retourner et revoyer ce que vous avez tapé.<br/>';
        echo'<a href="teste_url_02.php?code='.$code.'&amp;nom='.$nom.'&amp;age='.$age.'">RETOUR</a>';
        }
        else
        {
            for($i=0; $i<count($liste_perso); $i++)
            {
               if($code==$liste_perso[$i][0])
                {
                    $liste_perso[$i][1]=$nom;
                    $liste_perso[$i][2]=$age;
                }
            }
            echo"<table border='1' width='500'>";
            echo"
                <tr>
                    <td>Code</td><td>Nom</td><td>Age</td><td>&nbsp;</td>
                </tr>
            ";
            for($i=0; $i<count($liste_perso); $i++)
            {
                echo'
                    <tr>
                        <td>'.$liste_perso[$i][0].'</td><td>'.$liste_perso[$i][1].'</td><td>'.$liste_perso[$i][2].'</td><td><a href="editeur_1.php?code='.$liste_perso[$i][0].'&amp;nom='.$liste_perso[$i][1].'&amp;age='.$liste_perso[$i][2].'">Modifier</a></td>
                    </tr>
                ';
            }
        }
    }
    else
    {
        echo"<table border='1' width='500'>";
        echo"
            <tr>
                <td>Code</td><td>Nom</td><td>Age</td><td>&nbsp;</td>
            </tr>
        ";
        for($i=0; $i<count($liste_perso); $i++)
        {
            echo'
                <tr>
                    <td>'.$liste_perso[$i][0].'</td><td>'.$liste_perso[$i][1].'</td><td>'.$liste_perso[$i][2].'</td><td><a href="editeur_1.php?code='.$liste_perso[$i][0].'&amp;nom='.$liste_perso[$i][1].'&amp;age='.$liste_perso[$i][2].'">Modifier</a></td>
                </tr>
            ';
        }
    }
}
else
{
    header("location: accueil.php");
}
?>
