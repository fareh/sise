jQuery(document).ready(function () {
$('#form_nivescol select').on('change', function() {
    document.getElementById("form_nivescol").submit();
});

});

// Récupère le div qui contient la collection de tags
var collectionHolder = $('ul.tags');

// ajoute un lien « add a tag »
var $addTagLink = $('<a href="#" class="add_tag_link"><img name="sise_add_line" id="sise_add_line" src="/bundles/sisecore/images/16x16/add_16.png"></a>');
var $newLinkLi = $('<li></li>').append($addTagLink);

jQuery(document).ready(function () {

    // ajoute un lien de suppression à tous les éléments li de
    // formulaires de tag existants
    collectionHolder.find('li').each(function () {
        addTagFormDeleteLink($(this));
    });


    // ajoute l'ancre « ajouter un tag » et li à la balise ul
    collectionHolder.append($newLinkLi);

    $addTagLink.on('click', function (e) {
        // empêche le lien de créer un « # » dans l'URL
        e.preventDefault();

        // ajoute un nouveau formulaire tag (voir le prochain bloc de code)
        addTagForm(collectionHolder, $newLinkLi);
    });
});


function addTagForm(collectionHolder, $newLinkLi) {
    // Récupère l'élément ayant l'attribut data-prototype comme expliqué plus tôt
    var prototype = collectionHolder.attr('data-prototype');

    // Remplace '__name__' dans le HTML du prototype par un nombre basé sur
    // la longueur de la collection courante
    var newForm = prototype.replace(/__name__/g, collectionHolder.children().length);

    // Affiche le formulaire dans la page dans un li, avant le lien "ajouter un tag"
    var $newFormLi = $('<li class="item_line"></li>').append(newForm);
    $newLinkLi.before($newFormLi);
    // ajoute un lien de suppression au nouveau formulaire
    addTagFormDeleteLink($newFormLi);
}

function addTagFormDeleteLink($tagFormLi) {
    var $removeFormA = $('<a href="#"><img name="sise_delete_line" id="sise_delete_line" src="/bundles/sisecore/images/16x16/cancel_16.png"></a>');
    $tagFormLi.append($removeFormA);

    $removeFormA.on('click', function (e) {
        // empêche le lien de créer un « # » dans l'URL
        e.preventDefault();

        // supprime l'élément li pour le formulaire de tag
        $tagFormLi.remove();
    });
}

