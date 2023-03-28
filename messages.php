<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Projet</title>
    <link rel="stylesheet" href="http://localhost/projet_exam/assets/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/projet_exam/assets/css/dataTables.bootstrap4.css">

    <link rel="stylesheet" href="http://localhost/projet_exam/assets/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/projet_exam/assets/css/dataTables.bootstrap4.css">

</head>


<?php
session_start();
require_once "models/personneBD.php";
require_once "models/messageBD.php";
if (empty($_SESSION)) {
    header("location:http://localhost/projet_exam");
}

if (isset($_GET['deconnexion'])) {
    session_unset();
    header("location:http://localhost/projet_exam");
}
$destin = selectDest($_SESSION['id']);
$user = selectU();
$m1 = getMessageS($_SESSION['id']);
$m2 = getMessageR($_SESSION['id']);
$mS = getMessageSeS($_SESSION['id']);
$mR = getMessageRS($_SESSION['id']);
?>

<body class="bg-dark">
    <div class="container bg-light mt-4">
        <div class="card-header row">
            <h3>Bienvenue <?= $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?></h3>
            <a href="?deconnexion" class="btn btn-danger offset-6 col-md-2 ">Se deconnecter✖</a>
        </div>
        <div class="card-body">
            <div class="card mb-2">
                <div class="card-header">
                    <div class="row">
                        <h5 class="col-md-4">Messages Reçus📥</h5>
                        <a href="" class=" btn col-md-2 offset-3 btn-warning" data-toggle="modal" data-target="#messages">🗑</a>
                        <a href="" class="btn col-md-2 ml-4 btn-success" data-toggle="modal" data-target="#nouveau">📧</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="tableauR">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Expediteur</th>
                                <th>Destinateur</th>
                                <th>Objet</th>
                                <th>Contenu</th>
                                <th>Date et Heure</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="card-header ">
                    <a class="col-md-4 h5">Messages Envoyés 📤</a>
                </div>
                <div class="card-body">
                    <table id="tableauE" class="table-bordered table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Expediteur</th>
                                <th>Destinateur</th>
                                <th>Objet</th>
                                <th>Contenu</th>
                                <th>Date et Heure</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="messages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Messages Supprimés</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h5 class="">Messages Envoyes</h5>
                        </div>
                        <table class="table table-bordered mes">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Expediteur</th>
                                    <th>Destinateur</th>
                                    <th>Objet</th>
                                    <th>Contenu</th>
                                    <th>Date et Heure</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mS as $m) { ?>
                                    <tr>
                                        <td><?= $m['idMes'] ?></td>
                                        <td><?php foreach ($user as $d) {
                                                if ($d['idP'] == $m['idPF']) {
                                                    echo $d['nomP'] . " " . $d['prenomP'];
                                                }
                                            } ?></td>
                                        <td><?php foreach ($user as $d) {
                                                if ($d['idP'] == $m['destinataire']) {
                                                    echo $d['nomP'] . " " . $d['prenomP'];
                                                }
                                            } ?></td>
                                        <td><?= $m['objet'] ?></td>
                                        <td class="col-md-2"><?= (strlen($m['contenu']) < 20) ? $m['contenu'] : substr($m['contenu'], 0, 20) . " ..." ?></td>
                                        <td><?= $m['date'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="card-header">
                            <h5 class="">Messages Reçus</h5>
                        </div>
                        <table class="table table-bordered mes">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Expediteur</th>
                                    <th>Destinateur</th>
                                    <th>Objet</th>
                                    <th>Contenu</th>
                                    <th>Date et Heure</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mR as $m) { ?>
                                    <tr>
                                        <td><?= $m['idMes'] ?></td>
                                        <td><?php foreach ($user as $d) {
                                                if ($d['idP'] == $m['idPF']) {
                                                    echo $d['nomP'] . " " . $d['prenomP'];
                                                }
                                            } ?></td>
                                        <td><?php foreach ($user as $d) {
                                                if ($d['idP'] == $m['destinataire']) {
                                                    echo $d['nomP'] . " " . $d['prenomP'];
                                                }
                                            } ?></td>
                                        <td><?= $m['objet'] ?></td>
                                        <td class="col-md-2"><?= (strlen($m['contenu']) < 20) ? $m['contenu'] : substr($m['contenu'], 0, 20) . " ..." ?></td>
                                        <td><?= $m['date'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="suppression" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Suppression Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="http://localhost/projet_exam/models/messageCtrl.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="sup" name="idS">
                        <h4>Voulez vous supprimer ce message?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                        <button type="submit" class="btn btn-danger" name="suppression">Oui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="suppression1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Suppression Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="http://localhost/projet_exam/models/messageCtrl.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="sup1" name="idS">
                        <h4>Voulez vous supprimer ce message?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                        <button type="submit" class="btn btn-danger" name="suppression1">Oui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="nouveau" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Nouveau Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="http://localhost/Projet_exam/models/messageCtrl.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="idP" id="idP" value="<?= $_SESSION['id'] ?>">
                        <div class="mb-2">
                            <label for="" class="h6">Objet</label>
                            <input type="text" name="objet" id="" class="form-control">
                        </div>
                        <div>
                            <label for="" class="h6">Contenu</label>
                            <textarea type="password" cols="20" rows="10" name="contenu" class="form-control">
                            </textarea>
                        </div>
                        <table class="table table-bordered text-center ">
                            <thead>
                                <tr>
                                    <th colspan="5">Destinataire</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Prenom</th>
                                    <th>Nom</th>
                                    <th>Tel</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($destin as $d) { ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="dest<?= $d['idP'] ?>" id="dest<?= $d['idP'] ?>" onclick='verif(<?= json_encode($destin) ?>)' value="<?= $d['idP'] ?>">
                                        </td>
                                        <td><?= $d['idP'] ?></td>
                                        <td><?= $d['prenomP'] ?></td>
                                        <td><?= $d['nomP'] ?></td>
                                        <td>+221 <?= $d['tel'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" name="ajout" id="nouveauMesB">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Détails Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="http://localhost/Projet_exam/models/messageCtrl.php" method="post">
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="" class="h6">Expediteur</label>
                            <input type="text" name="exp" id="exp" readonly class="form-control">
                            <input type="hidden" name="exp1" id="exp1" readonly class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="h6">Destinataire</label>
                            <input type="text" name="dest" id="destinataire" readonly class="form-control">
                            <input type="hidden" name="dest1" id="destinataire1" readonly class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="h6">Objet</label>
                            <input type="text" name="objet" id="objet" readonly class="form-control">
                        </div>
                        <div>
                            <label for="" class="h6">Contenu</label>
                            <textarea cols="20" rows="10" name="contenu" id="contenu" readonly class="form-control">
                            </textarea>
                        </div>

                    </div>
                    <div class="modal-footer center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <a href="" class="btn btn-success" data-toggle="modal" data-target="#transferer">Transferer</a>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#repondre">Repondre</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="details1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Détails Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="http://localhost/Projet_exam/models/messageCtrl.php" method="post">
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="" class="h6">Expediteur</label>
                            <input type="text" name="exp2" id="exp2" readonly class="form-control">
                            <input type="hidden" name="exp21" id="exp21" readonly class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="h6">Destinataire</label>
                            <input type="text" name="dest2" id="destinataire2" readonly class="form-control">
                            <input type="hidden" name="dest21" id="destinataire21" readonly class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="h6">Objet</label>
                            <input type="text" name="objet2" id="objet2" readonly class="form-control">
                        </div>
                        <div>
                            <label for="" class="h6">Contenu</label>
                            <textarea cols="20" rows="10" name="contenu2" id="contenu2" readonly class="form-control">
                            </textarea>
                        </div>

                    </div>
                    <div class="modal-footer center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <a href="" class="btn btn-success" data-toggle="modal" data-target="#transferer">Transferer</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="transferer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Transferer Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="http://localhost/Projet_exam/models/messageCtrl.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="idP" id="idP" value="<?= $_SESSION['id'] ?>">
                        <div class="mb-2">
                            <label for="" class="h6">Objet</label>
                            <input type="text" name="objet" id="objetT" class="form-control">
                        </div>
                        <div>
                            <label for="" class="h6">Contenu</label>
                            <textarea type="password" cols="20" rows="10" name="contenu" id="contenuT" class="form-control">
                            </textarea>
                        </div>
                        <table class="table table-bordered text-center ">
                            <thead>
                                <tr>
                                    <th colspan="5">Destinataire</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Prenom</th>
                                    <th>Nom</th>
                                    <th>Tel</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($destin as $d) { ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="dest<?= $d['idP'] ?>" onclick='verif(<?= json_encode($destin) ?>)'  id="dest1<?= $d['idP'] ?>" value="<?= $d['idP'] ?>">
                                        </td>
                                        <td><?= $d['idP'] ?></td>
                                        <td><?= $d['prenomP'] ?></td>
                                        <td><?= $d['nomP'] ?></td>
                                        <td>+221 <?= $d['tel'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-secondary" data-dismiss="modal">Fermer</a>
                        <button type="submit" class="btn btn-primary" name="transferer" id="transferet">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="repondre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Repondre Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="http://localhost/Projet_exam/models/messageCtrl.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="idP" id="idPR" value="<?= $_SESSION['id'] ?>">
                        <div class="mb-2">
                            <label for="" class="h6">Objet</label>
                            <input type="text" name="objet" id="" class="form-control">
                            <span id="erreurObjet"></span>
                        </div>
                        <div>
                            <label for="" class="h6">Contenu</label>
                            <textarea type="password" cols="20" rows="10" name="contenu" class="form-control">
                            </textarea>
                        </div>
                        <div class="mb-2">
                            <label for="" class="h6">Destinataire</label>
                            <input type="text" readonly id="destR1" class="form-control">
                            <input type="hidden" name="dest" id="destR" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-secondary" data-dismiss="modal">Fermer</a>
                        <button type="submit" class="btn btn-primary" name="repondre">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include_once "footer.php";
    ?>