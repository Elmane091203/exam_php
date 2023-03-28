<?php
require_once "bdd.php";

function addPersonne($nom,$prenom,$login,$mdp,$tel)
{
    global $bdd;
    $req="INSERT INTO `personne`( `nomP`, `prenomP`, `login`, `mdp`, `tel`,`idP`) VALUES ('$nom','$prenom','$login','$mdp','$tel',Null)";
    return $bdd->exec($req);
}

function findUser($login, $mdp){
    // Créer la chaine de la requête
    $sql = "SELECT * FROM personne WHERE login = '$login' and mdp='$mdp'";
    // Recupérer la variable $bdd se trouvant dans le fichier bdd.php et contenant la liaison à la BD pour nous permettre d'exécuter toutes les requêtes d'insert, d'update, de delete, select , ...
    
    global $bdd;

    //On utilise la fonction query pour exécuter la requête SELECT
    $exec = $bdd->query($sql);
    //Retourner le résultat de notre requete SELECT sous forme d'un tableau contenant qu'une seule ligne
    //Etant donné que cette requête renverra au plus qu'une seule ligne donc il faudra utiliser fetch pour la recupération du tableau
    return $exec->fetch(); // ['idUser' => 1, 'nomUser' => 'test'] 
}
function findUserA($login)
{
    global $bdd;
    return $bdd->query("SELECT * FROM personne WHERE login='$login'")->fetch();
}
function selectDest($id)
{
    $req="SELECT * FROM personne where idP!=$id";
    global $bdd;
    return $bdd->query($req)->fetchAll();
}
function selectU()
{
    global $bdd;
    return $bdd->query("SELECT *FROM personne")->fetchAll();
}
?>