$("a.getcoderecen").colorbox({
    href: "/app.php" + Routing.generate('sise_core_selectCodeRec'),
    onClosed: function () {
        location.reload(true);
    },
    onComplete: function () {
        $('#btnCancel').unbind().click($.colorbox.close);
    }
});
function getListe(codegouv, entity, previous_select) {
    var codegouv = $('#' + codegouv).val();
    //alert(id_select)
    $.ajax({
        //  url: "{{ path('sise_core_getList') }}",
        url: "/app.php" + Routing.generate('sise_core_getList'),
        type: 'GET',
        data: {'codegouv': codegouv, 'entity': entity, 'previous_select': previous_select},
        dataType: 'json',
        success: function (json) { // quand la réponse de la requete arrive
            if (previous_select == 'sise_bundle_corebundle_search_CodeEtab') {
                $('#' + previous_select).val(json.code);
                document.getElementById("filtrage_sise").submit();
            } else {
                $('#' + previous_select).html('');
                $.each(json, function (index, value) { // et  boucle sur la réponse contenu dans la variable passé à la function du success "json"
                    $('#' + previous_select).append('<option value="' + value.code + '">' + value.libelle + '</option>');
                });
            }
        }
    });
}
function getListeMulti(codegouv, entity1, entity2, previous_select1, previous_select2) {
    var codegouv = $('#' + codegouv).val();
    //alert(id_select)
    $.ajax({
        //  url: "{{ path('sise_core_getList') }}",
        url: "/app.php" + Routing.generate('sise_core_getListMulti'),
        type: 'GET',
        data: {
            'codegouv': codegouv,
            'entity1': entity1,
            'entity2': entity2,
            'previous_select1': previous_select1,
            'previous_select2': previous_select2
        },
        dataType: 'json',
        success: function (json) { // quand la réponse de la requete arrive

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


$(document).ready(function () {
    $('#fos_user_registration_form_codecircregi').change(function () {
        $('#fos_user_registration_form_codedele option:gt(0)').remove();
        if ($(this).val()) {
            $.ajax({
                type: "GET",
                data: "codecircregi=" + $(this).val(),
                url: "/app.php" + Routing.generate('fos_user_registration_register'),
                success: function (data) {
                    $('#fos_user_registration_form_codedele').append(data);
                }
            });
        }
    });
});


jQuery(function ($) {
    $.datepicker.regional['ar-TN'] = {
        "Name": "ar-TN",
        "closeText": "Close",
        "prevText": "Prev",
        "nextText": "Next",
        "currentText": "Today",
        "monthNames": ["جانفي", "فيفري", "مارس", "أفريل", "ماي", "جوان", "جويليه", "أوت", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر", ""],
        "monthNamesShort": ["جانفي", "فيفري", "مارس", "أفريل", "ماي", "جوان", "جويليه", "أوت", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر", ""],
        "dayNames": ["الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"],
        "dayNamesShort": ["الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"],
        "dayNamesMin": ["الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"],
        "dateFormat": "dd-mm-yy",
        "firstDay": 1,
        "isRTL": true
    };
    $.datepicker.setDefaults($.datepicker.regional['ar-TN']);
});
$(function () {
    $.datepicker.setDefaults($.datepicker.regional['ar-TN']);
    $("#sise_corebundle_nomenclatureetablissement_datecons").datepicker();
    $("#sise_corebundle_nomenclatureetablissement_datecrea").datepicker();
    $("#sise_sisebundle_nomenclaturerecensement_dateclot").datepicker();
    $("#sise_sisebundle_nomenclaturerecensement_dateouve").datepicker();
    $("#sise_corebundle_personnelpersonnel_datenais").datepicker();
    $("#sise_corebundle_personnelpersonnel_dateentrfoncpubl").datepicker();
    $("#sise_corebundle_personnelpersonnel_daterecrme").datepicker();
    $("#sise_corebundle_personnelpersonnel_datetitu").datepicker();
    $("#sise_corebundle_personnelpersonnel_dategradactu").datepicker();
    $("#sise_corebundle_personnelpersonnel_dateconfgradactu").datepicker();
    $("#sise_corebundle_personnelpersonnel_datefonc").datepicker();
    $("#sise_corebundle_personnelpersonnel_datesituadmi").datepicker();
    $("#sise_corebundle_personnelpersonnel_datedeburoul").datepicker();
    $("#sise_corebundle_personnelpersonnel_datefinroul").datepicker();
    $("#sise_corebundle_personnelpersonnel_datedebucont").datepicker();
    $("#sise_corebundle_personnelpersonnel_datefincont").datepicker();
    $("#sise_corebundle_personnelpersonnel_datesituadmi").datepicker();
    $("#sise_corebundle_personnelpersonnel_datecin").datepicker();
    $("#sise_corebundle_personnelpersonnel_datesoussituadmi").datepicker();
});

$(document).ready(function () {
    $('input[type="radio"]').click(function () {
        if ($(this).attr('id') == 'verif') {
            $('#display_toggle_table').show();
        }
        else if ($(this).attr('id') == 'nonverif') {
            $('#display_toggle_table').hide();
            obj = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_2_codeetabsejo");
            obj1 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_3_codeetabsejo");
            obj2 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_0_codeetabsejo");
            obj3 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_1_codeetabsejo");
            obj.value = "";
            obj1.value = "";
            obj2.value = "";
            obj3.value = "";
            obj4 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_2_nombelevmasc");
            obj5 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_3_nombelevmasc");
            obj6 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_0_nombelevmasc");
            obj7 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_1_nombelevmasc");
            obj4.value = 0;
            obj5.value = 0;
            obj6.value = 0;
            obj7.value = 0;
            obj8 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_2_nombelevfemi");
            obj9 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_3_nombelevfemi");
            obj10 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_0_nombelevfemi");
            obj11 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_1_nombelevfemi");
            obj8.value = 0;
            obj9.value = 0;
            obj10.value = 0;
            obj11.value = 0;

        }
        if ($(this).attr('id') == 'verifautr') {
            $('#display_toggle_table_autr').show();
        }
        else if ($(this).attr('id') == 'nonverifautr') {
            $('#display_toggle_table_autr').hide();
            obj = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_6_codeetabsejo");
            obj1 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_7_codeetabsejo");
            obj2 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_4_codeetabsejo");
            obj3 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_5_codeetabsejo");
            obj.value = "";
            obj1.value = "";
            obj2.value = "";
            obj3.value = "";
            obj4 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_6_nombelevmasc");
            obj5 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_7_nombelevmasc");
            obj6 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_4_nombelevmasc");
            obj7 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_5_nombelevmasc");
            obj4.value = 0;
            obj5.value = 0;
            obj6.value = 0;
            obj7.value = 0;
            obj8 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_6_nombelevfemi");
            obj9 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_7_nombelevfemi");
            obj10 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_4_nombelevfemi");
            obj11 = document.getElementById("sise_corebundle_etablissementficheetablissement_sejo_5_nombelevfemi");
            obj8.value = 0;
            obj9.value = 0;
            obj10.value = 0;
            obj11.value = 0;
        }
        if ($(this).attr('id') == 'sise_corebundle_etablissementficheetablissement_infr_utillocalouepret_0') {
            $('#infrnomblocalloue').show();
        }
        else if ($(this).attr('id') == 'sise_corebundle_etablissementficheetablissement_infr_utillocalouepret_1') {
            $('#infrnomblocalloue').hide();
            obj = document.getElementById("sise_corebundle_etablissementficheetablissement_infr_nomblocaloueense");
            obj1 = document.getElementById("sise_corebundle_etablissementficheetablissement_infr_nomblocalouesejo");
            obj2 = document.getElementById("sise_corebundle_etablissementficheetablissement_infr_nomblocapretense");
            obj3 = document.getElementById("sise_corebundle_etablissementficheetablissement_infr_nomblocapretsejo");
            obj.value = 0;
            obj1.value = 0;
            obj2.value = 0;
            obj3.value = 0;
        }
    });
});

function hide() {
    $('#infrcodetypedisp').hide();
}

function show() {
    $('#infrcodetypedisp').show();
}
function genderSelectHandler(select) {
    if (select.value == '2') {
        show();
    } else if (select.value == '1') {
        hide();
    }
}


$(function () {
    $("#accordion").accordion({
        collapsible: true,
        active: true,
        heightStyle: "content"
    });
});

function txtChanged(v1, v2, v3) {
    document.getElementById(v3).value = parseInt(document.getElementById(v1).value) + parseInt(document.getElementById(v2).value);
}

$(function () {
    $("#sise_corebundle_etablissementficheetablissement_resp_ancidireense").spinner({
        step: 0.1,
        numberFormat: "n"
    });
    $("#sise_corebundle_etablissementficheetablissement_resp_ancidireadmi").spinner({
        step: 0.1,
        numberFormat: "n"
    });
    $("#sise_corebundle_etablissementficheetablissement_resp_ancidireadjoense").spinner({
        step: 0.1,
        numberFormat: "n"
    });
    $("#sise_corebundle_etablissementficheetablissement_resp_ancidireadjoadmi").spinner({
        step: 0.1,
        numberFormat: "n"
    });
    $("#sise_corebundle_etablissementficheetablissement_infr_surftotaterr").spinner({
        step: 1,
        numberFormat: "n"
    });
    $("#sise_corebundle_etablissementficheetablissement_infr_surfcons").spinner({
        step: 1,
        numberFormat: "n"
    });
    $("#sise_corebundle_etablissementficheetablissement_infr_surfcouv").spinner({
        step: 1,
        numberFormat: "n"
    });
    $("#sise_corebundle_etablissementficheetablissement_infr_distroutgoud").spinner({
        step: 1,
        numberFormat: "n"
    });
    $("#sise_corebundle_etablissementficheetablissement_infr_distdele").spinner({
        step: 1,
        numberFormat: "n"
    });
    $("#CPHMain_NombSallExte").spinner();

    $("#accordion").accordion({
        collapsible: true,
        active: true,
        heightStyle: "content"
    });

});

//On PostBack
jQuery(document).ready(function () {
  //  Sys.WebForms.PageRequestManager.getInstance().add_endRequest(EndRequestHandler);
    function EndRequestHandler(sender, args) {
        SetUI();
    }

    function SetUI() {
        $("#sise_corebundle_etablissementficheetablissement_resp_ancidireense").spinner({
            step: 0.1,
            numberFormat: "n"
        });
        $("#sise_corebundle_etablissementficheetablissement_resp_ancidireadmi").spinner({
            step: 0.1,
            numberFormat: "n"
        });
        $("#sise_corebundle_etablissementficheetablissement_resp_ancidireadjoense").spinner({
            step: 0.1,
            numberFormat: "n"
        });
        $("#sise_corebundle_etablissementficheetablissement_resp_ancidireadjoadmi").spinner({
            step: 0.1,
            numberFormat: "n"
        });
        $("#sise_corebundle_etablissementficheetablissement_infr_surftotaterr").spinner({
            step: 1,
            numberFormat: "n"
        });
        $("#sise_corebundle_etablissementficheetablissement_infr_surfcons").spinner({
            step: 1,
            numberFormat: "n"
        });
        $("#sise_corebundle_etablissementficheetablissement_infr_surfcouv").spinner({
            step: 1,
            numberFormat: "n"
        });
        $("#sise_corebundle_etablissementficheetablissement_infr_distroutgoud").spinner({
            step: 1,
            numberFormat: "n"
        });
        $("#sise_corebundle_etablissementficheetablissement_infr_distdele").spinner({
            step: 1,
            numberFormat: "n"
        });
        $("#CPHMain_NombSallExte").spinner();

        $("#accordion").accordion({
            collapsible: true,
            active: true,
            heightStyle: "content"
        });
    }

    SetUI();
});
