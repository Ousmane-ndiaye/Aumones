<?php
session_start();
if (isset($_SESSION['new']) && $_SESSION['new']=='new_visiteur')
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
    function generer_mot_de_passe($nb_caractere)
    {
        $mot_de_passe = "";
        $chaine = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ023456789";
        $longeur_chaine = strlen($chaine);
        for($i = 1; $i <= $nb_caractere; $i++)
        {
            $place_aleatoire = mt_rand(0,($longeur_chaine-1));
            $mot_de_passe .= $chaine[$place_aleatoire];
        }
        return $mot_de_passe;
    }
    //récupération du login et du profil et aussi génération d'un mot de passe
    $login = $_SESSION['new_login'];
    $password = generer_mot_de_passe(8);
    $profil = $_SESSION['new_profil'];

    $nbre_d_utilisateur = fopen('nbre_d_utilisateur.txt', 'r+');
    $nombre = fgets($nbre_d_utilisateur);
    $nombre += 1;
    fseek($nbre_d_utilisateur, 0);
    fputs($nbre_d_utilisateur, $nombre);
    fclose($nbre_d_utilisateur);
    $nouveau_liste = fopen('nouveauliste.txt','a+');
    $fin="-\r\n";
    fputs($nouveau_liste,$login.'-'.$password.'-'.$profil.'-'.$fin);
    //fin d'insertion des donnnées du nouvelle utilisateur
    echo"Vous etes maintenant l'un des notres et vous vous etes connecté en tant que $profil. <br/>";
    echo"Vous etes notre $nombre eme utilisateur.";
    echo"Votre login est $login. <br/>";
    echo"Votre mot de passe est $password, notez le quelque part pour en cas d'oublie.<br/><br/>";
    echo"<a href='accueil.php'>Cliquez-ici pour aller à l'accueil et vous connectez</a>";
    fclose($nouveau_liste);
}
else
{
    header('location: accueil.php');
}

?>