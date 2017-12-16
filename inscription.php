<?php
session_start();
if(isset($_SESSION['visiteur']) && $_SESSION['visiteur']=='admin' || isset($_SESSION['visiteur']) && $_SESSION['visiteur']=='user')
{
    echo"Chère utilisateur vous vous êtes deja inscrit, vous n'avez plus acces à ce site.";
}
else
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
        ?>
        <div id="info">
            <center><fieldset style="margin-top: 10%; width: 350px;">
                <legend><h2>Page D'inscription</h2></legend>
                <form action="#" method="post">
                    LOGIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type="text" name="login" style="float: right;" required/> <br/> <br/>
                    <select name="profil" style="float: right;" required/>
                        <option value="">Profil</option>
                        <option value="user">USER</option>
                        <option value="admin">ADMIN</option>
                    </select><br/> <br/>
                    <input type="submit" name="inscription" value="Inscription" style="float: right;"/> <br/> <br/>
                </form>
                <?php
                    if(isset($_POST['login']) && isset($_POST['profil']))
                    {
                        extract($_POST);
                        $nbre_de_login=0; //Compteur qui me permet de savoir le nombre de login existant et identique au nouveau login
                        $nbre_d_utilisateur = fopen('nbre_d_utilisateur.txt', 'r+'); //mon liste qui contient le nombre d'utilisateur
                        $nombre = fgets($nbre_d_utilisateur); //Le nombre d'utilisateur se trouvant dans mon liste d'utilisateur
                        $listUtilisateur = fopen('nouveauliste.txt','r');
                        for($i=0; $i<$nombre; $i++)
                        {
                            $Utilisateur = fgets($listUtilisateur);
                            $donnee = explode("-",$Utilisateur);
                            $login0=strval($donnee[0]);
                            if($login==$login0)
                            {
                                $nbre_de_login++;
                            }
                        }
                        /*do {

                            $line = fgets($listUtilisateur);
                            $donnee =  explode("-",$line);
                            if($login==$donnee[0])
                            {
                                echo"Ce login existe deja";
                            }
                            else
                            {
                                $_SESSION['new']='new_visiteur';
                                $_SESSION['new_profil'] = $profil;
                                $_SESSION['new_login'] = $login;
                                header("location: verif.php");
                            }

                        } while ($line = fgets($listUtilisateur) == true);*/
                        fclose($listUtilisateur);
                        fclose($nbre_d_utilisateur);
                        if(isset($nbre_de_login) && ($nbre_de_login>=1))
                        {
                            echo"Désolé ce nom d'utilisateur existe déja, Svp choisisez un autre";
                        }
                        else
                        {
                            $_SESSION['new']='new_visiteur';
                            $_SESSION['new_profil'] = $profil;
                            $_SESSION['new_login'] = $login;
                            header("location: verif.php");
                        }
                    }
                ?>
            </fieldset></center>
        </div>
    </body>
    </html>
<?php
}
?>
