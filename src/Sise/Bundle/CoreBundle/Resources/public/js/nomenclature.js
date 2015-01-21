getNivSco();
function getNivSco() {
    $( "#nomenclature_sise_codecycl" ).change(function() {
        var $listeChoice = $(this).val();
        $.ajax({
            //  url: "{{ path('sise_core_getList') }}",
            url: "/app.php" + Routing.generate('nomenclature_getNivSco'),
            type: 'GET',
            data: {'$listeChoice' : $listeChoice},
            dataType: 'json',
            success: function (json) { // quand la réponse de la requete arrive

                $('#nomenclature_sise_codenivescol').html('');
                $.each(json, function (index, value) { // et  boucle sur la réponse contenu dans la variable passé à la function du success "json"
                 $('#nomenclature_sise_codenivescol').append('<option value="' + value.code + '">' + value.libelle + '</option>');

                });
                $('#nomenclature_sise_codenivescol').multiselect('destroy');
                $('#nomenclature_sise_codenivescol').multiselect({maxHeight: 200, numberDisplayed: 20} );
            }
    });
    })

}
$('#nomenclature_sise_codenivescol').multiselect({maxHeight: 200, numberDisplayed: 20} );
$('#nomenclature_sise_codecycl').multiselect({maxHeight: 200, numberDisplayed: 20} );