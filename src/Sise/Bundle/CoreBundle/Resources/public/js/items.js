/**
 * Created by hp on 30/12/2014.
 */
jQuery(document).ready(function () {
    deleteItem();
    $(".add_items").click(function () {
        var compteur = parseInt($(this).parents('tbody').find('tr').last().find('td').first().text());
        var newcompteur = parseInt(compteur + 1);
        $.ajax({
            url: "/app.php" + Routing.generate($(this).attr("rel")),
            type: 'POST',
            data: {'newcompteur': newcompteur},
            success: function (json) { // quand la réponse de la requete arrive
                $(".add_items").parents('tbody').find('tr').last().after(json);
                 relatedLists();
                deleteItem();
            }
        });
    });

    $("#nomenclature_sise_choicefk").change(function () {
        var tablename = $(this).val();
        if (tablename) {
            $("#nomenclatureparametreexogene_form_items").parents('tbody').find('tr.item-tr').remove();
            var compteur = parseInt($("#nomenclatureparametreexogene_form_items").parents('tbody').find('tr').last().find('td').first().text());
            if (compteur === parseInt(compteur, 10)) {
                var newcompteur = parseInt(compteur + 1);
            } else {
                var newcompteur = parseInt(1);
            }

            $.ajax({
                url: "/app.php" + Routing.generate($("#nomenclatureparametreexogene_form_items").attr("rel")),
                type: 'POST',
                data: {'newcompteur': newcompteur, 'tablename': tablename},
                success: function (json) { // quand la réponse de la requete arrive
                    $("#nomenclatureparametreexogene_form_items").parents('tbody').find('tr').last().after(json);
                    deleteItem();
                }
            });


        }

    });


    $("#nomenclatureparametreexogene_form_items").click(function () {
        var tablename = $('#nomenclature_sise_choicefk').val();
        if (tablename) {
            var compteur = parseInt($("#nomenclatureparametreexogene_form_items").parents('tbody').find('tr').last().find('td').first().text());
            if (compteur === parseInt(compteur, 10)) {
                var newcompteur = parseInt(compteur + 1);
            } else {
                var newcompteur = parseInt(1);
            }

            $.ajax({
                url: "/app.php" + Routing.generate($("#nomenclatureparametreexogene_form_items").attr("rel")),
                type: 'POST',
                data: {'newcompteur': newcompteur, 'tablename': tablename},
                success: function (json) { // quand la réponse de la requete arrive
                    $("#nomenclatureparametreexogene_form_items").parents('tbody').find('tr').last().after(json);
                    deleteItem();
                }
            });
        }

    });


});


function deleteItem() {

    $(".delete_items").click(function () {
        var compteur = parseInt($(this).parents('tr').find('td').first().text())
        var tr = $(this).parents('tr');
        $.ajax({
            url: "/app.php" + Routing.generate($(this).attr("rel")),
            type: 'POST',
            data: {
                'codeetabsour': $('#codeetabsour' + compteur).val(),
                'codetypeetabsour': $('#codetypeetabsour' + compteur).val()
            },
            success: function (json) { // quand la réponse de la requete arrive
                if (json.success == true) {
                    tr.css("background-color", "#FF3700");
                    tr.fadeOut(400, function () {
                        tr.remove();
                    });
                }


            }
        });
    });


    $(".delete_handicaps").click(function () {
        var compteur = parseInt($(this).parents('tr').find('td').first().text())
        var tr = $(this).parents('tr');
        $.ajax({
            url: "/app.php" + Routing.generate($(this).attr("rel")),
            type: 'POST',
            data: {'numeelev': compteur},
            success: function (json) { // quand la réponse de la requete arrive
                if (json.success == true) {
                    tr.css("background-color", "#FF3700");
                    tr.fadeOut(400, function () {
                        tr.remove();
                    });
                }


            }
        });
    });


    $(".delete_enseignement").click(function () {
        var compteur = parseInt($(this).parents('tr').find('td').first().text())
        var tr = $(this).parents('tr');
        $.ajax({
            url: "/app.php" + Routing.generate($(this).attr("rel")),
            type: 'POST',
            data: {'idenuniqense': $('#idenuniqense' + compteur).val()},
            success: function (json) { // quand la réponse de la requete arrive
                if (json.success == true) {
                    tr.css("background-color", "#FF3700");
                    tr.fadeOut(400, function () {
                        tr.remove();
                    });
                }


            }
        });
    });

    $(".delete_listeenseignent").click(function () {
        var compteur = parseInt($(this).parents('tr').find('td').first().text())
        var tr = $(this).parents('tr');
        $.ajax({
            url: "/app.php" + Routing.generate($(this).attr("rel")),
            type: 'POST',
            data: {'numeense': compteur},
            success: function (json) { // quand la réponse de la requete arrive
                if (json.success == true) {
                    tr.css("background-color", "#FF3700");
                    tr.fadeOut(400, function () {
                        tr.remove();
                    });
                }


            }
        });
    });
}


