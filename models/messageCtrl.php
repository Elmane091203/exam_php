<?php
require_once "messageBD.php";
require_once "personneBD.php";
if (isset($_POST['ajout'])) {
    extract($_POST);
    $list = selectDest($idP);
    foreach ($list as $d) {
        $dest = $_POST['dest' . $d['idP']];
        if (isset($dest)) {
            if (insertMes($objet, $contenu, $dest, $idP)) {
                header("location:http://localhost/projet_exam/messages.php");
            }
        }
    }
}
if (isset($_POST['suppression'])) {
    extract($_POST);
    delMessageR($idS);
    header("location:http://localhost/projet_exam/messages.php");
}
if (isset($_POST['suppression1'])) {
    extract($_POST);
    delMessageS($idS);
    header("location:http://localhost/projet_exam/messages.php");
}

if (isset($_POST['repondre'])) {
    extract($_POST);
    if (insertMes($objet, $contenu, $dest, $idP)) {
        header("location:http://localhost/projet_exam/messages.php");
    }
}

if (isset($_POST['transferer'])) {
    extract($_POST);
    $list = selectDest($idP);
    foreach ($list as $d) {
        $dest = $_POST['dest' . $d['idP']];
        if (isset($dest)) {
            if (insertMes($objet, $contenu, $dest, $idP)) {
                header("location:http://localhost/projet_exam/messages.php");
            }
        }
    }
}
