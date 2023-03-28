    <?php
    include_once "header.php";
    require_once "models/personneBD.php";

    if (isset($_POST['Enregistrer'])) {
        extract($_POST);
        $mdp = sha1($mdp);
        $user = findUser($login, $mdp);
        if ($user == null) { //Aucun utilisateur n'existe avec le login et mdp passé en params
            if (addPersonne($nom, $prenom, $login, $mdp, $tel)) {
                header("location:http://localhost/projet_exam/");
            }
        } else {
            echo "<div class=" . '"alert alert-danger text-primary col-md-5 container mt-3"' . ">Impossible d'ajouter cet utilisateur!Login déjà existant!</div>";
        }
    }
    ?>
    <div class="col-md-6 container offset-3 mt-5">
        <div class="card">
            <div class="card-header text-center text-white bg-info h4 ">NOUVEL UTILISATEUR</div>
            <div class="card-body">
                <form id="addForm" method="post">
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
                    <div class="offset-5">
                        <button type="submit" class="btn btn-success mt-2 btn-bg" id="enregistrer" name="Enregistrer">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="http://localhost/exercice/public/js/jquery-3.3.1.js"></script>
    <script src="http://localhost/exercice/public/js/bootstrap.js"></script>
    <script src="http://localhost/exercice/public/js/jquery.dataTables.js"></script>
    <script src="http://localhost/exercice/public/js/dataTables.bootstrap4.js"></script>

    <script>
        $("#enregistrer").attr("disabled", "disabled");
        $(document).on("blur", "#nom", function(e) {
            if (this.value.trim() == "") {
                $("#erreurNom").text("Champs obligatoire!");
                $("#erreurNom").css("color", "red");
            } else {
                $("#erreurNom").text("");
            }
            if (
                $("#erreurNom").val() == "" &&
                $("#erreurPrenom").val() == "" &&
                $("#erreurLogin").val() == "" &&
                $("#erreurMdp").val() == "" &&
                $("#erreurTel").val() == "" &&
                $("#nom").val() != "" &&
                $("#prenom").val() != "" &&
                $("#login").val() != "" &&
                $("#mdp").val() != "" &&
                $("#tel").val() != ""
            ) {
                $("#enregistrer").removeAttr("disabled", "disabled");
            } else {
                $("#enregistrer").attr("disabled", "disabled");
            }
        });
        $(document).on("blur", "#prenom", function(e) {
            if (this.value.trim() == "") {
                $("#erreurPrenom").text("Champs obligatoire!");
                $("#erreurPrenom").css("color", "red");
            } else {
                $("#erreurPrenom").text("");
            }
            if (
                $("#erreurNom").val() == "" &&
                $("#erreurPrenom").val() == "" &&
                $("#erreurLogin").val() == "" &&
                $("#erreurMdp").val() == "" &&
                $("#erreurTel").val() == "" &&
                $("#nom").val() != "" &&
                $("#prenom").val() != "" &&
                $("#login").val() != "" &&
                $("#mdp").val() != "" &&
                $("#tel").val() != ""
            ) {
                $("#enregistrer").removeAttr("disabled", "disabled");
            } else {
                $("#enregistrer").attr("disabled", "disabled");
            }
        });
        $(document).on("blur", "#login", function(e) {
            if (this.value.trim() == "") {
                $("#erreurLogin").text("Champs obligatoire!");
                $("#erreurLogin").css("color", "red");
            } else {
                $("#erreurLogin").text("");
            }
            if (
                $("#erreurNom").val() == "" &&
                $("#erreurPrenom").val() == "" &&
                $("#erreurLogin").val() == "" &&
                $("#erreurMdp").val() == "" &&
                $("#erreurTel").val() == "" &&
                $("#nom").val() != "" &&
                $("#prenom").val() != "" &&
                $("#login").val() != "" &&
                $("#mdp").val() != "" &&
                $("#tel").val() != ""
            ) {
                $("#enregistrer").removeAttr("disabled", "disabled");
            } else {
                $("#enregistrer").attr("disabled", "disabled");
            }
        });
        $(document).on("blur", "#mdp", function(e) {
            if (this.value.trim() == "") {
                $("#erreurMdp").text("Champs obligatoire!");
                $("#erreurMdp").css("color", "red");
            } else {
                $("#erreurMdp").text("");
            }
            if (
                $("#erreurNom").val() == "" &&
                $("#erreurPrenom").val() == "" &&
                $("#erreurLogin").val() == "" &&
                $("#erreurMdp").val() == "" &&
                $("#erreurTel").val() == "" &&
                $("#nom").val() != "" &&
                $("#prenom").val() != "" &&
                $("#login").val() != "" &&
                $("#mdp").val() != "" &&
                $("#tel").val() != ""
            ) {
                $("#enregistrer").removeAttr("disabled", "disabled");
            } else {
                $("#enregistrer").attr("disabled", "disabled");
            }
        });
        $(document).on("blur", "#tel", function(e) {
            if (this.value.trim() == "") {
                $("#erreurTel").text("Champs obligatoire!");
                $("#erreurTel").css("color", "red");
            } else {
                $("#erreurTel").text("");
                if (isPhoneValid(this.value) == 0) {
                    $("#erreurTel").text("Numero incorrect!");
                    $("#erreurTel").css("color", "red");
                } else {
                    $("#erreurTel").text("");
                }
            }
            if (
                $("#erreurNom").val() == "" &&
                $("#erreurPrenom").val() == "" &&
                $("#erreurLogin").val() == "" &&
                $("#erreurMdp").val() == "" &&
                $("#erreurTel").val() == "" &&
                $("#nom").val() != "" &&
                $("#prenom").val() != "" &&
                $("#login").val() != "" &&
                $("#mdp").val() != "" &&
                $("#tel").val() != "" &&
                isPhoneValid($("#tel").val()) == 1
            ) {
                $("#enregistrer").removeAttr("disabled", "disabled");
            } else {
                $("#enregistrer").attr("disabled", "disabled");
            }
        });
        // $(document).on("submit", "#addForm", function (e) {
        //   e.preventDefault(); //Permet de neutraliser le boutton. L'action par defaut du boutton n'est plus prise en compte
        //   $.ajax({
        //     method: "post",
        //     url: "http://localhost/projet_exam/requete-ajax/requete.php?action=ajout",
        //     data: $(this).serialize(), //premet de recuperer tous les names et leurs values associés qui se trouve au niveau du formulaire
        //     success: function (resultat) {
        //       resultat;

        //     },
        //     error: function () {
        //       console.log("Erreur d'acces au fichier!");
        //     },
        //   });
        // });

        //fonction permettant de verifier si un caractere est numerique
        function isNumeric(x) {
            return x >= "0" && x <= "9" ? 1 : 0;
        }
        //fonction permettant de verifier si on a une chaine numerique
        function isStringNumeric(x) {
            for (i = 0; i < x.length; i++) {
                if (isNumeric(x[i]) == 0) return 0;
            }
            return 1;
        }
        //fonction permettant de verifier si le network c'est à dire le debut du numéro est valide
        function isNetworkValid(x) {
            return x[0] == "7" &&
                (x[1] == "5" || x[1] == "6" || x[1] == "7" || x[1] == "8" || x[1] == "0") ?
                1 :
                0;
        }
        //fonction permettant de verifier si un numero est valide
        function isPhoneValid(tel) {
            return tel.length == 9 &&
                isStringNumeric(tel) == 1 &&
                isNetworkValid(tel) == 1 ?
                1 :
                0;
        }
    </script>