<?php
session_start();
require_once "../models/personneBD.php";
$action=$_GET['action'];
$id=$_SESSION['id'];
$list=selectU();
if ($action=="listE") {
    $req="SELECT * FROM message where idPF=$id and etat=1";
    global $bdd;
    $rest = $bdd->query($req)->fetchAll();
    // var_dump(($rest));
    // echo "<br>--------------------------------------------<br>";
    foreach ($rest as $key =>$r ) {
        foreach ($list as $l ) {
            if ($r['idPF']==$l['idP']) {
                $r['exp']=$l['nomP']." ".$l['prenomP'];
            }
            if ($r['destinataire']==$l['idP']) {
                $r['dest']=$l['nomP']." ".$l['prenomP'];
            }
        }
        $rest[$key]=$r;
    }
    // var_dump($rest);
    echo json_encode($rest);// permet de formater un tableau en json
}
if ($action=="listR") {
    $req="SELECT * FROM message where destinataire=$id and etatd=1";
    global $bdd;
    $rest = $bdd->query($req)->fetchAll();
    foreach ($rest as $key =>$r ) {
        foreach ($list as $l ) {
            if ($r['idPF']==$l['idP']) {
                $r['exp']=$l['nomP']." ".$l['prenomP'];
            }
            if ($r['destinataire']==$l['idP']) {
                $r['dest']=$l['nomP']." ".$l['prenomP'];
            }
        }
        $rest[$key]=$r;
    }
    echo json_encode($rest);// permet de formater un tableau en json
}
?>