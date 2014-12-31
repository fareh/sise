/**
 * Created by hp on 30/12/2014.
 */
relatedLists();
jQuery(document).ready(function () {
    $( ".add_items" ).click(function() {
       var compteur = parseInt($(this).parents('tbody').find('tr').last().find('td').first().text());
        var newcompteur =parseInt(compteur+1);
        $.ajax({
            url: "/app.php" + Routing.generate($(this).attr("rel")),
            type: 'POST',
            data: {'newcompteur': newcompteur},
            success: function (json) { // quand la réponse de la requete arrive
                $( ".add_items" ).parents('tbody').find('tr').last().after(json);
                relatedLists();
            }
        });
    });

});

function relatedLists(){
    $( ".circonscriptionregional" ).change(function() {
        var compteur = parseInt($(this).parents('tr').find('td').first().text());
       /// $json[0]['libelle'] = '-- اختيار --';
        $('#delegation'+compteur).html('');
        //$('#codeetabsour'+compteur).html('');
        //$('#codetypeetabsour'+compteur).html('');
        $.ajax({
            //  url: "{{ path('sise_core_getList') }}",
            url: "/app.php" + Routing.generate('effectiveelevenouveauseptiemeannee_relatedLists'),
            type: 'POST',
            data: {'_circonscriptionregional': $(this).val()},
            dataType: 'json',
            success: function (json) { // quand la réponse de la requete arrive
                    $.each(json, function (index, value) { // et  boucle sur la réponse contenu dans la variable passé à la function du success "json"
                        $('#delegation'+compteur).append('<option value="' + value.code + '">' + value.libelle + '</option>');
                    });
                }

        });
    });

    $( ".delegation" ).change(function() {
        var compteur = parseInt($(this).parents('tr').find('td').first().text());
        $('#codeetabsour'+compteur).html('');
        //$('#codeetabsour'+compteur).html('');
        //$('#codetypeetabsour'+compteur).html('');
        $.ajax({
            //  url: "{{ path('sise_core_getList') }}",
            url: "/app.php" + Routing.generate('effectiveelevenouveauseptiemeannee_relatedLists'),
            type: 'POST',
            data: {'_delegation': $(this).val()},
            dataType: 'json',
            success: function (json) { // quand la réponse de la requete arrive
                $.each(json, function (index, value) { // et  boucle sur la réponse contenu dans la variable passé à la function du success "json"
                    $('#codeetabsour'+compteur).append('<option value="' + value.code + '">' + value.libelle + '</option>');
                });
            }

        });
    });



    $( ".codeetabsour" ).change(function() {
        var compteur = parseInt($(this).parents('tr').find('td').first().text());
        $('#codetypeetabsour'+compteur).html('');
        //$('#codeetabsour'+compteur).html('');
        //$('#codetypeetabsour'+compteur).html('');
        $.ajax({
            //  url: "{{ path('sise_core_getList') }}",
            url: "/app.php" + Routing.generate('effectiveelevenouveauseptiemeannee_relatedLists'),
            type: 'POST',
            data: {'_codeetabsour': $(this).val()},
            dataType: 'json',
            success: function (json) { // quand la réponse de la requete arrive
                $('#codetypeetabsour'+compteur).val(json.code);
                $('#codetypeetab'+compteur).val(json.libelle);

            }

        });
    });

}