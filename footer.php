</body>
<script src="http://localhost/projet_exam/assets/js/jquery-3.3.1.js"></script>
<script src="http://localhost/projet_exam/assets/js/bootstrap.js"></script>
<script src="http://localhost/projet_exam/assets/js/jquery.dataTables.js"></script>
<script src="http://localhost/projet_exam/assets/js/dataTables.bootstrap4.js"></script>
<script src="assets/js/script.js"></script>

<script>
    function remplirModal(id) {
        let spanText=$(`#${id}`).text();
        let tabElement=spanText.split("~");
        //details
        $('#exp1').val(tabElement[1]);
        $('#destinataire1').val(tabElement[2]);
        $('#exp').val(tabElement[6].trim());
        $('#destinataire').val(tabElement[7].trim());
        $('#objet').val(tabElement[3]);
        $('#contenu').val(tabElement[4]);
        //supprimer
        $('#sup').val(tabElement[0]);
        $('#sup1').val(tabElement[0]);
        //repondre
        $('#destR').val(tabElement[1]);
        $('#destR1').val(tabElement[6].trim());
        //details1
        $('#exp21').val(tabElement[1]);
        $('#destinataire21').val(tabElement[2]);
        $('#exp2').val(tabElement[6].trim());
        $('#destinataire2').val(tabElement[7].trim());
        $('#objet2').val(tabElement[3]);
        $('#contenu2').val(tabElement[4]);
        // transferer
        $('#objetT').val(tabElement[3]);
        $('#contenuT').val(tabElement[4]);
        
    }
</script>