<?php
session_start();
require_once("db.php");
require_once("header.php");

// tester si la session existe
if (!empty($_SESSION)) {
    require_once("navbar.php");

    $page = $_GET["page"];

    switch ($page) {
        // pages utilisateur
        case 'home':
            require_once("home.php");
            break;
        case 'listeuser':
            require_once("listeuser.php");
            break;
        case 'ajoutuser':
            require_once("ajoutuser.php");
            break;
        case 'modifUser':
            $id = $_GET["id"];
            $sql = "SELECT * FROM utilisateur WHERE idUser=$id";
            $result = mysqli_query($connection, $sql);
            $user = mysqli_fetch_row($result);
            require_once("modifuser.php");
            break;
        case 'deletUser':
            $id = $_GET["id"];
            $sql = "DELETE FROM utilisateur WHERE idUser=$id";
            mysqli_query($connection, $sql);
            require_once("listeuser.php");
            break;

        // pages client
        case 'listeclient':
            require_once("listeclient.php");
            break;
        case 'ajoutclient':
            require_once("ajoutclient.php");
            break;
        case 'modifClient':
            $id = $_GET["id"];
            $sql = "SELECT * FROM client WHERE idClient=$id";
            $result = mysqli_query($connection, $sql);
            $user = mysqli_fetch_row($result);
            require_once("modifclient.php");
            break;
        case 'deletClient':
    $id = intval($_GET["id"]);
    $sql = "DELETE FROM client WHERE idClient = $id";
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
    require_once("listeclient.php");
    break;


        // pages compte
        case 'listecompte':
            require_once("listecompte.php");
            break;
        case 'ajoutcompte':
            require_once("ajoutcompte.php");
            break;
        case 'modifCompte':
            $id = $_GET["id"];
            $sql = "SELECT * FROM compte WHERE idCompte=$id";
            $result = mysqli_query($connection, $sql);
            $user = mysqli_fetch_row($result);
            require_once("modifcompte.php");
            break;
        case 'deletCompte':
            $id = $_GET["id"];
            $sql = "DELETE FROM compte WHERE idCompte=$id";
            mysqli_query($connection, $sql);
            require_once("listecompte.php");
            break;

        // pages transaction
        case 'transactions':
            require_once("transaction.php");
            break;
        case 'retrait':
            require_once("retrait.php");
            break;
        case 'depot':
            require_once("depot.php");
            break;
        case 'historique':
            require_once("historique.php");
            break;

        // déconnexion
        case 'deconnexion':
            session_unset();
            header("location:index.php");
            break;

        default:
            // aucun comportement défini pour les autres valeurs
            break;
    }

    require_once("footer.php");
} else {
    require_once("pageconnexion.php");
}