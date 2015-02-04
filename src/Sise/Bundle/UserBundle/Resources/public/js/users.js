$(document).ready(function () {
   // $('#securite_codeprof_codecyclense').multiselect();
    relatedItems('0');

   /* var callbacks_list = $('#securite table');
    $('tr td  input').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event){
        callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
    }).iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%'
    });*/

    var StatElev3 = $("td[rel='#StatElev3']");
    var FicheEtab3= $("td[rel='#FicheEtab3']");
    var OrieElev3= $("td[rel='#OrieElev3']");
    var MouvEleve3= $("td[rel='#MouvEleve3']");
    var StatEquipement3= $("td[rel='#StatEquipement3']");
    var StatEnse3= $("td[rel='#StatEnse3']");
    var Stat3= $("td[rel='#Stat3']");
    var GestUtil3= $("td[rel='#GestUtil3']");

    $.each( StatElev3, function( i, val ) {
            $(StatElev3).find('input').iCheck('disable');

    });
    $.each( FicheEtab3, function( i, val ) {
        $(FicheEtab3).find('input').iCheck('disable');

    });
    $.each( OrieElev3, function( i, val ) {
        $(OrieElev3).find('input').iCheck('disable');

    });
    $.each( MouvEleve3, function( i, val ) {
        $(MouvEleve3).find('input').iCheck('disable');

    });


    $.each( StatEquipement3, function( i, val ) {
        $(StatEquipement3).find('input').iCheck('disable');

    });

    $.each( StatEnse3, function( i, val ) {
        $(StatEnse3).find('input').iCheck('disable');

    });


    $.each( Stat3, function( i, val ) {
        $(Stat3).find('input').iCheck('disable');

    });

    $.each( GestUtil3, function( i, val ) {
        $(GestUtil3).find('input').iCheck('disable');

    });

    var StatPers3= $("td[rel='#StatPers3']");
    $.each( StatPers3, function( i, val ) {
        $(StatPers3).find('input').iCheck('disable');

    });

    var Rece3= $("td[rel='#Rece3']");
    $.each( Rece3, function( i, val ) {
        $(Rece3).find('input').iCheck('disable');

    });
    var GestNome3= $("td[rel='#GestNome3']");

    $.each( GestNome3, function( i, val ) {
        $(GestNome3).find('input').iCheck('disable');

    });
    var ActiEtab3= $("td[rel='#ActiEtab3']");
    $.each( ActiEtab3, function( i, val ) {
        $(ActiEtab3).find('input').iCheck('disable');

    });

       var StatBudget_droiupda= $("td[rel='#StatBudget_droiupda']");
    $.each( StatBudget_droiupda, function( i, val ) {
        $(StatBudget_droiupda).find('input').iCheck('disable');

    });


    var StatBudget3= $("td[rel='#StatBudget3']");
    $.each( StatBudget3, function( i, val ) {
        $(StatBudget3).find('input').iCheck('disable');

    });


});


