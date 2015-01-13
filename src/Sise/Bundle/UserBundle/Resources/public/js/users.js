$(document).ready(function () {
   // $('#securite_codeprof_codecyclense').multiselect();
    relatedItems('0');

});

function SelectAll(select){
     var anchorArray = $("td[rel='"+select.getAttribute('rel')+"']");
    $.each( anchorArray, function( i, val ) {
        if (select.checked) {
      $(this).find('input').attr ( "checked" ,"checked" );
        }
        else {
            $(this).find('input').removeAttr('checked');
        }

    });
}
function relatedItems(cs) {

    if (cs == '0') {
        $("#fos_user_registration_form_codegrouutil").change(function () {
            $("#fos_user_registration_form_codeprof").closest('div').remove();
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