<?php
require_once "bdd.php";
function getMessageS($id)
{
    $req="SELECT * FROM message,personne where idPF=$id and etat=1 and idPF=idP";
    global $bdd;
    return $bdd->query($req)->fetchAll();
}
function getMessageSeS($id)
{
    $req="SELECT * FROM message,personne where idPF=$id and etat=0 and idPF=idP";
    global $bdd;
    return $bdd->query($req)->fetchAll();
}
function getMessageR($id)
{
    $req="SELECT * FROM message,personne where etatd=1 and destinataire=$id and destinataire=idP";
    global $bdd;
    return $bdd->query($req)->fetchAll();
}
function getMessageRS($id)
{
    $req="SELECT * FROM message,personne where etatd=0 and destinataire=$id and destinataire=idP";
    global $bdd;
    return $bdd->query($req)->fetchAll();
}
function insertMes($objet,$contenu,$dest,$id)
{
    global $bdd;
    $objet=str_replace("'","\\\'",$objet);
    $contenu=str_replace("'","\\\'",$contenu);
    $objet=stripslashes($objet);
    $contenu=stripslashes($contenu);
    return $bdd->exec("INSERT INTO message (objet,contenu,destinataire,idPF) VALUES ('$objet','$contenu','$dest','$id')");
}
function delMessageS($id)
{
    global $bdd;
    return $bdd->exec("UPDATE message Set etat=0 where idMes=$id");
}
function delMessageR($id)
{
    global $bdd;
    return $bdd->exec("UPDATE message Set etatd=0 where idMes=$id");
}
?>