function relatedLists() {
    $(".circonscriptionregional").change(function () {
        var compteur = parseInt($(this).parents('tr').find('td').first().text());
        /// $json[0]['libelle'] = '-- اختيار --';
        $('#delegation' + compteur).html('');
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
                    $('#delegation' + compteur).append('<option value="' + value.code + '">' + value.libelle + '</option>');
                });
            }

        });
    });

    $(".delegation").change(function () {
        var compteur = parseInt($(this).parents('tr').find('td').first().text());
        $('#codeetabsour' + compteur).html('');
        //$('#codeetabsour'+compteur).html('');
        //$('#codetypeetabsour'+compte
        // ur).html('');
        $.ajax({
            //  url: "{{ path('sise_core_getList') }}",
            url: "/app.php" + Routing.generate('effectiveelevenouveauseptiemeannee_relatedLists'),
            type: 'POST',
            data: {'_delegation': $(this).val(), '_type': $("#sise_add_line").attr('rel')},
            dataType: 'json',
            success: function (json) { // quand la réponse de la requete arrive
                $.each(json, function (index, value) { // et  boucle sur la réponse contenu dans la variable passé à la function du success "json"
                    $('#codeetabsour' + compteur).append('<option value="' + value.code + '">' + value.libelle + '</option>');
                });
            }

        });
    });


    $(".codeetabsour").change(function () {
        var compteur = parseInt($(this).parents('tr').find('td').first().text());
        $('#codetypeetabsour' + compteur).html('');
        //$('#codeetabsour'+compteur).html('');
        //$('#codetypeetabsour'+compteur).html('');
        $.ajax({
            //  url: "{{ path('sise_core_getList') }}",
            url: "/app.php" + Routing.generate('effectiveelevenouveauseptiemeannee_relatedLists'),
            type: 'POST',
            data: {'_codeetabsour': $(this).val()},
            dataType: 'json',
            success: function (json) { // quand la réponse de la requete arrive
                $('#codetypeetabsour' + compteur).val(json.code);
                $('#codetypeetab' + compteur).val(json.libelle);

            }

        });
    });


    $(".codetypeetabautr").change(function () {
        var compteur = parseInt($(this).parents('tr').find('td').first().text());
        if ($('#codedele' + compteur).val()) {
            $('#codeetabautr' + compteur).html('');
            $.ajax({
                //  url: "{{ path('sise_core_getList') }}",
                url: "/app.php" + Routing.generate('effectiveelevenouveauseptiemeannee_relatedLists'),
                type: 'POST',
                data: {'_delegation':  $('#codedele' + compteur).val(), '_type':  $('#codetypeetabautr' + compteur).val()},
                dataType: 'json',
                success: function (json) { // quand la réponse de la requete arrive
                    $.each(json, function (index, value) { // et  boucle sur la réponse contenu dans la variable passé à la function du success "json"
                        $('#codeetabautr' + compteur).append('<option value="' + value.code + '">' + value.libelle + '</option>');
                    });
                }

            });
        }
    });



    $(".codedele").change(function () {
             var compteur = parseInt($(this).parents('tr').find('td').first().text());
            $('#codeetabautr' + compteur).html('');
    });


}
jQuery(document).ready(function () {
    relatedLists();
});