function SelectAll(select){
    var StatElev3 = $("td[rel='#StatElev3']");
    var anchorArray = $("td[rel='"+select.getAttribute('rel')+"']");
    $.each( anchorArray, function( i, val ) {
        if (select.checked) {
            $(this).find('input').iCheck('check');
        }
        else {
            $(this).find('input').iCheck('uncheck');
        }

    });
}
function relatedItems(cs) {

    if (cs == '0') {
        $("#fos_user_registration_form_codegrouutil").change(function () {
            $("#fos_user_registration_form_codeprof").closest('div').remove();
            $("#fos_user_registration_form_codecircregi").closest('div').remove();
            $("#fos_user_registration_form_codedele").closest('div').remove();
            $("#fos_user_registration_form_codetypeetab").closest('div').remove();
            $("#fos_user_registration_form_codeetab").closest('div').remove();
            var $codegrouutil = $(this).val();
            $.ajax({
                //  url: "{{ path('sise_core_getList') }}",
                url: "/app.php" + Routing.generate('sise_user_item'),
                type: 'POST',
                data: {'$valinput': $codegrouutil, '$typeinput': 'codegrouutil'},
                success: function (json) { // quand la réponse de la requete arrive
                    $("#fos_user_registration_form_codegrouutil").closest('div').after(json);
                    relatedItems('prof');

                }

            });
        });
    }

    if (cs == 'prof') {
        $("#fos_user_registration_form_codeprof").change(function () {
            var $codeprof = $(this).val();
            $("#fos_user_registration_form_codenivehier").closest('div').remove();
            $.ajax({
                //  url: "{{ path('sise_core_getList') }}",
                url: "/app.php" + Routing.generate('sise_user_item'),
                type: 'POST',
                data: {'$valinput': $codeprof, '$typeinput': 'codeprof'},
                success: function (json) { // quand la réponse de la requete arrive
                    $("#fos_user_registration_form_codeprof").parent('div').after(json);
                    relatedItems('nivehier');
                }
            });
        });
    }

    if (cs == 'nivehier') {
        $("#fos_user_registration_form_codenivehier").change(function () {
            var $codenivehier = $(this).val();
            $("#fos_user_registration_form_codecircregi").closest('div').remove();
            if ($codenivehier != 1) {
                $.ajax({
                    //  url: "{{ path('sise_core_getList') }}",
                    url: "/app.php" + Routing.generate('sise_user_item'),
                    type: 'POST',
                    data: {'$valinput': $codenivehier, '$typeinput': 'codenivehier'},
                    success: function (json) { // quand la réponse de la requete arrive
                        $("#fos_user_registration_form_codenivehier").parent('div').after(json);
                        relatedItems('circregi');
                    }
                });
            }
        });
    }

    if (cs == 'circregi') {
        $("#fos_user_registration_form_codecircregi").change(function () {
            var $codecircregi = $(this).val();
            $("#fos_user_registration_form_codedele").closest('div').remove();
            if ($("#fos_user_registration_form_codenivehier").val() != 2 && $("#fos_user_registration_form_codenivehier").val() != 1) {
                $.ajax({
                    //  url: "{{ path('sise_core_getList') }}",
                    url: "/app.php" + Routing.generate('sise_user_item'),
                    type: 'POST',
                    data: {'$valinput': $codecircregi, '$typeinput': 'codecircregi'},
                    success: function (json) { // quand la réponse de la requete arrive
                        $("#fos_user_registration_form_codecircregi").parent('div').after(json);
                        relatedItems('dele');
                    }
                });

            }
        });
    }
    if (cs == 'dele') {
        $("#fos_user_registration_form_codedele").change(function () {
            var $codedele = $(this).val();
            $("#fos_user_registration_form_codetypeetab").closest('div').remove();
            $.ajax({
                //  url: "{{ path('sise_core_getList') }}",
                url: "/app.php" + Routing.generate('sise_user_item'),
                type: 'POST',
                data: {'$valinput': $codedele, '$typeinput': 'codedele'},
                success: function (json) { // quand la réponse de la requete arrive
                    $("#fos_user_registration_form_codedele").parent('div').after(json);
                    relatedItems('typeetab');
                }
            });
        });
    }

    if (cs == 'typeetab') {
        $("#fos_user_registration_form_codetypeetab").change(function () {
            var $codetypeetab = $(this).val();
            $("#fos_user_registration_form_codeetab").closest('div').remove();
            $.ajax({
                //  url: "{{ path('sise_core_getList') }}",
                url: "/app.php" + Routing.generate('sise_user_item'),
                type: 'POST',
                data: {
                    '$valinput': $codetypeetab,
                    '$valinput2': $("#fos_user_registration_form_codedele").val(),
                    '$typeinput': 'codetypeetab'
                },
                success: function (json) { // quand la réponse de la requete arrive
                    $("#fos_user_registration_form_codetypeetab").parent('div').after(json);

                }
            });

        });
    }

}