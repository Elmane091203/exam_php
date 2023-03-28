<?php
require_once "personneBD.php";

if (isset($_POST['Enregistrer'])) {
    extract($_POST);
    $mdp = sha1($mdp);
    $user = findUser($login,$mdp);
    var_dump($user);
    if ($user == null) { //Aucun utilisateur n'existe avec le login et mdp passé en params
        if (addPersonne($nom, $prenom, $login, $mdp, $tel)) {
            header("location:http://localhost/projet_exam/");
        }
    } else {
        header("location:http://localhost/projet_exam/creation.php?retour");
        echo `<div class="alert alert-danger text-primary col-md-5 container mt-3">Impossible d'ajouter cet utilisateur!<br>Login déjà existant!</div>`;
    }
}
