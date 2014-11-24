
function getListe(codegouv, entity , previous_select){
    var codegouv = $('#'+codegouv).val();
    //alert(id_select)
    $.ajax({
  //  url: "{{ path('sise_core_getList') }}",
    url:  "/app.php"+Routing.generate('sise_core_getList'),
    type: 'GET',
    data: {'codegouv': codegouv,'entity':  entity , 'previous_select': previous_select },
    dataType: 'json',
    success: function(json) { // quand la réponse de la requete arrive
    if (previous_select == 'sise_bundle_corebundle_search_CodeEtab') {
    $('#' + previous_select).val(json.code);
    } else {
    $('#' + previous_select).html('');
    $.each(json, function (index, value) { // et  boucle sur la réponse contenu dans la variable passé à la function du success "json"
    $('#' + previous_select).append('<option value="' + value.code + '">' + value.libelle + '</option>');
    });
    }
    }
    });
    }
