<?php
    session_start();
    if($_SESSION['visiteur']=='admin')
    {
        ?>
        <!DOCTYPE html>
        <html lang="fr" >
        <head>
            <title>Mon super site</title>
            <meta charset="UTF-8"/>
            <link rel="stylesheet" href="com.css"/>
            <style>
                body{
                    background: url("bg2.gif") no-repeat center fixed;
                    background-size: cover;
                    color: red;
                }
            </style>
        </head>
        <body>
            <?php
                $date = date("d-m-Y");
                $heure = date("H:i");
                echo"<h4 style='text-align: center; border: 1px solid black; width: 250px; height: 20px;'>Dakar, le $date | $heure</h4>";
                echo"
                    <center><fieldset style='margin-top: 3%; width: 350px;'>
                    <legend><h2>Bienvenue dans la session Admin</h2></legend>
                    <h3>Menu</h3>
                        <ol>
                            <li><a style='background-color: red; color: white; font-size: 20px;' href='editeur.php'>Site de l'editeur</a></li>
                            <li><a style='background-color: red; color: white; font-size: 20px;' href='tableau.php'>Site du tableau</a></li>
                        </ol>
                        <form method='post' action='#'>
                            <input type='submit' name='deconnexion' value='Déconnexion'/>
                        </form>
                    </fieldset></center>
                ";
                if (isset($_POST['deconnexion']))
                {
                    session_destroy();
                    header("location: accueil.php");
                }
            ?>
        </body>
        </html>
        <?php
    }
    else
    {
        header("location: accueil.php");
    }
?>