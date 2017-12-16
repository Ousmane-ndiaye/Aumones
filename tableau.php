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
?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <title>Mon tableau</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <div style="margin auto;">
        <form method="post" action="#">
             Veuillez choisir un nombre svp :
            <select name="choix">
                <option value="">Nombre</option>
                <?php for($i=2;$i<=80;$i++)
                echo"<option value='$i'>$i</option>";
                ?>
            </select>
            <input type="submit" name="valider" value="Générer" required>
        </form>
        <?php
        if(isset($_POST['valider']) && isset($_POST['choix']))
        extract($_POST);
        {
            if(empty($choix))
            {
                //echo"Veuillez choisir un nombre svp.";
            }
            else
            {
            echo"<br/><br/><br/><br/><table border='1'>";
            $cR=0; $cB=$choix-1;
            for($i=0;$i<$choix;$i++)
            {
                echo"<tr>";
                for($j=0;$j<$choix;$j++)
                {
                    if ($j==$cR && $j==$cB)
                    {
                        echo"<td style='background-color: green; color: green;'> ($i,$j) <br/></td>";
                    }
                    elseif ($j==$cB)
                    {
                        echo"<td style='background-color: blue; color: blue;'> ($i,$j) <br/></td>";
                    }
                    elseif ($j==$cR)
                    {
                        echo"<td style='background-color: red; color: red;'> ($i,$j) <br/></td>";
                    }
                    else
                    {
                        echo"<td style='background-color: yellow; color: yellow;'> ($i,$j) <br/></td>";
                    }
                }
                $cR++; $cB--;
                echo"</tr>";
            }
            echo"</table>";
            }
        }
        ?>
    </div>
    </body>
    </html>
<?php
}
else
{
    header("location: accueil.php");
}
?>
