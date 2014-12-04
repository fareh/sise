
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
function getListeMulti(codegouv, entity1 ,entity2 , previous_select1 , previous_select2){
    var codegouv = $('#'+codegouv).val();
    //alert(id_select)
    $.ajax({
        //  url: "{{ path('sise_core_getList') }}",
        url:  "/app.php"+Routing.generate('sise_core_getListMulti'),
        type: 'GET',
        data: {'codegouv': codegouv,'entity1':  entity1 ,'entity2':  entity2 , 'previous_select1': previous_select1  , 'previous_select2': previous_select2 },
        dataType: 'json',
        success: function(json) { // quand la réponse de la requete arrive

            $('#' + previous_select1).html('');
            $.each(json.NomenclatureDelegation, function (index, value) { // et  boucle sur la réponse contenu dans la variable passé à la function du success "json"
                $('#' + previous_select1).append('<option value="' + value.code + '">' + value.libelle + '</option>');
            });



            $('#' + previous_select2).html('');
            $.each(json.NomenclatureCirconscription, function (index, value) { // et  boucle sur la réponse contenu dans la variable passé à la function du success "json"
                $('#' + previous_select2).append('<option value="' + value.code + '">' + value.libelle + '</option>');
            });
            }
    });
}
jQuery(function ($) {
    $.datepicker.regional['ar-TN'] = { "Name": "ar-TN", "closeText": "Close", "prevText": "Prev", "nextText": "Next", "currentText": "Today", "monthNames": ["جانفي", "فيفري", "مارس", "أفريل", "ماي", "جوان", "جويليه", "أوت", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر", ""], "monthNamesShort": ["جانفي", "فيفري", "مارس", "أفريل", "ماي", "جوان", "جويليه", "أوت", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر", ""], "dayNames": ["الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"], "dayNamesShort": ["الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"], "dayNamesMin": ["الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"], "dateFormat": "dd-mm-yy", "firstDay": 1, "isRTL": true };
    $.datepicker.setDefaults($.datepicker.regional['ar-TN']);
});
$(function () {
    $.datepicker.setDefaults($.datepicker.regional['ar-TN']);
    $("#sise_corebundle_nomenclatureetablissement_datecons").datepicker();
    $("#sise_corebundle_nomenclatureetablissement_datecrea").datepicker();
});


$(function () {
    $("#accordion").accordion({
    collapsible: true,
    active: true,
    heightStyle: "content" });

});


function txtChanged(v1 , v2 , v3) {
    document.getElementById(v3).value =  parseInt(document.getElementById(v1).value) + parseInt(document.getElementById(v2).value);
}


