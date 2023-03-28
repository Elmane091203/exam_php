<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/exercice/public/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/exercice/public/css/dataTables.bootstrap4.css">
</head>
<?php
require_once "models/messageBD.php";
$listMessages=getMessageS(1);
?>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <span class="h4 text-primary">Liste des messages</span>
                <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#nouveau">Nouveau</a>
            </div>
            <div class="card-body">
                <table id="list" class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>#</th>
                            <th>Expediteur</th>
                            <th>Destinataire</th>
                            <th>Objet</th>
                            <th>Contenu</th>
                            <th>Date</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listMessages as $m ) { ?>
                            
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><?=$m['id']?></td>
                                <td><?=$m['expediteur']?></td>
                                <td><?=$m['destinataire']?></td>
                                <td><?=$m['objet']?></td>
                                <td><?= strlen($m['contenu'])<20 ? $m['contenu'] : substr($m['contenu'],0,20)." ..." ?></td>
                                <td><?=$m['date']?></td>
                                <td>
                                    <span hidden id="id<?=$m['id']?>"><?=$m['id']."~".$m['expediteur']."~".$m['destinataire']."~".$m['objet']."~".$m['contenu']."~".$m['date']?></span>
                                    <a href="" class="btn btn-warning" data-target="#detail" onclick="remplirModal(`id<?=$m['id']?>`)" data-toggle="modal">Details</a>
                                    <a href="" class="btn ml-2 btn-danger" data-target="#suppression" onclick="remplirModal(`id<?=$m['id']?>`)" data-toggle="modal">Supprimer</a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="nouveau" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Nouveau Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="http://localhost/exercice/controllers/messageCtrl.php" method="post">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6">
                                <label for="" class="h6">Expediteur</label>
                                <input type="text" name="exp" id="" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="h6">Destinataire</label>
                                <input type="text" name="dest" id="" class="form-control">
                            </div>
                        </div>
                        <div>
                            <label for="" class="h6">Objet</label>
                            <input type="text" name="objet" id="" class="form-control">
                        </div>
                        <div>
                            <label for="" class="h6">Contenu</label>
                            <textarea type="password" cols="20" rows="10" name="contenu" class="form-control">
                            </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" name="ajout">Enregistre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modals2 -->
    <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Detail Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="http://localhost/exercice/controllers/messageCtrl.php" method="post">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6">
                                <label for="" class="h6">Expediteur</label>
                                <input type="text" name="exp" id="exp" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="h6">Destinataire</label>
                                <input type="text" name="dest" id="dest" class="form-control">
                            </div>
                        </div>
                        <div>
                            <label for="" class="h6">Objet</label>
                            <input type="text" name="objet" id="objet" class="form-control">
                        </div>
                        <div>
                            <label for="" class="h6">Contenu</label>
                            <textarea type="password" cols="20" rows="10" name="contenu" class="form-control" id="contenu">
                            </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" name="ajout">Enregistre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal3 -->
    <div class="modal fade" id="suppression" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Suppression Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="http://localhost/exercice/controllers/messageCtrl.php" method="post">
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
</body>
<script src="http://localhost/exercice/public/js/jquery-3.3.1.js"></script>
<script src="http://localhost/exercice/public/js/bootstrap.js"></script>
<script src="http://localhost/exercice/public/js/jquery.dataTables.js"></script>
<script src="http://localhost/exercice/public/js/dataTables.bootstrap4.js"></script>
<script>
    $("#list").dataTable();
    function remplirModal(id) {
        let spanText=$(`#${id}`).text();
        let tabElement=spanText.split("~");
        $('#exp').val(tabElement[1]);
        $('#dest').val(tabElement[2]);
        $('#objet').val(tabElement[3]);
        $('#contenu').val(tabElement[4]);
        $('#sup').val(tabElement[0]);
    }
</script>
</html>