<?php
session_start();
include_once "header.php";
require_once "models/personneBD.php";

if (isset($_POST['btnConnect'])) {
    //Extraction des données du tableau $_POST permettant que tous les names du formulaire soient des variables
    extract($_POST);
    $mdp = sha1($mdp);
    $user = findUser($login, $mdp);
    if ($user == null) { //Aucun utilisateur n'existe avec le login et mdp passé en params
        echo '<div class="alert alert-danger text-primary col-md-5 container mt-3">Login ou Mot de Passe incorrect !</div>';
    } else {
        $_SESSION['id'] = $user['idP'];
        $_SESSION['prenom'] = $user['prenomP'];
        $_SESSION['nom'] = $user['nomP'];
        $_SESSION['login'] = $user['login'];
        //Redirection vers une autre page
        header("location:http://localhost/projet_exam/messages.php");
    }
}
if (isset($_GET['Enregistrer'])) {
    extract($_POST);
    $mdp = sha1($mdp);
    $user = findUserA($login);
    if ($user == null) { //Aucun utilisateur n'existe avec le login et mdp passé en params
        if (addPersonne($nom, $prenom, $login, $mdp, $tel)) {
            header("location:http://localhost/projet_exam/");
        }
    } else {
        echo "<div class=" . '" alert alert-danger text-primary col-md-5 container mt-3"' . ">Impossible d'ajouter cet utilisateur!Login déjà existant!</div>";
    }
}
?>
<div class="card mt-5 container bg-dark text-white col-md-5">
    <div class="card-header bg-danger text-white text-center">
        <h4>AUTHENTIFICATION</h4>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div>
                <label for="" class="h6">Nom d'utilisateur</label>
                <input type="text" name="login" id="" class="form-control">
            </div>
            <div>
                <label for="" class="h6">Mot de Passe</label>
                <input type="password" name="mdp" id="" class="form-control">
            </div>
            <hr>
            <div class="float-right">
                <button class="btn btn-primary mt-2 btn-lg" name="btnConnect">Se Connecter</button>
            </div>
            <div class="float-left">
                <a href="" data-toggle="modal" data-target="#creation" class="btn btn-success text-white mt-2 btn-lg">Creer un compte</a>
            </div>
        </form>
    </div>

</div>
<div class="modal fade" id="creation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">NOUVEL UTILISATEUR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addForm" action="?Enregistrer" method="post">
                <div class="modal-body">
                    <div>
                        <label for="" class="h6">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control">
                        <span id="erreurNom"></span>
                    </div>
                    <div>
                        <label for="" class="h6">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control">
                        <span id="erreurPrenom"></span>
                    </div>
                    <div>
                        <label for="" class="h6">Identifiant</label>
                        <input type="text" name="login" id="login" class="form-control">
                        <span id="erreurLogin"></span>
                    </div>
                    <div>
                        <label for="" class="h6">Mot de passe</label>
                        <input type="password" name="mdp" id="mdp" class="form-control">
                        <span id="erreurMdp"></span>
                    </div>
                    <div>
                        <label for="" class="h6">Téléphone</label>
                        <input type="tel" name="tel" id="tel" class="form-control">
                        <span id="erreurTel"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success btn-bg" id="enregistrer" name="Enregistrer">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php
include_once "footer.php";
?>