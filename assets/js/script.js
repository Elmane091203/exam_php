$("#enregistrer").attr("disabled", "disabled");
$("#nouveauMesB").attr("disabled", "disabled");
$("#transferet").attr("disabled", "disabled");
// $("#dest").get(i).checked
$(document).on("blur", "#nom", function (e) {
  if (this.value.trim() == "") {
    $("#erreurNom").text("Champs obligatoire!");
    $("#erreurNom").css("color", "red");
  } else {
    $("#erreurNom").text("");
    if (isStringChar(this.value.trim()) == 0) {
      $("#erreurNom").text("Nom saisi incorrect!");
      $("#erreurNom").css("color", "red");
    } else {
      $("#erreurNom").text("");
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
    $("#tel").val() != ""
  ) {
    $("#enregistrer").removeAttr("disabled", "disabled");
  } else {
    $("#enregistrer").attr("disabled", "disabled");
  }
});
$(document).on("blur", "#prenom", function (e) {
  if (this.value.trim() == "") {
    $("#erreurPrenom").text("Champs obligatoire!");
    $("#erreurPrenom").css("color", "red");
  } else {
    $("#erreurPrenom").text("");
    if (isStringChar(this.value.trim()) == 0) {
      $("#erreurPrenom").text("Prenom saisi incorrect!");
      $("#erreurPrenom").css("color", "red");
    } else {
      $("#erreurPrenom").text("");
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
    $("#tel").val() != ""
  ) {
    $("#enregistrer").removeAttr("disabled", "disabled");
  } else {
    $("#enregistrer").attr("disabled", "disabled");
  }
});
$(document).on("blur", "#login", function (e) {
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
$(document).on("blur", "#mdp", function (e) {
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
$(document).on("blur", "#tel", function (e) {
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
//fonction permettant de verifier si un caractere est bien caractere
function isChar(x) {
  return (x >= "A" && x <= "Z") || (x >= "a" && x <= "z") ? 1 : 0;
}
//fonction permettant de verifier si on a une chaine numerique
function isStringNumeric(x) {
  for (i = 0; i < x.length; i++) {
    if (isNumeric(x[i]) == 0) return 0;
  }
  return 1;
}
function isStringChar(x) {
  for (i = 0; i < x.length; i++) {
    if (isChar(x[i]) == 0) return 0;
  }
  return 1;
}
//fonction permettant de verifier si le network c'est à dire le debut du numéro est valide
function isNetworkValid(x) {
  return x[0] == "7" &&
    (x[1] == "5" || x[1] == "6" || x[1] == "7" || x[1] == "8" || x[1] == "0")
    ? 1
    : 0;
}
//fonction permettant de verifier si un numero est valide
function isPhoneValid(tel) {
  return tel.length == 9 &&
    isStringNumeric(tel) == 1 &&
    isNetworkValid(tel) == 1
    ? 1
    : 0;
}
// fonction permettant de verifier si au moins un destinataire est cocher
cptD = 0;
function verif(d) {
  d.forEach((element) => {
    if ($("#dest" + element[0]).get(0).checked == true) {
      if ($("#nouveauMesB").attr("disabled") == "disabled") {
        $("#nouveauMesB").removeAttr("disabled");
      }
    }
    k = true;
    for (let i = 0; i < d.length; i++) {
      if ($("#dest" + d[i][0]).get(0).checked == true) {
        k = true;
        break;
      } else {
        k = false;
      }
    }
    if (k == false) {
      $("#nouveauMesB").attr("disabled", "disabled");
    }
  });
  d.forEach((element) => {
    if ($("#dest1" + element[0]).get(0).checked == true) {
      if ($("#transferet").attr("disabled") == "disabled") {
        $("#transferet").removeAttr("disabled");
      }
    }
    c = true;
    for (let i = 0; i < d.length; i++) {
      if ($("#dest1" + d[i][0]).get(0).checked == true) {
        c = true;
        break;
      } else {
        c = false;
      }
    }
    if (c == false) {
      $("#transferet").attr("disabled", "disabled");
    }
  });
}
$(document).ready(function () {
  // tableau des messages envoyes
  var table = $("#tableauE").DataTable({
    dom: "lftrip",
    pagingType: "simple_numbers",
    lengthMenu: [10,25,50,100],
    pageLength: 4,
    language: {
      url: "http://localhost/projet_exam/DataTables/media/French.json",
    },
    ajax: {
      url: "http://localhost/projet_exam/requete-ajax/requete.php?action=listE",
      dataSrc: "",
    },
    columns: [
      { data: "idMes" },
      { data: "exp" },
      { data: "dest" },
      {
        data: "objet",
        render: function (data, type, row) {
          if (data.length >= 20) {
            return data.substr(0, 20) + "...";
          } else return data;
        },
      },
      {
        data: "contenu",
        render: function (data, type, row) {
          if (data.length >= 20) {
            return data.substr(0, 20) + "...";
          } else return data;
        },
      },
      { data: "date" },
      {
        render: function (data, type, row) {
          b =
            `<span hidden id="id` +
            row.idMes +
            `">` +
            row.idMes +
            "~" +
            row.idPF +
            "~" +
            row.destinataire +
            "~" +
            row.objet +
            "~" +
            row.contenu +
            "~" +
            row.date +
            "~" +
            row.exp +
            "~" +
            row.dest +
            `
        </span>
        <a href="" class="btn btn-warning btn-sm" onclick="remplirModal('id` +
            row.idMes +
            `')" data-target="#details1" data-toggle="modal">👁</a>
        <a href="" class="btn btn-danger ml-2 btn-sm" data-toggle="modal" data-target="#suppression1" onclick="remplirModal('id` +
            row.idMes +
            `')">🚮</a>`;
          return b;
        },
      },
    ],
  });
  //tableau des messages reçus
  var table2 = $("#tableauR").DataTable({
    dom: "lftrip",
    pagingType: "simple_numbers",
    lengthMenu: [10,25,50,100],
    pageLength: 4,
    language: {
      url: "http://localhost/projet_exam/DataTables/media/French.json",
    },
    ajax: {
      url: "http://localhost/projet_exam/requete-ajax/requete.php?action=listR",
      dataSrc: "",
    },
    columns: [
      { data: "idMes" },
      { data: "exp" },
      { data: "dest" },
      {
        data: "objet",
        render: function (data, type, row) {
          if (data.length >= 20) {
            return data.substr(0, 20) + "...";
          } else return data;
        },
      },
      {
        data: "contenu",
        render: function (data, type, row) {
          if (data.length >= 20) {
            return data.substr(0, 20) + "...";
          } else return data;
        },
      },
      { data: "date" },
      {
        render: function (data, type, row) {
          b =
            `<span hidden id="id` +
            row.idMes +
            `">` +
            row.idMes +
            "~" +
            row.idPF +
            "~" +
            row.destinataire +
            "~" +
            row.objet +
            "~" +
            row.contenu +
            "~" +
            row.date +
            "~" +
            row.exp +
            "~" +
            row.dest +
            `
        </span>
        <a href="" class="btn btn-warning btn-sm" onclick="remplirModal('id` +
            row.idMes +
            `')" data-target="#details" data-toggle="modal">👁</a>
        <a href="" class="btn btn-danger ml-2 btn-sm" data-toggle="modal" data-target="#suppression" onclick="remplirModal('id` +
            row.idMes +
            `')">🚮</a>`;
          return b;
        },
      },
    ],
  });
  setInterval(function () {
    table.ajax.reload(null, false);
  }, 2000);
  setInterval(function () {
    table2.ajax.reload(null, false);
  }, 2000);
  
  
  
  
});
//   $("#tabEnvoyer").ajax({
//     url: "http://localhost/projet_exam/requete-ajax/requete.php?action=list",

// });
/*
if (cptD==0) {
    if ($("#" + d).get(0).checked == true) {
      if ($("#nouveauMesB").attr("disabled") == "disabled") {
        $("#nouveauMesB").removeAttr("disabled");
      }
    } else {
      $("#nouveauMesB").attr("disabled", "disabled");
    }
    cptD++;
  }
  
*/
